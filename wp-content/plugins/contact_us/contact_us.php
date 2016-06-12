<br/>
<!-------------------------------------------------------------------star rating-------------------------------------------------->


<head>

 <link type="text/css" rel="stylesheet" href=" <?php echo plugins_url( 'demo/css/application.css', __FILE__ );?>">

  <script type="text/javascript" src="<?php echo plugins_url( 'demo/js/jquery.min.js', __FILE__ );?>"></script>
  <script type="text/javascript" src="<?php echo plugins_url( 'lib/jquery.raty.min.js', __FILE__ );?>"></script>

		  
  

	
  <?php 
if(isset($_REQUEST['delete_id'])){	
	$contactdeleteid = $_REQUEST['delete_id'];
	//echo $processdeleteid;die;
	$wpdb->query("Delete from wp_contactus where id='".$contactdeleteid."'");
	echo '<p class="success">Message has been deleted sucessfully.</p>';
}
?>
<style>
.alignnone
{
float:left;
width:187px;
height:150px;
}
.success
{
	color:green;
}
</style>
<div class="wrap">

	<h2> Contact Us messages</h2>
	<table class="wp-list-table widefat fixed posts" cellspacing="0">
		<thead>
			<th class="manage-column column-categories" scope="col">
				Name
			</th>
            <th class="manage-column column-categories" scope="col">
				Email-id
			</th>        
			<th class="manage-column column-categories" scope="col">
				Message
			</th>
			
			<th class="manage-column column-categories" scope="col">
				Action
			</th>
			
		</thead>
		<tbody>
        <?php 
		    global $wpdb;
			if (isset($_GET["page1"]))
			{
				$page  = $_GET["page1"];
			}
			else
			{
				$page=1;
			}        
			$end = 10;  
				  
			$start = ($page-1) * $end;
        ?>
        <?php 
			$contact=$wpdb->get_results("select * from  wp_contactus order by id desc LIMIT ".$start.", ".$end);
			foreach($contact as $contact){	
			?>
			
            <tr>
				<td><?php echo $contact->name;?></td>
				<td><?php echo $contact->email; ?></td>
                <td><?php echo $show_history = substr($contact->message ,0,30); ?></td>
				<td><a onclick="return confirm('Are you sure you want to delete?')" href="admin.php?page=Contact&delete_id=<?php echo $contact->id;?>">Delete</a>&nbsp;|&nbsp;
                  <a href="admin.php?page=View_Contact&user_id=<?php echo $contact->id;?>">View Message</a>
              </td>
			</tr>		
		<?php } ?>
        <div style="float:right;">
        <?php
      $sql = "select IFNULL(count(*),0) as num_of_rows from wp_contactus";
                                                                               
                                       $query = $wpdb->get_results($sql);
                                      
                                       $count = $query[0]->num_of_rows;

                                       $count = ceil($count/$end);
                                       ?>
                   <ul style="list-style:none;">
                   <?php
                     for ($i=1; $i<=$count; $i++)
                      {
                    ?>
                   <li style="float:left; list-style:none outside none; padding:10px;background-color: #F1F1F1;margin-right: 5px;">
                    <div class="cat_pagination" style="width:auto;">

                                    <div style="float:right; width:auto;">
                                    <?php
                                    if(isset($_REQUEST['page1']) && $_REQUEST['page1']>=5){
                                    ?>
                                        <div style="float:left;"><?php echo "<a style='text-decoration:none;' href='admin.php?page=Contact&page1=".$i."'>First</a> "; 	?></div>
                                    <?php
                                     } ?>
                
                                <?php
                                    if(isset($_REQUEST['page1']) && $_REQUEST['page1']>=5){
                                        $start_row =$_REQUEST['page1']-3;
                                    } else {
                                        $start_row=1;
                                    }
                                    $counter=1;
                
                                    for ($i=$start_row; $i <=$count; $i++)
                
                                    { ?>
                                    <?php 
                
                                        if(empty($_REQUEST['page1'])){
                
                                            $_REQUEST['page1']=1;
                                        }
                
                                        if($_REQUEST['page1']==$i){
                
                                            echo "<a style='text-decoration:none;float:left;padding-left:5px;' href='admin.php?page=Contact&page1=".$i."'>".$i."</a> ";
                                        }
                
                                        else {	
                                            if($counter<=5){
                                                echo "<a style='text-decoration:none;float:left;padding-left:5px;' href='admin.php?page=Contact&page1=".$i."'>".$i."</a> ";
                                            }
                                        }    ?>	
                                    <?php	$counter++;
                                    }//end for loop
                                    if($count>5){
										$i= $i-1;
                                    ?>
                                        <div style="float:left;"><?php echo "..."."<a style='float:right;' href='admin.php?page=Contact&page1=".$i."'>Last</a> "; 	?></div>
                                    <?php
                                     }?>
                                    </div>
					</div> 
                     </li>
                      <?php
                       }
                      ?>
                  </ul>
   </div>
		</tbody>
	</table>
</div>