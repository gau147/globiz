<?php
include ('../../../wp-config.php');
if(isset($_POST) && !empty($_POST['name'])){

$data=array(

'name'=>$_POST['name'],

'email'=>$_POST['email'],

'message'=>$_POST['message']

);


$format = array( '%s', '%s', '%s');


	if($wpdb->insert('wp_contactus', $data, $format))
	{
					//coded by  for mail Template

		$posts_array = $wpdb->get_results ("select * from wp_posts where ID = '72' ");

		$posts_meta = $wpdb->get_results ("select meta_value from wp_postmeta where post_id = 72");

		$template_content = $posts_meta[3]->meta_value;

		$replace = array('{name}','{email}','{message}');

		$with = array($_POST['name'],$_POST['email'],$_POST['message']);


		$subject_user = $posts_meta[2]->meta_value;

		$template_info = str_replace($replace,$with,$template_content);


		$emailTo_user = get_option('admin_email');

		$headers_user = "MIME-Version: 1.0" . "\r\n";

		$headers_user .= "Content-type:text/html; charset=UTF-8" . "\r\n";

		// Send mail 
		//echo $template_info; die;
		//mail($emailTo_user, $subject_user, $template_info,$headers_user); die;
			echo 1;
	}else{
			echo 2;
		}

}else{
	echo 2;
}
?>

