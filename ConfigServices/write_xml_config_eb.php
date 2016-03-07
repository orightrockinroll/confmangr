<?php


/* All Links data from the form is now being stored in variables in string format  
   $xmlBeg = "<?xml version='1.0' encoding='ISO-8859-1'?>"; 
   $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 
*/
    function writeXmlConfig_eb($configFileName,$ebConfigFileName,$newEbTargetDir) {
        //$urlDoc = $_POST['urlDoc'];
		//$urlDes = $_POST['urlDes'];
		
        $urlDoc = "eBrochure";               		
        $fileName = $configFileName.".xml";
		$ebFileName = $ebConfigFileName;
         		
        $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

        $rootELementStart = "<$urlDoc>";

        $rootElementEnd = "</$urlDoc>";

        $xml_document=  $xmlBeg; 

        $xml_document .=  $rootELementStart;
		
		/* eb config */
		$xml_document .= "<fbConfigSrc>".$fileName."</fbConfigSrc>"; 
		$xml_document .= "<fbWidth>1024</fbWidth>"; 
		$xml_document .= "<fbHeight>647</fbHeight>"; 
		$xml_document .= "<firstPage>0</firstPage>"; 
		$xml_document .= "<firstPageUrl>pages/pLoBC.jpg</firstPageUrl>";
		$xml_document .= "<firstPageHiUrl>pages/pMeBC.jpg</firstPageHiUrl>"; 
		$xml_document .= "<reverseFlip>false</reverseFlip>";
		$xml_document .= "<debug>true</debug>"; 
		$xml_document .= "<showInfoButton>false</showInfoButton>"; 
		$xml_document .= "<initialLoading>10</initialLoading>"; 
		$xml_document .= "<easeProduct>true</easeProduct>"; 
		$xml_document .= "<productTransition>Regular.easeOut</productTransition>"; 
		$xml_document .= "<easeBrochure>true</easeBrochure>"; 
		$xml_document .= "<brochureTransition>Regular.easeOut</brochureTransition>"; 
		$xml_document .= "<allowScript>true</allowScript>"; 
		
        $xml_document .=  $rootElementEnd;

		$path_dir = $newEbTargetDir."/";

        $path_dir .= $ebFileName.".xml";

		/* Data in Variables ready to be written to an XML file */

		$fp = fopen($path_dir,'w');

        $write = fwrite($fp,$xml_document);

		/* Loading the created XML file to check contents */

		$sites = simplexml_load_file("$path_dir");

		echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
		echo "<br><br>Whats inside loaded XML file?<br>"; 
		print_r($sites);
	}

?>
