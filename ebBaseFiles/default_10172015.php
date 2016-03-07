<?php

   session_start();
   
?>
<!DOCTYPE html>
<html>
<head><title>
	eBrochure
</title>


	<link href="./css/redsqr.css" rel="stylesheet" type="text/css" />
	<link href="./css/styles.css" rel="stylesheet" type="text/css" />
	<link href="./css/colorbox.css" rel="stylesheet" type="text/css" />
	<link href="./css/simple-pop-up.css" rel="stylesheet" type="text/css" />

    <script type='text/javascript' src="./js/jquery-1.3.2.min.js"></script> 	
    <script type='text/javascript' src="./js/dragresize.js"></script>   
	<script type='text/javascript' src="./js/jquery.colorbox.js"></script>
	<script type='text/javascript' src="./js/redsqr.js"></script>
	<script type='text/javascript' src="./js/fullmode.js"></script>
	  




	
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".pageGroup").colorbox({rel:'nofollow'}); //nofollow/pageGroup
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					//$('#click').css({"background-color":"#fff", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					//$.colorbox.close();

					
					return false;
				});	
				
				$("#cboxPhoto").click(function() {
				    alert('unload...');
				} );
				
				//$("#maxIcon").click( function() { alert('test'); return false;});
				$(".pageGroup").colorbox({
					onOpen:function(){},
					onLoad:function(){
					
					},
					onComplete:function(){ 
					
					  var y = document.frmEditor.yAxis.value;
					  window.scrollTo(0, y); 
					  

					}, 
					onCleanup:function(){},
					onClosed:function(){ 					  
					  window.scrollTo(0, 0);
					  document.frmEditor.yAxis.value = 0;
					  
					  $('#cboxClose').click();
					  
					}
				});				
				
			});		
	
		</script>

<?php

  //session_start();
  
//error_reporting(E_ALL);
//ini_set('display_errors', '1');	  


  $viewOnEditMode = 'false';
  $isDraggable = 'false';
  $catConfigXML = simplexml_load_file('cat-config.xml');// or createXmlCatConfig();
  $editMode = 0;
  $pageCount_ = 0;
  $pageCount_ = $catConfigXML["pageCount"];
  $editMode = $catConfigXML["editMode"];
  $isDraggable = $catConfigXML["draggable"];
  
  $isEdit = (isset($_GET['emode']) && $_GET['emode'] != '') ? $_GET['emode'] : $isEdit = '0';
	   
  $nav = (isset($_GET['nav']) && $_GET['nav'] != '') ? $_GET['nav'] : $nav = '';	  
  
  $pageCount = $pageCount_;

	    $view_mode = 'imgOpa pageGroup';   
		$edit_mode = 'drsElement drsMoveHandle';

		   if($nav == 'left' && $isEdit == 0){

            if (isset($_SESSION['page_no_restore'])){
		      	
		      	$pageno = $_SESSION['page_no_restore'];
		      	unset($_SESSION['page_no_restore']);

		   	}else{

		   		$pageno = $_SESSION['page_no'] - 2;
		   	}

			//setcookie('page_no', $pageno, time()+3600*24*(2));   
	        $_SESSION['page_no'] = $pageno;
	        $pageno_ = $_SESSION['page_no'];
			}else{
							
				if (isset($_SESSION['page_no']))				
				  $pageno_ = $_SESSION['page_no'];
				  
			}

		   if($nav == 'right' && $isEdit == 0){

		   	if (isset($_SESSION['page_no_restore'])){		   	
		   	   
		   	   $pageno = $_SESSION['page_no_restore'];
		   	   unset($_SESSION['page_no_restore']);
            }else{

				$pageno = $_SESSION['page_no'] + 2; 
            }

	        $_SESSION['page_no'] = $pageno; 
			//setcookie('page_no', $pageno, time()+3600*24*(2));      
	        $pageno_ = $_SESSION['page_no'];
		   }else{

				if (isset($_SESSION['page_no']))	
				   $pageno_ = $_SESSION['page_no'];
			
			}

		   /*
		   if($nav == "" && $editMode == 0){
	        $_SESSION['page_no'] = 1;
			$pageno_ = $_SESSION['page_no']; 
		    
		   }*/

		   if($pageno_ > $pageCount){
		   	unset( $_SESSION['page_no']);
		   	$_SESSION['page_no'] = 1;
			$pageno_ = $_SESSION['page_no'];
		   
		   } else if ($pageno_ < 1){
		    //unset( $_SESSION['page_no']);
		    $_SESSION['page_no'] = $pageCount;
			$pageno_ = $_SESSION['page_no'];
		   }
	   
	   	if ($isEdit == 1) { 
	   	  $_SESSION['page_no_restore'] = $pageno_;
	   	   
	    }

