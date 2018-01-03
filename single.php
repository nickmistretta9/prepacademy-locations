<?php get_header(); ?>

<div class="inner-content post-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>">
						<p class="other-posts"><a href="<?php echo home_url('/blog'); ?>">Blog Home </a>- <?php previous_post('%', 'Previous Post', 'no'); ?> | <?php next_post('%', 'Next Post', 'no'); ?></p>
						<h1><?php the_title(); ?></h1>
						<p class="date-time">
							Posted on <?php the_time('F jS, Y g:ia'); ?> <br>
							By: <?php the_author(); ?>
						</p>
						<?php the_content(); ?>
					</article>
				<?php endwhile; else: ?>
				<?php endif; ?>
			</div>
			<div class="col-sm-4 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>