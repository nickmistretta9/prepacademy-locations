<?php

// Register Custom Navigation Walker
require_once('functions/wp_bootstrap_navwalker.php');

//breadcrumbs
include (TEMPLATEPATH . '/functions/breadcrumbs.php');

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

//remove wp version number
function startertheme_remove_version() {
return '';
}
add_filter('the_generator', 'startertheme_remove_version');

//featured images
add_theme_support( 'post-thumbnails' );

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function prefix_move_archive_count($links) {

    $links = str_replace( '</a>&nbsp;(', ' <span class="count">(', $links );
    $links = str_replace( ')', ')</span> <i class="fa fa-pencil"></i></a>', $links );

    return $links;

}
add_filter( 'get_archives_link', 'prefix_move_archive_count' );

// CUSTOMIZER
function prepacademy_customize_register($wp_customize) {
    // ===== Franchise Items ===== //
    $wp_customize->add_section('franchise-settings', array(
        'title'     => __('Location Settings', 'prepacademylocation'),
        'priority'  => 20
    ));

    // Franchise Location
    $wp_customize->add_setting('franchise_name', array(
        'default'           => 'Location Name',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
    ));
    $wp_customize->add_control('franchisename', array(
        'label'     => __('Franchise Name', 'prepacademylocation'),
        'type'      => 'text',
        'section'   => 'franchise-settings',
        'settings'  => 'franchise_name',
        'priority'  => 10,
    ));

    // Phone Number
    $wp_customize->add_setting('phonenumber', array(
        'default'           => '888-888-8888',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
    ));
    $wp_customize->add_control('phone', array(
        'label'     => __('Phone Number', 'prepacademylocation'),
        'type'      => 'text',
        'section'   => 'franchise-settings',
        'settings'  => 'phonenumber',
        'priority'  => 30,
    ));

    // Location
    $wp_customize->add_setting('franchise_city', array(
        'default'           => 'City Name',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
    ));
    $wp_customize->add_control('franchisecity', array(
        'label'     => __('Franchise City', 'prepacademylocation'),
        'type'      => 'text',
        'section'   => 'franchise-settings',
        'settings'  => 'franchise_city',
        'priority'  => 50,
    ));
    $wp_customize->add_setting('franchise_state', array(
        'default'           => 'WV',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
    ));
    $wp_customize->add_control('franchisestate', array(
        'label'     => __('Franchise State Abbr', 'prepacademylocation'),
        'type'      => 'text',
        'section'   => 'franchise-settings',
        'settings'  => 'franchise_state',
        'priority'  => 60,
    ));
    $wp_customize->add_setting('franchise_zip', array(
        'default'           => '25303',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
    ));
    $wp_customize->add_control('franchisezip', array(
        'label'     => __('Franchise Zip Code', 'prepacademylocation'),
        'type'      => 'text',
        'section'   => 'franchise-settings',
        'settings'  => 'franchise_zip',
        'priority'  => 70,
    ));
}
add_action('customize_register','prepacademy_customize_register');

// Sanitize text 
function sanitize_text( $text ) {    
    return sanitize_text_field( $text );
}

// Custom JS for Theme Customizer
function prepacademy_customizer_js() {
    wp_enqueue_script(
        'prepacademy_theme_customizer',
        get_template_directory_uri() . '/dist/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '',
        true
    );
}
add_action( 'customize_preview_init', 'prepacademy_customizer_js' );

?>