?>


    <script type="text/javascript">

        $(function() {
            $('.imgOpa').each(function() {
                $(this).hover(
                    function() {
                        $(this).stop().animate({ opacity: 0.6 }, 200);  //1.0
                    },
                   function() {
                       $(this).stop().animate({ opacity: 0.01 }, 800);
                   })
                });
        });
    </script>
	
<style type="text/css">

</style>

<style type="text/css">
#crop {
width: 100px;
height: 100px;
overflow: hidden;
}

</style>

<script type="text/javascript">
//<![CDATA[

// Using DragResize is simple!
// You first declare a new DragResize() object, passing its own name and an object
// whose keys constitute optional parameters/settings:

var dragresize = new DragResize('dragresize',
 { minWidth: 10, minHeight: 10, minLeft: 0, minTop: 10, maxLeft: 1600, maxTop: 1024 });

// Optional settings/properties of the DragResize object are:
//  enabled: Toggle whether the object is active.
//  handles[]: An array of drag handles to use (see the .JS file).
//  minWidth, minHeight: Minimum size to which elements are resized (in pixels).
//  minLeft, maxLeft, minTop, maxTop: Bounding box (in pixels).

// Next, you must define two functions, isElement and isHandle. These are passed
// a given DOM element, and must "return true" if the element in question is a
// draggable element or draggable handle. Here, I'm checking for the CSS classname
// of the elements, but you have have any combination of conditions you like:

dragresize.isElement = function(elm)
{
 if (elm.className && elm.className.indexOf('drsElement') > -1) return true;
};
dragresize.isHandle = function(elm)
{
 if (elm.className && elm.className.indexOf('drsMoveHandle') > -1) return true;
};

// You can define optional functions that are called as elements are dragged/resized.
// Some are passed true if the source event was a resize, or false if it's a drag.
// The focus/blur events are called as handles are added/removed from an object,
// and the others are called as users drag, move and release the object's handles.
// You might use these to examine the properties of the DragResize object to sync
// other page elements, etc.

dragresize.ondragfocus = function() { };
dragresize.ondragstart = function(isResize) { };
dragresize.ondragmove = function(isResize) { };
dragresize.ondragend = function(isResize) { };
dragresize.ondragblur = function() { };

// Finally, you must apply() your DragResize object to a DOM node; all children of this
// node will then be made draggable. Here, I'm applying to the entire document.
dragresize.apply(document);

//]]>
</script>

<script type="text/javascript">
function getDivCoords()
{
var divTag = document.getElementsByTagName("div");

var elmX = 0;
var elmY = 0;
var elmW = 0;
var elmH = 0;
var coords = "";

var i = 0;
for(i=0;i<divTag.length;i++) {

  elmX = divTag[i].style.left;
  elmY = divTag[i].style.top;
  elmW = divTag[i].offsetWidth;
  elmH = divTag[i].offsetHeight;	
    
    if(parseInt(divTag[i].id)){
          
        coords += '&lt;btn ' + divTag[i].title + ' seq=&quot;'+ divTag[i].id + '&quot;' + ' x=&quot;' + 
		elmX +'&quot; y=&quot;' + elmY + '&quot; w=&quot;' + 
		elmW +'px&quot; h=&quot;' + elmH + 'px&quot; ' + '/&gt;' + '\n';
          
    }
    
}
//alert(coords);

document.getElementById("xmlData").value = coords;

}
</script>

		<script>
		function allowDrop(event) {
			event.preventDefault();
		}

		function drag(event) {
			event.dataTransfer.setData("text", event.target.id);
		}

		function drop(event, navLeftRight, isDraggable) {
			event.preventDefault();
			if (isDraggable == 'true') {			   	
			   window.location.href = 'default.php?nav='+ navLeftRight +'&emode=0';
			//alert(event.target.id);
			//var data = event.dataTransfer.getData("text");
			//event.target.appendChild(document.getElementById(data));
			//alert(document.getElementById(data));
			} else {
				alert('Drag and drop navigation is not available. Please set draggable to true and try again. Thank you.');
			}
		}
		</script>


