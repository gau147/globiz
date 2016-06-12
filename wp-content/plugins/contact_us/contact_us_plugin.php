<?php
ob_start();
global  $wpdb;
?>	
<?php
/*
Plugin Name: Contact Us
Description: Plugin Provide functionality to View Contact Us details
Version: 1.6
Author: Promatics Technologies
*/?>
<?php
function Contact() 
{
	  	add_menu_page('Contact Us', 'Contact Us', '2', 'Contact','contact_dashboard','','150');
	    add_submenu_page('','View Contact','','2','View_Contact','view_contact');
	    
}
add_action( 'admin_menu', 'Contact' );
?>
<?php 
function contact_dashboard()
	{
		global  $wpdb;
		
		//include '../wp-config.php';
	
		include '../wp-content/plugins/contact_us/contact_us.php';
	}
function view_contact()
	{
		global  $wpdb;
		
		//include '../wp-config.php';
	
		include '../wp-content/plugins/contact_us/contact_us_message.php';
	}
	

?>