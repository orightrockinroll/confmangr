<?php
require_once 'filename_checker.php';
require_once 'copy.php';

	/**
	   This statement copy the default base files to the new created source base files.
	   The created new source base files found under "../ebBaseProjects/"
	**/	
	$newEbSourceDir = filename_checker($_POST['newEbSourceDir']);
	//$hostName = $_POST['hostName'];
	$hostName = $_SERVER['SERVER_NAME'];
    
	/*
	if ($hostName == 'xpydion.com') {
	   $hostName="/usr/local/apache/system";
	} else {
	   $hostName="http://localhost";
	}
	*/
	
	//full_copy("../ebBaseFiles/", "../ebBaseProjects/".$newEbSourceDir);		
	full_copy("../ebBaseFiles/", "../../".$newEbSourceDir);		
	
	//header('Location: http://www.xpydion.com/ebConfigManager/ebBaseProjects/'.$newEbSourceDir);		
	//header('Location: http://localhost/ebConfigManager/ebBaseProjects/'.$newEbSourceDir);			
	//$value = 'http://localhost/ebConfigManager/ebBaseProjects/'.$newEbSourceDir.'/file_uploader.php';
	//$value = 'http://localhost/ebConfigManager/jquery_file_uploader/index.php?source_target='.$newEbSourceDir;
	
	//$value = 'http://'.$hostName.'/iventures/build/ebConfigManager_v1.0/jquery_file_uploader/index.php?source_target='.$newEbSourceDir;
	//$value = 'http://www.xpydion.com/ebConfigManager_v1.0/jquery_file_uploader/index.php?source_target='.$newEbSourceDir;

	$value = 'http://'.$hostName.'/ebConfigManager_v2.0/jquery_file_uploader/index.php?source_target='.$newEbSourceDir;
	
	echo "target: " .$value;
	//$targetValue = "../../".$newEbSourceDir."/pages/";
	
    header('Location: '.$value);
	
   
?>