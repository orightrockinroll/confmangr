<?php
//$uploaddir = './uploads/'; 
$source_target = $_GET['source_target'];

//$uploaddir = "../ebBaseProjects/".$source_target."/pages/"; 
$uploaddir = "../../".$source_target."/pages/"; 
$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
$size=$_FILES['uploadfile']['size'];
if($size>100000000)
{
	echo "error file size > 1 MB";
	unlink($_FILES['uploadfile']['tmp_name']);
	exit;
}
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo "success"; 
} else {
	echo "error ".$_FILES['uploadfile']['error']." --- ".$_FILES['uploadfile']['tmp_name']." %%% ".$file."($size)";
}

?>