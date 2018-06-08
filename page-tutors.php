<?php
/*
Template Name: Tutors Page
*/
?>
<!-- Header -->
<?php get_header(); ?>

<section class="inner-content tutors-content">
	<div class="container-fluid">
		<section class="tutor-filter">
			<div class="container-fluid">
				<div class="flex-row">
					<div class="grade-search">
						<p>Narrow Your Search:</p>
						<select name="" class="form-control">
							<option selected value="clear">Search By Grade</option>
						</select>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
					<div class="subject-search"></div>
					<div class="name-search"></div>
				</div>
			</div>
		</section>
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

			    $nameArray = explode(" ", $name);
			    $firstName = $nameArray[0];
			    $lastName = $nameArray[1];
			    $firstLetter = $firstName[0];
			    $secondLetter = $lastName[0];
			    preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $picture, $result); 
				$imgSrc = array_pop($result);
			   	$link = get_post_permalink();
			?> 
			
			<div class="tutor-outer" data-mh>
				<div class="image" style="background-image:url('<?php echo $imgSrc; ?>');"></div>
				<div class="info">
					<div class="name"><span class="upper"><?php echo $firstLetter ?></span><?php echo substr($firstName, 1); ?> <span class="upper"><?php echo $secondLetter; ?></span>.</div>
					<div class="subjects"><span>Subjects:</span> <?php echo $subjects ?></div>
					<div class="grades"><span>Grade Levels:</span> <?php echo $grades ?></div>
					<button class="btn-info"><a href="<?php echo $link ?>">Meet <?php echo $firstName ?></a></button>
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
<section class="home-contact">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6" data-mh>
				<img src="<?php bloginfo('template_directory'); ?>/dist/images/contact-img.png">
			</div>
			<div class="col-sm-6" data-mh>
				<div class="footer-contact">
					<?php include (TEMPLATEPATH . '/dist/inc/contactForm.php'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>