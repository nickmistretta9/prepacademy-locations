<?php get_header(); ?>

<section class="inner-content">
	<div class="container-fluid">
		<div class="content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>