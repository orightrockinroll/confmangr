<?php

//if(isset($_POST['create_xml'])){
//        echo "Links Data Posted";

/* All Links data from the form is now being stored in variables in string format  
   $xmlBeg = "<?xml version='1.0' encoding='ISO-8859-1'?>"; 
   $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 
*/


  function writeXmlPages($xmlPageName,$xmlContent,$newEbTargetDir) {
       echo "writing xml pages...";
		
        $urlDoc = "page";
        $fileName = "pages".$xmlPageName;
         
		//$pageLoc = "xml_pages/" ;
	   
        $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

        $rootELementStart = "<$urlDoc>";

        $rootElementEnd = "</$urlDoc>";

        $xml_document=  $xmlBeg; 

        $xml_document .=  $rootELementStart;
		$id = "2001";
		/* pages */
		//$xml_document .=  "<btn id='$id'/>";		
        $xml_document .= $xmlContent;
		
        $xml_document .=  $rootElementEnd;

        //$path_dir = "./xml_pages/";
		$path_dir = $newEbTargetDir."/";

        $path_dir .= $fileName .".xml";

		/* Data in Variables ready to be written to an XML file */

		$fp = fopen($path_dir,'w');

        $write = fwrite($fp,$xml_document);

	/* Loading the created XML file to check contents */

	$sites = simplexml_load_file("$path_dir");

	echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
	echo "<br><br>Whats inside loaded XML file?<br>"; 
	print_r($sites);
	 return "done.";
   }


//}

?>
