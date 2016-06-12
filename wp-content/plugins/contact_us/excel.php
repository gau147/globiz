<?php
include("../excel_config.php");
$file = 'payment_detail';
$select = mysql_query("SELECT station_call_letter, station_url, mailing_address,city_state_zip,program_director,number_listner,contact_person,contact_phone,contact_email,ldos_air_time,repeat_na,match_result FROM wp_radio_station order by id desc",$con);
//$select=mysql_query("SELECT f_name AS First Name,l_name AS Last Name,email,address,city,state,zipcode,payment_type AS Payment Type,search AS Search Type FROM wp_payment_user order by id",$con);
$fields = mysql_num_fields($select);
$all_row_select = mysql_num_rows($select);
if($all_row_select!=0){
$j=1;	
for ($i = 0; $i < $fields; $i++ ) 
{
	if($i==0)
	{
		$header .= strtoupper('Sr. No') . ",";
	}
	$header .= strtoupper(mysql_field_name($select , $i)) . ",";
}
$header_row = explode(',',$header);
while($row = mysql_fetch_row($select)) 
{
	$line = '';
	foreach($row as $value) 
	{
		if ((!isset($value)) || ($value == "" ))
		{
			$value = ",";
		}
		else
		{
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
		}
		$line .=  $value;
	}
	$data .= '"'.$j.'"' .",". trim( $line ) . "\n";
$j++;}
$data = str_replace( "\r" , "" , $data );}
header('Content-type: application/csv');
header("Content-disposition: attachment; filename=".$file.".csv");
//$csv_file = fopen('php://output', 'w');
// fputcsv($csv_file,$header_row,',','"');
//fclose($csv_file);
//		  die;
print "$header\n$data";
exit;
?>