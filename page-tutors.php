<?php
/*
Template Name: Tutors Page
*/
?>
<!-- Header -->
<?php get_header(); ?>

<section class="inner-content tutors-content">
	<div class="container-fluid">
		<div class="tutors-list">
			<?php 
			    $args = array( 'post_type' => 'tutor', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '10', 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 );
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post();
			
			    $picture = types_render_field("picture", array("raw"=>"html"));
			    $name = types_render_field( "name", array("raw"=>"true") );
			    $subjects = types_render_field( "subjects", array("raw"=>"true") );
			    $grades = types_render_field( "grades", array("raw"=>"true") );
			    $bio = types_render_field( "bio", array("raw"=>"true") );

			    $firstName = explode(" ", $name);

			   	$link = get_post_permalink();
			?> 
			
			<div class="tutor-outer">
				<div class="image"><?php echo $picture ?></div>
				<div class="info" data-mh>
					<div class="name"><?php echo $name ?></div>
					<div class="subjects"><span>Subjects:</span> <?php echo $subjects ?></div>
					<div class="grades"><span>Grade Levels:</span> <?php echo $grades ?></div>
					<button class="btn-info"><a href="<?php echo $link ?>">Meet <?php echo $firstName[0] ?></a></button>
				</div>
			</div>
			<?php endwhile; ?>
			<div class="pagination">
				<?php $total_pages = $loop->max_num_pages; 
				if($total_pages > 1) {
					$current_page = max(1, get_query_var('paged'));
					echo paginate_links(array(
						'base' => get_pagenum_link(1) . '%_%',
						'format' => '/page/%#%',
						'current' => $current_page,
						'total' => $total_pages,
						'prev_text' => __('« Previous'),
						'next_text' => __('Next »'),
					));
				} ?>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>