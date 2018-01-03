<?php get_header(); ?>

<!-- Main Content -->
<section class="inner-content blog-content">
	<div class="container-fluid">
        <div class="row">
            <main class="col-sm-8 content archive" id="post-<?php the_ID(); ?>">
            	<p class="other-posts"><a href="<?php echo home_url('/blog'); ?>">Blog Home </a></p>
				<?php if (have_posts()) : ?>

					<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
					<?php if (is_category()) { ?>
					<h1>Archive for the &ldquo;<?php single_cat_title(); ?>&rdquo; Category</h1>

					<?php } elseif(is_tag()) { ?>
					<h1>Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>

					<?php } elseif (is_day()) { ?>
					<h1>Prep Academy Tutors Blog Posts in <?php the_time('F jS, Y'); ?></h1>

					<?php } elseif (is_month()) { ?>
					<h1>Prep Academy Tutors Blog Posts in <?php the_time('F, Y'); ?></h1>

					<?php } elseif (is_year()) { ?>
					<h1>Prep Academy Tutors Blog Posts in <?php the_time('Y'); ?></h1>

					<?php } elseif (is_author()) { ?>
					<h1>Author Archive</h1>

					<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1>Blog Archives</h1>

				<?php } ?>
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

				<p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>

				<?php else : ?>

				<h1>Not Found</h1>
				<p>Sorry, but the requested resource was not found on this site.</p>

				<?php endif; ?>
			</main>
            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>   
    </div>
</section>
<!-- Footer -->
<?php get_footer(); ?>
