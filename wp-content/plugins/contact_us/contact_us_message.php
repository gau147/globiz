<br/>
<?php 	
$userid= $_REQUEST['user_id'];

global $wpdb;
 $contact_res = $wpdb->get_results("select * from wp_contactus where id='".$userid."'");
 $contact_res = $contact_res[0];?>








<script type="text/javascript">
 setTimeout(function(){$(".success").hide()},3500);
</script>
<style>
.alignnone
{
float:left;
width:187px;
height:150px;
}
</style>

<?php 
$status = 0;
if(isset($_POST['reply']))
{

  $body= $_POST['mycustomeditor'];
  $subject= $_POST['msg_subject'];
 // $headers = "From: \"Thanks Infotech\" <http://www.globiztechnology.com/gcv/>\n";
  $email= $contact_res->email;
  //$subject= "Regarding Contact us reply from http://racedynamics.asia";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: <noreply@thanksinfotech.com>' . "\r\n";
$headers .= 'From: Thanks Infotech <noreply@thanksinfotech.com>' . "\r\n";
  $status= wp_mail( $email, $subject, $body, $headers );
}
 ?>
 <?php if($status==1){?>
 <div class="success"> Your reply has been sent.</div>
 <?php } ?>
<div class="wrap">
     <h2>View Message Send by-<span>"<?php echo $contact_res->name;?>"</span></h2>
     <div id="post-body">
     <form id="myform1" name="myform1" method="POST" action="" >
     	<div id="col-left" style="float:left">
        	<div class="col-wrap">
             	<div class="form-wrap">
                   <div id="get_state" class="form-field form-required">
            			 <label>Full Name</label>
                         <input name="fname" type="text" readonly value="<?php echo $contact_res->name; ?>">
                    </div>
					
                    <div id="city_market" class="form-field form-required">
            			 <label>Email-id</label>
                         <input name="email" type="text" readonly value="<?php echo $contact_res->email; ?>">
                    </div>
                    
                     <div id="name_market" class="form-field form-required">
            			 <label>Message</label>
           				 <textarea id="message" name="message" rows="10" cols="90" readonly><?php echo $contact_res->message; ?></textarea>
                    </div>
                    <div id="message_subject" class="form-field form-required">
            			 <label>Subject</label>
                         <input name="msg_subject" type="text"  placeholder="Enter subject here....">
                    </div>
                    <div id="message_reply" name="message_reply" class="form-field form-required">
            			<?php
                       $settings = array('textarea_rows'=>10);            			
            			 wp_editor('Enter Reply Here...','mycustomeditor',$settings); ?>
           				 </div>
                    <strong></strong>
					<div>
                    <p class="submit" style="width:100%; float:left;">
                    <input type="submit" name="reply" id="reply" style="margin-left:10px;" class="button-primary" value="Reply" />
					     <input type="button" style="margin-left:10px;" class="button-primary" value="Back to Contact us List" onclick="location.href='admin.php?page=Contact'"/></p>
					
				</div>
				
			   <td>
			   
			   
			   </div>
             </div> 
        </div>
    </form>       
                        
</div>
</div>