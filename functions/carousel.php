// Replace with custom shortcode
function shortcode_gallery($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if (!empty($attr['ids'])) {
        if (empty($attr['orderby'])) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    $output = apply_filters('post_gallery', '', $attr);

    if ($output != '') {
        return $output;
    }

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby']) {
            unset($attr['orderby']);
        }
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => '',
        'icontag' => '',
        'captiontag' => '',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'link' => '',
        'exclude' => ''
                    ), $attr));

    $id = intval($id);

    if ($order === 'RAND') {
        $orderby = 'none';
    }

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if (empty($attachments)) {
        return '';
    }

    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment) {
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        }
        return $output;
    }

    //Bootstrap Output Begins Here
    //Bootstrap needs a unique carousel id to work properly. Because I'm only using one gallery per post and showing them on an archive page, this uses the $post->ID to allow for multiple galleries on the same page.

    $output .= '<div id="carousel-' . $post->ID . '" class="carousel slide" data-ride="carousel">'; 
    $output .= '<!-- Indicators -->';
    $output .= '<ol class="carousel-indicators">';

    //Automatically generate the correct number of slide indicators and set the first one to have be class="active".
    $indicatorcount = 0;
    foreach ($attachments as $id => $attachment) {
        if ($indicatorcount == 1) {
            $output .= '<li data-target="#carousel-' . $post->ID . '" data-slide-to="' . $indicatorcount . '" class="active"></li>';
        } else {
            $output .= '<li data-target="#carousel-' . $post->ID . '" data-slide-to="' . $indicatorcount . '"></li>';
        }
        $indicatorcount++;
    }

    $output .= '</ol>';
    $output .= '<!-- Wrapper for slides -->';
    $output .= '<div class="carousel-inner">';
    $i = 0;

    //Begin counting slides to set the first one as the active class
    $slidecount = 1;
    foreach ($attachments as $id => $attachment) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        if ($slidecount == 1) {
            $output .= '<div class="item active">';
        } else {
            $output .= '<div class="item">';
        }

        $image_src_url = wp_get_attachment_image_src($id, $size);
        $output .= '<img src="' . $image_src_url[0] . '">';
        $output .= '    </div>';


        if (trim($attachment->post_excerpt)) {
            $output .= '<div class="caption hidden">' . wptexturize($attachment->post_excerpt) . '</div>';
        }

        $slidecount++;
    }

    $output .= '</div>';
    $output .= '<!-- Controls -->';
    $output .= '<a class="left carousel-control" href="#carousel-' . $post->ID . '" data-slide="prev">';
    $output .= '<span class="glyphicon glyphicon-chevron-left"></span>';
    $output .= '</a>';
    $output .= '<a class="right carousel-control" href="#carousel-' . $post->ID . '" data-slide="next">';
    $output .= '<span class="glyphicon glyphicon-chevron-right"></span>';
    $output .= '</a>';
    $output .= '</div>';
    $output .= '</dl>';
    $output .= '</div>';

    return $output;