<?php
require_once 'read_excel_file.php';
require_once 'write_xml_pages.php';
require_once 'write_xml_config.php';
require_once 'write_xml_config_eb.php';
require_once 'filename_checker.php';
require_once 'copy.php';

$configFileName = filename_checker($_POST['configFileName']);
$newEbDir = filename_checker($_POST['newEbDir']);
$newEbBaseProjSource = filename_checker($_POST['newEbBaseProjSource']);

if ($_FILES["file"]["error"] > 0 || $_FILES["zipFile"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  echo "Error: " . $_FILES["zipFile"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br />";

  
  //echo "Upload: " . $_FILES["zipFile"]["name"] . "<br />";
  //echo "Type: " . $_FILES["zipFile"]["type"] . "<br />";
  //echo "Size: " . ($_FILES["zipFile"]["size"] / 1024) . " Kb<br />";
  //echo "Stored in: " . $_FILES["zipFile"]["tmp_name2"] . "<br />";
  
    //if (file_exists("upload/" . $_FILES["file"]["name"]))
    //  {
    //  echo $_FILES["file"]["name"] . " already exists. ";
    //  }
    //else
    //  {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo " => Stored in: " . "upload/" . $_FILES["file"]["name"];
      
    ///  move_uploaded_file($_FILES["zipFile"]["tmp_name2"],
     // "upload/" . $_FILES["zipFile"]["name"]);
     //echo " => Stored in: " . "upload/" . $_FILES["zipFile"]["name"];
	  
	  /*
	    Copy the base project to the new project created.
	  */
	  full_copy("../ebBaseProjects/".$newEbBaseProjSource."/", "../ebProjects/".$newEbDir);
	  
	  /*
	    Function: parseExcel() - Perform parsing excel file
	  */	 
	  $filename = "upload/".$_FILES["file"]["name"];	  
	  $prod = parseExcel($filename);
	  
      echo"<pre>";
	  
	  //HINT: put the data on string and write to xml format.
	  $old = array();
	  $new = array();
	  $groupId = 0;
	 	  	  
	  for ($i = 1; $i <= count($prod); $i++) {
	    echo "PAGE NUMBER: " .$prod[$i][1]. ", PRODUCT DESC: " .$prod[$i][2] ." LINK: " .$prod[$i][3];
 
		$old[$i] = $prod[$i][1];		
		$pagesNumber = $prod[$i][0];
		$groupId = $pagesNumber;
		$pagesId = $prod[$i][1];
		$pagesLink = $prod[$i][3];				
		$splitLinkId = split('/',$pagesLink);

		$fileContent .= "<btn page='$pagesId' id='$splitLinkId[6]' link='$pagesLink'/>";
		
		if ($prod[$i][0] > 0) {		  		  		 
		  writeXmlPages($pagesNumber,$fileContent,"../ebProjects/".$newEbDir);
		  $fileContent = "";
		}
	  }
	                
	  	for($j=0;$j<count($old);++$j){
		   if(in_array($old[$j], $new) != "true"){
		     $new[] = $old[$j];
		   }
		} 			  
        $groupIdNew = $new;
	  
      //print_r($prod);	  
    //}	
	/*
	  Create configuration file for xml pages associated with images.
	*/
	writeXmlConfig($configFileName,$groupId,$groupIdNew,"../ebProjects/".$newEbDir);
	writeXmlConfig_eb($configFileName,"ebconfig","../ebProjects/".$newEbDir);
	
	//$url = "http://localhost/";
	$url = "http://www.xpydion.com/";
	$createdUrl = $url."ebConfigManager/ebProjects/".$newEbDir;
	$ebConfigUrl = $url."ebConfigManager/ebProjects/".$newEbDir."/ebConfigEditor";
	$createdDate = date("l F d, Y, h:i A");
	
	echo "<br/><br/>";
	echo '=[ Build Report ]===================================================================================================<br/>';	
	echo '=          Project link : <a href="'.$createdUrl.'">'.$createdUrl.'</a><br/>';		
	echo '=         ebConfig File : <a href="'.$ebConfigUrl.'">'.$ebConfigUrl.'</a><br/>';	
	echo '=          Date Created : '.$createdDate.'<br/>';
	echo '=                Author : <br/>';
	echo '====================================================================================================================';
  }
?>