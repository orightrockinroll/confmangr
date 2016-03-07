<?php
include("multiple_file_upload_class.php");
 
$send_now = new multiple_upload;				//create instance
///home/httpd/vhosts/ade-solutions.nl/httpdocs/cees/upload/ doesw not work properly
//set some values         This is the whole path to! the upload dir
//$send_now->uploaddir 	= "/home/httpd/vhosts/ade-solutions.nl/httpdocs/cees/upload/";//set server upload dir
$send_now->uploaddir 	= "pages";
$send_now->max_files 	= 10;            		//set max files to upload
$send_now->max_size 	= 100000000;        		//set max file-size
$send_now->permission 	= 0777;			 		//set wanted permission
$send_now->notallowed 	= array("exe"."mp3");	//excluide some file-types
$send_now->show			= TRUE;					//show errors
$send_now->files 		= &$_FILES;				//get $_FILES global values

$result = 0;
//validate on size and allowed files
$ok = $send_now->validate();
if ($ok) {
	$ok = $send_now->execute();
    $result = 1;	
}
if (!$ok && $send_now->show) {
	//echo perhaps some errors
	$i_errors = count($send_now->errors);
	
	echo "Error report, sending files to server <br />";
	for ($i=0; $i<$i_errors;$i++) {
		echo $send_now->errors[0][$i] . " <br />";
		echo $send_now->errors[1][$i] . " <br />";
	}
	
	$result = 0;
} else {		
	//header('Location: '.$_SERVER['HTTP_REFERER']);
	$result = 1;
  
}
 
?>
<script language="javascript" type="text/javascript">
   window.top.window.stopUpload(<?php echo $result; ?>);
   
</script>