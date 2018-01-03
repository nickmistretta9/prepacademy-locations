<?php get_header(); ?>

<section class="inner-content blog-content">
	<div class="container-fluid">
		<h1>Prep Academy Tutors Blog</h1>
		<div class="row">
			<div class="col-sm-8 content">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="date">
							<span><?php the_time('F jS, Y'); ?></span>
						</div>
						<div class="preview">
							<?php the_excerpt(); ?>
						</div>
						<div class="more">
							<button class="btn-info"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More</a></button>
						</div>
					</article>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col-sm-4 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>