<?php get_header(); ?>

<div class="inner-content tutors-content">
	<div class="container-fluid">
		<?php 
		    $picture = types_render_field("picture", array("raw"=>"html"));
		    $name = types_render_field( "name", array("raw"=>"true") );
		    $subjects = types_render_field( "subjects", array("raw"=>"true") );
		    $grades = types_render_field( "grades", array("raw"=>"true") );
		    $bio = types_render_field( "bio", array("raw"=>"true") );
		?> 
		<div class="tutor-information">
			<div class="image">
				<?php echo $picture ?>
			</div>
			<div class="info">
				<div class="name"><h1><?php echo $name ?></h1></div>
				<div class="subjects">
					<h3>Subjects:</h3>
					<p><?php echo $subjects ?></p>
				</div>
				<div class="grades">
					<h3>Grade Levels:</h3>
					<p><?php echo $grades ?></p>
				</div>
				<div class="bio">
					<h3>About:</h3>
					<p><?php echo $bio ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
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