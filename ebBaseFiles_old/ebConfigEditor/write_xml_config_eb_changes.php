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
		
		//fbConfig.xml
		$scaleContent = $_POST['scaleContent']; 
		$firstPage = $_POST['firstPage']; 
		$alwaysOpened = $_POST['alwaysOpened']; 
		$autoFlip= $_POST['autoFlip']; 
		$flipOnClick = $_POST['flipOnClick']; 
		$staticShadowsDepth = $_POST['staticShadowsDepth']; 
		$dynamicShadowsDept = $_POST['dynamicShadowsDepth'];
		$moveSpeed = $_POST['moveSpeed']; 
		$closeSpeed= $_POST['closeSpeed']; 
		$gotoSpeed = $_POST['gotoSpeed']; 
		$flipSound = $_POST['flipSound']; 
		$pageBack = $_POST['pageBack']; 
		$loadOnDemand = $_POST['loadOnDemand']; 
		$cachePages= $_POST['cachePages']; 
		$cacheSize= $_POST['cacheSize'];
		$preloaderType = $_POST['preloaderType']; 
		$userPreloaderId = $_POST['userPreloaderId'];
		$reverseFlip = $_POST['reverseFlip'];
		//$debug = $_POST['debug']; 
		$linkMode = $_POST['linkMode']; 
		$pageStat = $_POST['pagestart'];
		
		$pages = $_POST['page'];		
		$pagesTag = "";
		
		for ($i = 0; $i < count($pages); $i++) {
		  $page = $_POST['page'][$i];		  		  
		  $pagesTag .= "<page>".xmlEntities($page)."</page>";		  
		}
						
		//echo $pagesTag;
				
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

		$path_dir = "../";

        $path_dir .= $ebFileName.".xml";

		/* Data in Variables ready to be written to an XML file */

		$fp = fopen($path_dir,'w+');

        $write = fwrite($fp,$xml_document);

		/* Loading the created XML file to check contents */

		$sites = simplexml_load_file("$path_dir");

		//echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
		//echo "<br><br>Whats inside loaded XML file?<br>"; 
		//print_r($sites);
		
		//writing fbConfig.xml
		$urlDoc = "";
		$fbFileName = "";
		$xmlBeg = "";
		$rootELementStart = "";
		$rootElementEnd = "";
		$xml_document = "";
		$path_dir = "";
		
        $urlDoc = "FlippingBook";               		        
		$fbFileName = $fbConfigSrc;
         		
        $xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

        $rootELementStart = "<$urlDoc>";

        $rootElementEnd = "</$urlDoc>";

        $xml_document =  $xmlBeg; 

        $xml_document .=  $rootELementStart;
		
		/* fb config */
		
		$xml_document .= "<scaleContent>".$scaleContent."</scaleContent>"; 
		$xml_document .= "<firstPage>".$firstPage."</firstPage>"; 
		$xml_document .= "<alwaysOpened>".$alwaysOpened."</alwaysOpened>"; 
		$xml_document .= "<autoFlip>".$autoFlip."</autoFlip>"; 
		$xml_document .= "<flipOnClick>".$flipOnClick."</flipOnClick>"; 
		$xml_document .= "<staticShadowsDepth>".$staticShadowsDepth."</staticShadowsDepth>"; 
		$xml_document .= "<dynamicShadowsDept>".$dynamicShadowsDept."</dynamicShadowsDept>"; 
		$xml_document .= "<moveSpeed>".$moveSpeed."</moveSpeed>"; 
		$xml_document .= "<closeSpeed>".$closeSpeed."</closeSpeed>"; 
		$xml_document .= "<gotoSpeed>".$gotoSpeed."</gotoSpeed>"; 
		$xml_document .= "<flipSound>".$flipSound."</flipSound>"; 
		$xml_document .= "<pageBack>".$pageBack."</pageBack>"; 
		$xml_document .= "<loadOnDemand>".$loadOnDemand."</loadOnDemand>"; 
		$xml_document .= "<cachePages>".$cachePages."</cachePages>"; 
		$xml_document .= "<cacheSize>".$cacheSize."</cacheSize>"; 
		$xml_document .= "<preloaderType>".$preloaderType."</preloaderType>"; 
		$xml_document .= "<userPreloaderId>".$userPreloaderId."</userPreloaderId>"; 
		$xml_document .= "<reverseFlip>".$reverseFlip."</reverseFlip>"; 
		$xml_document .= "<debug>".$debug."</debug>"; 
		$xml_document .= "<linkMode>".$linkMode."</linkMode>"; 
		$xml_document .= "<pagestart>".$pagestart."</pagestart>";
        $xml_document .= "<pages>".$pagesTag."</pages>";		
		
        $xml_document .=  $rootElementEnd;

		$path_dir = "../";

        $path_dir .= $fbFileName;

		/* Data in Variables ready to be written to an XML file */

		$fp = fopen($path_dir,'w+');

        $write = fwrite($fp,$xml_document);

		/* Loading the created XML file to check contents */

		$sites = simplexml_load_file("$path_dir");

		//echo "<br> Checking the loaded file <br>" .$path_dir. "<br>";
		//echo "<br><br>Whats inside loaded XML file?<br>"; 
		//print_r($sites);
		
		header('Location: index.php');
		
		function xmlEntities($string)
		{
			return str_replace ( array ( '&', '"', "'", '<', '>' ), array ( '&amp;' , '&quot;', '&apos;' , '&lt;' , '&gt;' ), $string );
		}
?>		

