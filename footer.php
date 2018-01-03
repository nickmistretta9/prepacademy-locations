<footer class="site-footer">
	<div class="container-fluid">
		<div class="flex">
			<div class="links">
				<ul>
					<a href="<?php echo home_url('/work-with-us'); ?>">
						<li>Work With Us</li>
					</a>
					<a href="<?php echo home_url('/find-your-local-tutor'); ?>">
						<li>Find Your Local Tutor</li>
					</a>
					<a href="http://prepacadtutors.wpengine.com/blog/">
						<li>Blog</li>
					</a>
					<a href="/contact">
						<li>Contact</li>
					</a>
					<a href="franchise.prepacadtutors.wpengine.com">
						<li>Franchise Opportunities</li>
					</a>
					<a href="https://www.tutorpanel.com/login" target="_blank">
						<li>Tutor Login</li>
					</a>
					<a href="">
						<li>Site Map</li>
					</a>
					<a href="http://prepacadtutors.wpengine.com/privacy-policy/">
						<li>Privacy Policy</li>
					</a>
				</ul>
			</div>
			<div class="contact">
				<?php $number = get_theme_mod('phonenumber'); 
	        		  $number = str_replace(".", "", $number);
	        	?>
				<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_directory'); ?>/dist/images/logo.png"></a> <br>
				<a href="http://www.prepacademytutors.com">http://www.prepacademytutors.com/</a> <br>
				<div class="copy"><i class="fa fa-copyright"></i> All Rights Reserved. </div>
				<a class="phone" href="tel:<?php echo $number; ?>"><?php echo get_theme_mod('phonenumber') ?></a> <br>
				<div class="social-icons">
					<a href="https://www.linkedin.com/company/prep-academy-tutors?trk=nav_account_sub_nav_company_admin"><i class="fa fa-linkedin"></i></a>
					<a href="https://twitter.com/pattutors"><i class="fa fa-twitter"></i></a>
					<a href="https://www.facebook.com/PrepAcademyTutors"><i class="fa fa-facebook"></i></a>
				</div>
			</div>
			<div class="map">
				<div class="directions">
					<h3>Prep Academy Tutors of <?php echo get_theme_mod('franchise_name') ?>:</h3>
					<span><?php echo get_theme_mod('franchise_city'); ?>, <?php echo get_theme_mod('franchise_state'); ?> <?php echo get_theme_mod('franchise_zip'); ?></span>
				</div>
				<a href="" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/dist/images/scorp-logo.png" alt=""></a>
			</div>
		</div>
	</div>
</footer>

</div><!-- /st-content-inner -->
</div><!-- /st-content -->
</div><!-- /st-pusher -->
</div><!-- /st-container -->

<!-- build:js js/script.min.js -->
<script src="<?php bloginfo('template_directory'); ?>/dist/js/script.min.js"></script>
<!-- endbuild -->
<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqTD8-lvnh9Ur-ARjyvu96SHihwsUoRDg&callback=initMap" async defer></script>

<?php wp_footer(); ?>
</body>
</html>