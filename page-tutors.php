<?php
/*
Template Name: Tutors Page
*/
?>
<!-- Header -->
<?php get_header(); ?>

<section class="inner-content tutors-content">
	<div class="tutors-filter">
		<div class="container-fluid">
			<div class="grades">
				<p>Narrow Your Search:</p>
				<select name="" class="form-control gradeFilter">
					<option value="reset">Search By Grade</option>
					<?php
					$args = array( 'post_type' => 'tutor', 'orderby' => 'date', 'order' => 'ASC');
				    $loop = new WP_Query( $args );
				    $uniqueGrades = array();
				    while ( $loop->have_posts() ) : $loop->the_post();
				    	$grades = types_render_field( "grades", array("raw"=>"true") );
				    	$gradesArray = explode(", ", $grades);
				    	foreach($gradesArray as $gradeArray) {
				    		if(!in_array($gradeArray, $uniqueGrades) && !empty($gradeArray)) {
				    			$uniqueGrades[] = $gradeArray;
				    		}
				    	} ?>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php foreach($uniqueGrades as $uniqueGrade) { ?>
						<option value="<?php echo $uniqueGrade; ?>"><?php echo $uniqueGrade; ?></option>
			    	<? } ?>
				</select>
			</div>
			<div class="subjects">
				<p>Or:</p>
				<select name="" id="" class="form-control subjectFilter">
					<option value="reset">Search By Subject</option>
					<?php
					$args = array( 'post_type' => 'tutor', 'orderby' => 'date', 'order' => 'ASC');
				    $loop = new WP_Query( $args );
				    $uniqueSubjects = array();
				     while ( $loop->have_posts() ) : $loop->the_post();
				     	$subjects = types_render_field( "subjects", array("raw"=>"true") );
				     	$subjectsArray = explode(", ", $subjects);
				     	foreach($subjectsArray as $subjectArray) {
				     		if(!in_array($subjectArray, $uniqueSubjects) && !empty($subjectArray)) {
				     			$uniqueSubjects[] = $subjectArray;
				     		}
				     	}
				     endwhile;
				     wp_reset_query();
				     foreach($uniqueSubjects as $uniqueSubject) { ?>
				     	<option value="<?php echo $uniqueSubject; ?>"><?php echo $uniqueSubject; ?></option>
				    <? } ?>
				</select>
			</div>
			<div class="names">
				<p>Or:</p>
				<select name="" id="" class="form-control nameFilter">
					<option value="reset">Search By Name</option>
					<?php
					$args = array( 'post_type' => 'tutor', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1);
				    $loop = new WP_Query( $args );
				    while ( $loop->have_posts() ) : $loop->the_post();
				    	$name = types_render_field( "name", array("raw"=>"true") ); ?>
				    	<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</select>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="tutors-list">
			<!-- 'paged' => get_query_var('paged') ? get_query_var('paged') : 1  -->
			<?php 
			    $args = array( 'post_type' => 'tutor', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => -1);
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post();
			
			    $picture = types_render_field("picture", array("raw"=>"html") );
			    $name = types_render_field( "name", array("raw"=>"true") );
			    $title = types_render_fielD( "title", array("raw"=>"true") );
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
			
			<div class="tutor-outer">
				<div class="image" style="background-image:url('<?php echo $imgSrc; ?>');"></div>
				<div class="info">
					<div class="name" data-name="<?php echo $name; ?>"><span class="upper"><?php echo $firstLetter ?></span><?php echo substr($firstName, 1); ?> <span class="upper"><?php echo $secondLetter; ?></span>.</div>
					<?php if(!empty($title)) { ?>
						<div class="title"><?php echo $title; ?></div>
					<? } ?>
					<div class="subjects">Subjects: <span><?php echo $subjects ?></span></div>
					<div class="grades">Grade Levels: <span><?php echo $grades ?></span></div>
					<button class="btn-info"><a href="<?php echo $link ?>">Meet <span class="button-name"><span class="upper"><?php echo $firstLetter; ?></span><?php echo substr($firstName, 1); ?></span></a></button>
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
		<a href="#" id="loadMoreTutors" class="btn-info load-more">Load More</a>
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