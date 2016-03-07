<?php

		$fbConfigSrc = $_POST['fbConfigSrc']; 
		$fbWidth = $_POST['fbWidth']; 
		$fbHeight = $_POST['fbHeight']; 
		$firstPage = $_POST['firstPage']; 
		$firstPageUrl = $_POST['firstPageUrl'];
		$firstPageHiUrl = $_POST['firstPageHiUrl'];
		$reverseFlip = $_POST['reverseFlip'];
		$debug = $_POST['debug'];
		$showInfoButton = $_POST['showInfoButton'];
		$initialLoading = $_POST['initialLoading'];
		$easeProduct = $_POST['easeProduct'];
		$easeProduct = $_POST['productTransition'];
		$easeBrochure = $_POST['easeBrochure'];
		$brochureTransition = $_POST['brochureTransition'];
		$allowScript = $_POST['allowScript'];
		
        $urlDoc = "eBrochure";               		        
		$ebFileName = "ebconfig";
         		
        $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

        $rootELementStart = "<$urlDoc>";

        $rootElementEnd = "</$urlDoc>";

        $xml_document=  $xmlBeg; 

        $xml_document .=  $rootELementStart;
		
		/* eb config */
		$xml_document .= "<fbConfigSrc>".$fbConfigSrc."</fbConfigSrc>"; 
		$xml_document .= "<fbWidth>".$fbWidth."</fbWidth>"; 
		$xml_document .= "<fbHeight>".$fbHeight."</fbHeight>"; 
		$xml_document .= "<firstPage>".$firstPage."</firstPage>"; 
		$xml_document .= "<firstPageUrl>".$firstPageUrl."</firstPageUrl>";
		$xml_document .= "<firstPageHiUrl>".$firstPageHiUrl."</firstPageHiUrl>"; 
		$xml_document .= "<reverseFlip>".$reverseFlip."</reverseFlip>";
		$xml_document .= "<debug>".$debug."</debug>"; 
		$xml_document .= "<showInfoButton>".$showInfoButton."</showInfoButton>"; 
		$xml_document .= "<initialLoading>".$initialLoading."</initialLoading>"; 
		$xml_document .= "<easeProduct>".$easeProduct."</easeProduct>"; 
		$xml_document .= "<productTransition>".$easeProduct."</productTransition>"; 
		$xml_document .= "<easeBrochure>".$easeBrochure."</easeBrochure>"; 
		$xml_document .= "<brochureTransition>".$brochureTransition."</brochureTransition>"; 
		$xml_document .= "<allowScript>".$allowScript."</allowScript>"; 
		
        $xml_document .=  $rootElementEnd;

		$path_dir = "./";

        $path_dir .= $ebFileName.".xml";

		/* Data in Variables ready to be written to an XML file */

		$fp = fopen($path_dir,'w+');

        $write = fwrite($fp,$xml_document);

		/* Loading the created XML file to check contents */

		$sites = simplexml_load_file("$path_dir");

		echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
		echo "<br><br>Whats inside loaded XML file?<br>"; 
		print_r($sites);
		header('Location: ebConfigForm.php');
?>
