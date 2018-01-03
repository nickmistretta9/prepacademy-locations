<?php
/*
Template Name: Testimonials Page
*/
?>
<!-- Header -->
<?php get_header(); ?>


<section class="inner-content testimonial-content">
	<div class="content testimonial">
		<div class="container-fluid">
			<h1>Hear From The Parents and Students We Have Tutored</h1>
			<?php 
			    $args = array( 'post_type' => 'testimonial', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page = -1' );
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post();
				
				$title = types_render_field( "title", array("raw"=>"true") );
			    $quote = types_render_field( "quote", array("raw"=>"true") );
			?>
			<div class="testimonial-box">
				<div class="review">
					<h2><?php echo $title ?></h2>
					<p class="description">
						<?php echo $quote ?>
					</p>
				</div>
				<div class="info"></div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>