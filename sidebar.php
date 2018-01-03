<aside>
	<div class="widget recent-posts">
		<h2>Recent Posts</h2>
		<?php
            $args = array( 'post_type' => 'post', 'posts_per_page' => 5);
        	$query = new WP_Query( $args );
        ?>
      	<?php if ( $query->have_posts() ) : ?>
  		<ul class="post-list">
	  		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<div class="text"><p><?php the_title(); ?></p> <i class="fa fa-pencil"></i></div>
					</a>
				</li>
			<?php endwhile; ?>
	    </ul>
      	<?php endif; ?>
        <?php wp_reset_postdata(); ?>
	</div>
	<div class="widget popular-posts">
		<h2>Most Popular</h2>
		<?php $popularpost = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ); ?>
		<ul class="post-list">
			<?php while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<span class="text"><p><?php the_title(); ?></p> <i class="fa fa-pencil"></i></span>
				</a>
			</li>
 			<?php endwhile; ?>
		</ul>
	</div>
	<div class="widget archive-posts">
		<h2>Archives</h2>
		<?php $archives = array('type' => 'yearly', 'show_post_count' => true, 'echo' => 0, 'before' => '<li>', 'after' => '</li>', 'format' => 'styled'); ?>
		<ul class="post-list">
			<li>
				<span class="text"><?php echo wp_get_archives($archives); ?></span>
			</li>
		</ul>
	</div>
	<div class="cta-widget">
		<img src="<?php bloginfo('template_directory'); ?>/dist/images/sidebar-cta.jpg">
		<button class="btn-info"><a href="<?php echo home_url('/contact'); ?>">Contact Us to Get Started</a></button>
	</div>
</aside>