<?php

//if(isset($_POST['create_xml'])){

//        echo "Links Data Posted";

/* All Links data from the form is now being stored in variables in string format  
   $xmlBeg = "<?xml version='1.0' encoding='ISO-8859-1'?>"; 
   $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 
*/
    function writeXmlConfig($configFileName,$prodCount,$prodArray,$newEbTargetDir) {
        //$urlDoc = $_POST['urlDoc'];
		//$urlDes = $_POST['urlDes'];
		
        $urlDoc = "FlippingBook";               		
        $fileName = $configFileName;
         
		/*
		   $pageAlias - prefix name for pages1.xml file.
		*/	
		$pageAlias = "pages";
		$pageLoc = $newEbTargetDir."/" ;
	   
        $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

        $rootELementStart = "<$urlDoc>";

        $rootElementEnd = "</$urlDoc>";

        $xml_document=  $xmlBeg; 

        $xml_document .=  $rootELementStart;
		
		/* flipping config */
		$xml_document .= "<scaleContent>false</scaleContent>"; 
		$xml_document .= "<firstPage>0</firstPage>"; 
		$xml_document .= "<alwaysOpened>false</alwaysOpened>"; 
		$xml_document .= "<autoFlip>100</autoFlip>"; 
		$xml_document .= "<flipOnClick>false</flipOnClick>"; //true if clicable
		$xml_document .= "<staticShadowsDepth>1</staticShadowsDepth>"; 
		$xml_document .= "<dynamicShadowsDepth>1</dynamicShadowsDepth>";
		$xml_document .= "<moveSpeed>7</moveSpeed>"; 
		$xml_document .= "<closeSpeed>7</closeSpeed>"; 
		$xml_document .= "<gotoSpeed>7</gotoSpeed>"; 
		$xml_document .= "<flipSound>01.mp3</flipSound>"; 
		$xml_document .= "<pageBack>0xFFFFFF</pageBack>"; 
		$xml_document .= "<loadOnDemand>true</loadOnDemand>"; 
		$xml_document .= "<cachePages>true</cachePages>"; 
		$xml_document .= "<cacheSize>1000</cacheSize>"; 
		$xml_document .= "<preloaderType>None</preloaderType>"; 
		$xml_document .= "<userPreloaderId/>"; 
		$xml_document .= "<reverseFlip>false</reverseFlip>"; 
		$xml_document .= "<debug>true</debug>"; 
		$xml_document .= "<linkMode>true</linkMode>"; 
		$xml_document .= "<pageStat>false</pageStat>"; 
		
		$bcPage = "<page>page.swf?imgLoRes=pages/pLoBC.jpg&amp;imgMedRes=pages/pMeBC.jpg&amp;imgHiRes=pages/pHiBC.jpg</page>";
		$fcPage = "<page>page.swf?imgLoRes=pages/pLoFC.jpg&amp;imgMedRes=pages/pMeFC.jpg&amp;imgHiRes=pages/pHiFC.jpg</page>";
		
        $xml_document .= "<pages>";
		$xml_document .= $bcPage;
		
		echo " COUNT: " . $prodCount;
	    //for ( $counter = 0; $counter <= $prodCount; $counter += 1) { //2
		$isCreateInitialImg = false;
		for ($counter = 1; $counter < count($prodArray); $counter += 1) { //2
          
		  //TO DO: CHECK THE FIRST ARRAY VALUE AND CREATE REDSQR WITH XML FILE BEFORE FIRST VALUE OF ARRAY START.
		  
	      //$pageRedSqr = "page.swf?imgLoRes=pages/pLo".$counter.".jpg&amp;imgMedRes=pages/pMe".$counter.".jpg&amp;imgHiRes=pages/pHi".$counter.".jpg";		  
		  
		  if ($isCreateInitialImg == false) {
		     
			 for($initCounter = 2; $initCounter < $prodArray[$counter];$initCounter++) {
			   $pageRedSqr = "page.swf?imgLoRes=pages/pLo".$initCounter.".jpg&amp;imgMedRes=pages/pMe".$initCounter.".jpg&amp;imgHiRes=pages/pHi".$initCounter.".jpg";		
					$xml_document .= "<page>";
								
					   $pageAlias2 = $pageLoc.$pageAlias.$prodArray[$counter].".xml";			   					   
					   $pageAlias3 = "xml=".$pageAlias.$prodArray[$counter].".xml";
					   echo $pageAlias3;
					   
					   if (file_exists($pageAlias2)) { 			   
						 $xml_document .= $pageRedSqr."&amp;".$pageAlias3;
					   } else {
						 $xml_document .= $pageRedSqr; 
					   }
					
					$xml_document .=  "</page>";			   
			 }
					 
		     $isCreateInitialImg = true;
		  }
		  if ($isCreateInitialImg == true) {
		    $pageRedSqr = "page.swf?imgLoRes=pages/pLo".$prodArray[$counter].".jpg&amp;imgMedRes=pages/pMe".$prodArray[$counter].".jpg&amp;imgHiRes=pages/pHi".$prodArray[$counter].".jpg";		  
		  		  
			$xml_document .= "<page>";
						
               $pageAlias2 = $pageLoc.$pageAlias.$prodArray[$counter].".xml";			   			   
			   $pageAlias3 = "xml=".$pageAlias.$prodArray[$counter].".xml";
			   echo $pageAlias3;
			   
               if (file_exists($pageAlias2)) { 			   
			     $xml_document .= $pageRedSqr."&amp;".$pageAlias3;
 			   } else {
			     $xml_document .= $pageRedSqr; 
			   }
			
			$xml_document .=  "</page>";
			}
        }
		$xml_document .= $fcPage;		
		$xml_document .=  "</pages>";
        $xml_document .=  $rootElementEnd;

		$path_dir = $newEbTargetDir."/";
        $path_dir .= $fileName.".xml";

		/* Data in Variables ready to be written to an XML file */

		$fp = fopen($path_dir,'w');

        $write = fwrite($fp,$xml_document);

		/* Loading the created XML file to check contents */

		$sites = simplexml_load_file("$path_dir");

		echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
		echo "<br><br>Whats inside loaded XML file?<br>"; 
		print_r($sites);
	}


//}

?>
