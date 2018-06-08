<?php
/*
Template Name: Contact Page
*/
?>
<!-- Header -->
<?php get_header(); ?>


<section class="inner-content contact-content">
	<div class="content contact">
		<div class="row">
			<div class="col-sm-6">
				<div class="container-fluid">
					<h2>Prep Academy Tutors of <?php echo get_theme_mod('franchise_name') ?></h2>
					<p>Telephone: <span><?php echo get_theme_mod('phonenumber') ?></span></p>
					<div class="about-us-box">
						<div class="icon-container">
							<i class="fa fa-user"></i>
						</div>
						<div class="learning"><a href="http://prepacadtutors.wpengine.com/about-us/">Learn About Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<h2>Contact Us For More Information</h2>
				<div class="contact-page-form">
					<?php include (TEMPLATEPATH . '/dist/inc/contactForm.php'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>