</head>
<body>
   <!--<div id="imageDiv"></div>-->
   
   
    <?php
       	//$isEdit = 0;
      
        /* 	
       	if(isset($_GET['emode']) == '1')
       	  $isEdit = 1; //true
       	
		if(isset($_GET['emode']) == '0' || $_GET['emode'] == '')
	      $isEdit = 0; //false	      
			 
		if(!isset($_GET['emode']))
		  $isEdit = 0; //false	
	   	 
	    */
	   // echo $isEdit;
		

	  // print_r($pageno_);
	  //$pageno_ = 1;
	  
	    //$pageno = $page_num;
	   //echo $page;
    ?>
   <!--<div id="mydiv" onclick="get_id()" style='border-width:1px;border-color:#C0C0C0;border-style: solid;background-color:#C0C0C0;width:130px;height:10px;'></div>-->
 
 <form id="frmEditor" name="frmEditor" action="write_xml_pages.php" method="post" onsubmit="getDivCoords();" enctype="multipart/form-data">
	<input name="yAxis" size="6" style="font-size: 1px;visibility: hidden;" />
	<input name="xmlData" id="xmlData" style="font-size: 1px;visibility: hidden;" />
	<input name="pageNo" id="pageNo" value="<?php echo $pageno_; ?>" style="font-size: 1px;visibility: hidden;" />
	<input name="addNewRedsqr" id="addNewRedsqr" value="<btn page='0' id='0' link='http://productlink/default'/>" style="font-size: 1px;visibility: hidden;" />
    <!--<input type="button" onclick="fullScreenApi.requestFullScreen(document.documentElement)" value="[]"/>-->
     <?php	 

        //if($isEdit == 1){
		if ($editMode == 1) {

     ?>

     <div style="position:absolute;background-color:#2C353F;color:#E4E8EC;font-family:Arial, Helvetica, sans-serif;top:0px;margin-left: auto;
       margin-right: auto;left: 0;
       right: 0;">
       <input name="btnGenerate" type="submit" id="btnGenerate" value="Save Changes" title="Save Changes" onclick="return confirm('Continue to ' + this.value +'?');"/>
	   <!--<input name="btnEditMode" type="submit" id="btnEditMode" value="Edit Mode" title="Edit Mode" onclick="document.location.href='default.php?nav=&emode=1';"/>-->
	   <a href="default.php?nav=&emode=1" style="color:#FFD47F;"><img id="editRs" src="./images/edit.jpg" style="border:none;height:12px;" />Edit Mode</a>&nbsp;&nbsp;
       <input type="checkbox" id="cloneRedsqr" name="cloneRedsqr" onclick="javascript:enableCloneRedsqr();" >Clone redSqr's	
	   <input type="checkbox" id="editRedsqr" name="editRedsqr" onclick="javascript:enableEditRedsqr();" >Edit redSqr's	
	   <input type="checkbox" id="destroyRedsqr" name="destroyRedsqr" onclick="javascript:enableDestroyRedsqr();" >Delete redSqr's
       &nbsp;&nbsp;| Enter product link: <input type="text" id="productLink" value="http://domain-name/product-id" size="98" />	   

	   
     </div>

     <?php
		}

	?> 
	<div id="divContainer" style="position:absolute;width:100%;height:800px;" >
	
		<div id="main" style="position:relative;width:1200px;height:800px;
		   margin-left: auto;
		   margin-right: auto;
		   left: 0;
		   right: 0;">

		<!-- navigate left page-->
		<?php
			$pageLeft = './pages/pHi'.$pageno_.'.jpg';
		?>
		<div style="float:left;position: relative;width: 600px;" onclick="getXyLocation(event);">
			<!--<img id="Image1" class="imgOpa" src="./images/tran1.png" style="border-width:0px;" />-->
			<a class="pageGroup" href="<?php echo $pageLeft; ?>" >	
				<img id="left" src="<?php echo $pageLeft; ?>" style="width: 600px;height: 700px;" draggable="<?php echo $isDraggable; ?>" ondragstart="drag(event)"/>
			</a>
			<div id="nav_left" style="position:relative; float: left;top:-420px;z-index:2020" ondrop="drop(event, 'left', '<?php echo $isDraggable; ?>')" ondragover="allowDrop(event)"> <!-- left:-60px; -->
	
				<a href="default.php?nav=<?php echo 'left&emode='. $isEdit;?>">
				<img id="Image1" src="./images/left.png" align="left" style="border:none;width:80px;height:120px;" /></a>
			</div> 
		 
			<input id="xy" type="text" value="testing" style="width: 200px;visibility: hidden;" />
		 
		 </div>
		 
		 <!-- navigate right page-->
		<?php
			$pageRight = './pages/pHi'.++$pageno_.'.jpg';
		?>	 
		<div style="float:right;position: relative;width: 600px;" onclick="getXyLocation(event);" >
			<a class="pageGroup" href="<?php echo $pageRight; ?>" >	
				<img id="right" src="<?php echo $pageRight; ?>" style="width: 600px;height: 700px;" draggable="<?php echo $isDraggable; ?>" ondragstart="drag(event)"/>
			</a>	
			<div id="nav_right" style="position:relative; float: right;top:-420px;z-index:2020" ondrop="drop(event, 'right', '<?php echo $isDraggable; ?>')" ondragover="allowDrop(event)" > <!-- left:60px; -->
				<a href="default.php?nav=<?php echo 'right&emode='. $isEdit;?>">
				<img id="Image2" src="./images/right.png" align="right" style="border:none;width:80px;height:120px;" /></a>
			</div>
		</div>	
		<?php
			//echo $pageLeft;
			//echo $pageRight;

		?> 	   
	  </div>

	   <div style="float:right;position: relative;top:-90px;width:1220px;">

		<?php
		//$catConfigXML = simplexml_load_file('cat-config.xml') or createXmlCatConfig();
		//foreach($catConfigXML as $config) {
			
			$advanceLoadingPages = $catConfigXML['advanceLoadingPages'];
			
			 $advLoadingPages = $pageno_ + $advanceLoadingPages; 
			 $i = $pageno_ + 1;	 

			 for (;$i<=$advLoadingPages;$i++)
			 {
			  $img = './pages/pHi'.$i.'.jpg';
			 ?>
			 <a class="pageGroup" href="<?php echo $img; ?>" >
				<img id="thumbImages" src="<?php echo $img; ?>" style="width: 60px;height: 70px;border-width:0px; " />
			 </a>  
		 
			 <?php
			
			 }	

		// }
		 ?>

		</div>

	<?php
	unset($i);
	
    $divId = 0;
	//$page = 'pages'.$pageno_.'.xml';
	$pageNoLeft = $pageno_ -1;
	$pageNoRight = $pageno_;
	
	$page = 'pages'.$pageNoLeft.'_'.$pageNoRight.'.xml';
	
    $pages = simplexml_load_file($page) or createDefaultXmlPages($pageNoLeft.'_'.$pageNoRight); //die("Error: Cannot create object from XML file ".$page);
	
	//echo "loaded: " . $page;
	 
    foreach ($pages as $pagesinfo){
    		
    	$page=$pagesinfo['page'];
		//$id=$pagesinfo['id'];
        $link=$pagesinfo['link'];
		$coordinates ='';
		//$coordinates='width:'.$pagesinfo['w'] .';height:'.$pagesinfo['h'] .';left:'. $pagesinfo['x'] .';top:'.$pagesinfo['y'].';';
		
		if($pagesinfo['w'] == "" || $pagesinfo['w']==NULL)
			$pagesinfo['w'] = '256px';
					
		if($pagesinfo['h'] == "" || $pagesinfo['h']==NULL)
			$pagesinfo['h'] = '256px';
		
		if($pagesinfo['x'] == "" || $pagesinfo['x']==NULL)
			$pagesinfo['x'] = '320px';			
			
		if($pagesinfo['y'] == "" || $pagesinfo['y']==NULL)
			$pagesinfo['y'] = '320px';
				
		
		$coordinates='width:'.$pagesinfo['w'] .';height:'.$pagesinfo['h'] .';left:'. $pagesinfo['x'] .';top:'.$pagesinfo['y'].';';
		 
	
		//$url = 'page=&quot;'.$page.'&quot;' . ' id=&quot;'.$id.'&quot;' . ' link=&quot;'.$link.'&quot;';
		$url = 'link=&quot;'.$link.'&quot;';
		$divId++;	    
        
		
		//echo $coordinates;	
	
	?>

	    <div id="<?php echo $divId;?>" class="<?php if($isEdit == 1){echo $edit_mode;} else { echo $view_mode;} ?>" title="<?php echo $url; ?>" onclick="<?php if($isEdit == 1) echo 'javascript:destroyEditCloneDiv(this.id)'; else echo 'javascript:getXyLocation(event)'; ?>"
	              style="position:float;background-color:#CC3333;border:solid 0px #F8CB7F;z-index:2000;<?php echo $coordinates;?>"
				  href="<?php if($pagesinfo['x'] < 600) { echo $pageLeft; } else { echo $pageRight; } ?>">		  
			  
			  <!--<a href="<?php //echo $link; ?>" target="_blank" ><img id="Image1" src="./images/shopping_cart_icon_9.png" align="right" style="margin-top:-22px;margin-right:-18px;width:32px;height:32px;border-width:0px;" /></a>-->
				
			    <div id="cartIcon" class="inline_img">
					<a href="<?php echo $link; ?>" target="_blank" ><img id="Image1" src="./images/shopping_cart_icon_9.png" style="border-width:0px;" /></a>
				</div>
		
				<div id="maxIcon" class="inline_img" onclick="getXyLocation(event)" >
						<a class="pageGroup" href="<?php if($pagesinfo['x'] < 600) { echo $pageLeft; } else { echo $pageRight; } ?>" >				
						<img id="Image2" src="./images/zoom_in_png_7.png" style="border-width:0px;" /> </a>																	
				</div>															
					
	 			<?php
  				   if($isEdit == 1){echo '<p align="center" style="font-family:Times New Roman,Georgia,Serif;color:#FFFFFF;">'.$url.'</p>';} 
				?>  							
					
	    </div>
				
	<?php

       }
     
	?>			
		
	</div>

	<!--
	<div id="imageDiv" style="position:absolute;width:1220px;height:800px;margin-left: auto;
       margin-right: auto;left: 0;
       right: 0;"/>-->
	   
	   


    </form>
	<!-- popUpDiv -->
	<!--
    <div id="blanket" style="display:none;"></div>
	<div id="popUpDiv" style="display:none;width: 600px;height: 700px;">
			
				<div class="inline_img">
					<a href="#" onclick="popup('popUpDiv')" ><img id="Image3" src="./images/zoom_out_icon_7.png" style="border-width:0px;" /></a>
				</div>
				 <img src="<?php echo $pageRight; ?>" style="width: 1600px;height: 1700px;" />
	</div>
	-->
	
