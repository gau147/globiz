<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo get_the_title();?></title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel= "shortcut icon" href="<?php echo get_template_directory_uri();?>/favicon.ico">
	<?php wp_head(); ?>
	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/base.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/skeleton.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/layout.css"/>
	
    <!--[if lte IE 8]>
        <script src="<?php echo get_template_directory_uri();?>/js/html5.js"></script>
    <![endif]-->		
		
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
</head>
<body>


	<!-- Primary Page Layout
	================================================== -->
	
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>	


	
	
	<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		$post_id = get_the_ID(); 
		
	?>

	<div class="singleproject-top">		
		<div class="container">
			<div class="ten columns">
				<?php 
					$sliderImages = get_images_src('work-size-detail',false,$post_id);
				?>
				<?php if(!empty($sliderImages)):?>
				<div id="slider">	
					<ul class="bxslider">
						<?php foreach($sliderImages as $sliderImage):?>
							<li>
								<img src="<?php echo $sliderImage[0];?>" alt=""/>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			<div class="six columns">
				<h3><?php echo get_the_title();?></h3>
				<?php 
					$client_name = get_field('client_name',$post_id); 
					$finished_date =  get_field('finished_date',$post_id); 
					$email_address = get_field('email_address',$post_id); 
					
				?>
				
				<?php if($client_name!=""):?>
					<p><strong>Client:</strong> <?php echo $client_name; ?></p>
				<?php endif;?>
				<?php if($finished_date!=""):?>
					<p><strong>Date:</strong> 
						<?php
							echo date('dS M Y',strtotime($finished_date));	
						?>
					</p>
				<?php endif;?>
				<?php if($email_address!=""):?>
					<p><strong>Email:</strong> <?php echo $email_address; ?></p>
				<?php endif;?>
				<p><strong>Tags:</strong> 
					<?php $selectedTerms = wp_get_post_terms($post_id, 'project', array("fields" => "names")); ?>
					<?php if(!empty($selectedTerms)){ echo implode(", ",$selectedTerms); }?>
				</p>
				<div class="btn-wrap">
					<p>
						<a class="live-preview" target="_blank" href="<?php echo get_field('site_url',$post_id); ?>">Live Preview</a>
					</p>
				</div>
			</div>
		</div>	
	</div>	
	<div id="singleproject">
		<div class="container">
			<div class="singleproject1-body">	
				<div class="sixteen columns">
					<h4>Project Description</h4>
					<?php echo get_the_content(); ?>
				</div>
			</div>
		</div>	
	</div>
	
	<?php
	// End the loop.
		endwhile;
	?>



	<!-- JAVASCRIPT
    ================================================== -->
  
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/singleproject1.js"></script>
<style>

</style>

<!-- End Document
================================================== -->
</body>
</html>	