<?php
/*
Template Name: Owners Page
*/
?>
<!-- Header -->
<?php get_header(); ?>

<section class="inner-content owners-content">
	<div class="container-fluid">
		<h1><?php the_title(); ?></h1>
		<div class="owner-information">
			<?php 
			    $args = array( 'post_type' => 'owner', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page = -1' );
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post();

			    $picture = types_render_field("owner_picture", array("raw"=>"html"));
			?> 
			
			<div class="picture">
				<?php echo $picture ?>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<div class="info">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; else: ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>