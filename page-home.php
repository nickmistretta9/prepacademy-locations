<?php
/*
Template Name: Home Page
*/
?>
<!-- Header -->
<?php get_header(); ?>

<section class="hero">
	<div class="hero-slider">
		<div><img src="<?php bloginfo('template_directory'); ?>/dist/images/hero.jpg" alt=""></div>
	</div>
	<div class="hero-caption">
		<img src="<?php bloginfo('template_directory'); ?>/dist/images/hero-caption.png">
	</div>
</section>
<section class="ctas">
	<div class="container-fluid">
		<div class="flex">
			<div class="cta-box">
				<p class="title" data-mh>Making Parents and Kids Happy</p>
				<div class="cta-action">
					<a href="http://prepacadtutors.wpengine.com/testimonials/">Our Reviews</a>
				</div>
			</div>
			<div class="cta-box">
				<p class="title" data-mh>All PAT Tutors are Certified Teachers</p>
				<div class="cta-action">
					<a href="<?php echo home_url('/our-tutors'); ?>">Our Tutors</a>
				</div>
			</div>
			<div class="cta-box">
				<p class="title" data-mh>Get the Tutoring Your Student Needs</p>
				<div class="cta-action">
					<a href="http://prepacadtutors.wpengine.com/our-services/">Our Services</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="why-prep">
	<div class="container-fluid">
		<div class="header">
			<h2>Why Prep Academy Tutors?</h2>
		</div>
		<div class="flex">
			<div class="first-third">
				<div class="sub">
					<div class="icon-container"></div>
					<div class="text">
						<h3>Certified Teachers</h3>
						<p>Our tutors have proper experience and qualifications to make sure your student succeeds.</p>
					</div>
				</div>
				<div class="sub">
					<div class="icon-container"></div>
					<div class="text">
						<h3>Flexible In-Home Tutoring</h3>
						<p>Our tutors come to you at the times you decide, so tutoring fits into your and your c hild's schedule.</p>
					</div>
				</div>
			</div>
			<div class="second-third">
				<h3>We offer tutoring with a personal side!</h3>
				<p>We are communicators! You will receive phone calls instead of emails and face to face meetings with our tutors whenever possible. We always provide feedback and illustrate the progress that is made so that everyone is on the same page. We only hire teachers. You can rest assured that our tutors bring proper experience and qualifications to teach your child.</p>
			</div>
			<div class="third-third">
				<div class="sub">
					<div class="icon-container"></div>
					<div class="text">
						<h3>Personal Attention</h3>
						<p>We offer a high level of service, professionalism and work to form a bond with your child.</p>
					</div>
				</div>
				<div class="sub">
					<div class="icon-container"></div>
					<div class="text">
						<h3>Boost Your Child's Confidence</h3>
						<p>Improved grades and understanding of subject matter often results in a boost in your child's confidence.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="tutor-section">
	<div class="container-fluid">
		<h2>Meet Our Tutors Of</h2>
		<h3><?php echo get_theme_mod('franchise_name') ?></h3> <br>
		<button class="btn-info"><a href="<?php echo home_url('/our-tutors'); ?>">Meet All Our Tutors</a></button>
	</div>
</section>
<section class="what-we-do">
	<div class="container-fluid">
		<h2>What We Do</h2>
		<ul class="wwd-list">
			<li>
				<i class="fa fa-university"></i>
				<p>JK to Grade 12</p>
			</li>
			<li>
				<i class="fa fa-book"></i>
				<p>All Subjects - Math, English, French, Science and More!</p>
			</li>
			<li>
				<i class="fa fa-graduation-cap"></i>
				<p>We Work With Your Student's Current Class Curriculum</p>
			</li>
			<li>
				<img src="<?php bloginfo('template_directory'); ?>/dist/images/icon-certificate.png">
				<p>ACT/SAT Test Prep</p>
			</li>
			<li>
				<i class="fa fa-users"></i>
				<p>In-Home Tutoring - We Come to You</p>
			</li>
			<li>
				<img src="<?php bloginfo('template_directory'); ?>/dist/images/icon-ruler.png">
				<p>Remedial Programs</p>
			</li>
			<li>
				<img src="<?php bloginfo('template_directory'); ?>/dist/images/icon-diploma.png">
				<p>Enrichment Programs</p>
			</li>
		</ul>
		<button class="btn-info"><a href="http://prepacadtutors.wpengine.com/how-we-work">Learn About How We Work</a></button>
	</div>
</section>
<section class="map-area">
	<div id="map"></div>
	<div class="location-search">
		<div class="text">
			<img src="<?php bloginfo('template_directory'); ?>/dist/images/location-search.png">
		</div>
		<div class="search">
			<p>Our tutors come to your home in <?php echo get_theme_mod('franchise_name') ?></p>
			<button class="btn-info"><a href="<?php echo home_url('/find-your-local-tutor'); ?>">Find Another Location</a></button>
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

<!-- Footer -->
<?php get_footer(); ?>