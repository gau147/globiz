<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>

	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		
	
	<link rel= "shortcut icon" href="<?php echo get_template_directory_uri();?>/favicon.ico">
	<!--<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">-->
	<!-- favicon -->
 
	<?php wp_head(); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/base.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/skeleton.css"/>
<link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet'/>
     
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/layout.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/colorbox.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/custom.css"/>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery1.min.js"></script>
    <!--[if lte IE 8]>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->	
		
	
</head>
<body>