<script type="text/javascript">

  $(function() {
     $("img.image1").lazyload({
         effect : "fadeIn"
     });
	 
  });
</script>	
</body> 
	
     <?php
		unset($isEdit);
		unset($nav);
		unset($pageno);
		unset($pageno_);
		
		
		  function createDefaultXmlPages($xmlPageName) {
				
				$urlDoc = "page";
				$fileName = "pages".$xmlPageName;         
				//$xmlContent = "<btn page='0' id='0' link='http://productlink/default'/>";
				$xmlContent = "<btn link='http://productlink/default'/>";
			   
				$xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

				$rootELementStart = "<$urlDoc>";

				$rootElementEnd = "</$urlDoc>";

				$xml_document= $xmlBeg; 

				$xml_document .= $rootELementStart;
				
				$xml_document .= stripslashes(normalizedXMLTags($xmlContent));
				
				$xml_document .= $rootElementEnd;       

				$path_dir = $fileName.".xml";

				/* Data in Variables ready to be written to an XML file */
				
				$fp = fopen($path_dir,'w');

				//$write = fwrite($fp,$xml_document);
				if (fwrite($fp,$xml_document)) echo "writing=".$xmlPageName;
				else echo "writing=Error";
			  
				fclose($fp); 
			/* Loading the created XML file to check contents */

			$sites = simplexml_load_file("$path_dir");

			//print_r($sites);
			// return "writing=Done.";

			//return header("Location: default.php?nav=left&emode=1");
		   }
		   
		  function createXmlCatConfig() {
				
				$rootElement = "config";
				$fileName = "cat-config";         

				$xmlContent = "<property pageCount='20' advanceLoadingPages='6' editMode='0' viewOnEditMode='false' draggable='false'/>";
				
				
			   
				$xmlBeg = "<?xml version='1.0' encoding='utf-8'?>"; 

				$rootELementStart = "<$rootElement>";

				$rootElementEnd = "</$rootElement>";

				$xml_document= $xmlBeg; 

				$xml_document .= $rootELementStart;
				
				$xml_document .= stripslashes(normalizedXMLTags($xmlContent));
				
				$xml_document .= $rootElementEnd;       

				$path_dir = $fileName.".xml";

				/* Data in Variables ready to be written to an XML file */
				
				$fp = fopen($path_dir,'w');

				//$write = fwrite($fp,$xml_document);
				if (fwrite($fp,$xml_document)) echo "writing=".$fileName;
				else echo "writing=Error";
			  
				fclose($fp); 
			/* Loading the created XML file to check contents */

			$sites = simplexml_load_file("$path_dir");

			//print_r($sites);
			// return "writing=Done.";

			//return header("Location: default.php?nav=left&emode=1");
		   }
		   
		   function normalizedXMLTags($xml){
			
			  $xml = str_replace ( '&amp;', '&', $xml );
			  $xml = str_replace ( '&#039;', '\'', $xml );
			  $xml = str_replace ( '&quot;', '"', $xml );
			  $xml = str_replace ( '&lt;', '<', $xml );
			  $xml = str_replace ( '&gt;', '>', $xml );
			  return $xml;
		   }		

     ?>
	 
</html>

