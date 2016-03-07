<?php
$pageFileName = $_POST['pageFileName'];
$xmlData = $_POST['xmlData'];

writeXmlPages_eb($pageFileName,$xmlData);

  function writeXmlPages_eb($xmlPageName,$xmlContent) {
       //echo "writing xml pages...";
		
        $urlDoc = "page";
        $fileName = "pages".$xmlPageName;         
	   
        $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

        $rootELementStart = "<$urlDoc>";

        $rootElementEnd = "</$urlDoc>";

        $xml_document= $xmlBeg; 

        $xml_document .= $rootELementStart;
		
		/* pages */
		//$xml_document .=  "<btn id='$id'/>";		
        $xml_document .= stripslashes($xmlContent);
		
        $xml_document .= $rootElementEnd;

        //$path_dir = "./xml_pages_eb/";
		//$path_dir = "xml_pages_eb/";

        $path_dir = $fileName.".xml";

		/* Data in Variables ready to be written to an XML file */
        
		$fp = fopen($path_dir,'w');

        //$write = fwrite($fp,$xml_document);
		if (fwrite($fp,$xml_document)) echo "writing=".$xmlPageName;
		else echo "writing=Error";
      
	    fclose($fp); 
	/* Loading the created XML file to check contents */

	$sites = simplexml_load_file("$path_dir");

	//echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
	//echo "<br><br>Whats inside loaded XML file?<br>"; 
	//print_r($sites);
	 return "writing=Done.";
   }
   
?>
