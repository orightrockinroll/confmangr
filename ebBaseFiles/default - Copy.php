
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	demoCat2013v2.0
</title>


<link href="./css/test.css" rel="stylesheet" type="text/css" />

    <script type='text/javascript' 
        src='./js/jquery-1.3.2.min.js'>
    </script> 		
   <script type='text/javascript' 
        src='./js/dragresize.js'>
    </script>     
    
	<script type="text/javascript">
	      function destroyEditCloneDiv(divTag) {
           var div = document.getElementById(divTag);	
           var countCheckbox = 0; 

			if (enableCloneRedsqr() == true) {
			   countCheckbox++;
			}		   

			if (enableEditRedsqr() == true) {
			   countCheckbox++;
			} 
		    
			if (enableDestroyRedsqr() == true) {
			   countCheckbox++;
			}

			if (countCheckbox == 2 || countCheckbox == 3) {
			   alert('Please select one option at a time!');
			   return false;
			}			
			
			if (enableDestroyRedsqr() == true) {
				if (confirm('Continue to delete Redsqr ?')) {		     		     
				   div.parentNode.removeChild(div);             
			   } else {
				 return false;
			   }
			}

			if (enableEditRedsqr() == true) {
				if (confirm('Continue to edit and apply the product link on Redsqr ?')) {
				   var productLink = document.getElementById("productLink");
				   div.setAttribute("align", "center");
				   div.style.color="#FFFFFF";				   
				   div.title = 'link="'+ productLink.value +'"';
				   div.innerHTML = productLink.value;
					//alert(div.title);
			   } else {
				 return false;
			   }
			}

			if (enableCloneRedsqr() == true) {
				if (confirm('Continue to clone Redsqr ?')) {		     		     
				   var container = document.getElementById('divContainer');
				   //alert(container);
				   var clone = document.getElementById(div.id).cloneNode(true);;
				   //alert(clone);
				   var tmpId = new Date().getTime();
				   clone.id = tmpId;
				   container.parentNode.appendChild(clone);				   
			   } else {
				 return false;
			   }			
			}
		}  
		  
		  function enableDestroyRedsqr() {
		  var isChecked = false;
            if(!(document.getElementById("destroyRedsqr").checked)) {                   
               isChecked = false;
            } else {   
               isChecked = true;		   
            }	
		    return isChecked;
		  } 

		  function enableEditRedsqr() {
		  var isChecked = false;
            if(!(document.getElementById("editRedsqr").checked)) {                   
               isChecked = false;
            } else {   
               isChecked = true;		   
            }	
		    return isChecked;
		  } 	

		  function enableCloneRedsqr() {
		  var isChecked = false;
            if(!(document.getElementById("cloneRedsqr").checked)) {                   
               isChecked = false;
            } else {   
               isChecked = true;		   
            }	
		    return isChecked;
		  }		  
	</script> 

<?php

  session_start();

  $isEdit = (isset($_GET['emode']) && $_GET['emode'] != '') ? $_GET['emode'] : $isEdit = '0';
	   
  //$pageno = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : $pageno = '1';
	   
  $nav = (isset($_GET['nav']) && $_GET['nav'] != '') ? $_GET['nav'] : $nav = '';	  
  
  
  $pageCount = 75;

	   $edit_mode = 'drsElement drsMoveHandle';
	   $view_mode = 'imgOpa';   
    	   
		
	   $_SESSION['editTracked'] = $isEdit;
	 	

	   
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

		   
		   if($nav == ""){
	        $_SESSION['page_no'] = 1;
			$pageno_ = $_SESSION['page_no']; 
		    
		   }

		   if($pageno_ > $pageCount){
		   	unset( $_SESSION['page_no']);
		   	$_SESSION['page_no'] = 1;
			$pageno_ = $_SESSION['page_no'];
		   
		   }else if ($pageno_ < 1){
		    //unset( $_SESSION['page_no']);
		    $_SESSION['page_no'] = $pageCount;
			$pageno_ = $_SESSION['page_no'];
		   }
	   


	   if ($isEdit == 1){
	   	
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

/* Required CSS classes: must be included in all pages using this script */

/* Apply the element you want to drag/resize */
.drsElement {
 position: absolute;
 border: 1px solid #3B5997;
     opacity:0.8;          /*the opacity can be applicable during setup have permanent opacity not faded during configuration*/
     filter:alpha(opacity=8);
font-family:Arial, Helvetica, sans-serif;	 
}

/*
 The main mouse handle that moves the whole element.
 You can apply to the same tag as drsElement if you want.
*/
.drsMoveHandle {
 height: 20px;
 background-color: #3B5997;
 border-bottom: 1px solid #666;
 cursor: move;
 font-family:Arial, Helvetica, sans-serif
}

/*
 The DragResize object name is automatically applied to all generated
 corner resize handles, as well as one of the individual classes below.
*/
.dragresize {
 position: absolute;
 width: 4px;
 height: 4px;
 font-family:Arial, Helvetica, sans-serif
 font-size: 1px;
 background: #EEE;
 border: 1px solid #333;
}

/*
 Individual corner classes - required for resize support.
 These are based on the object name plus the handle ID.
*/
.dragresize-tl {
 top: -8px;
 left: -8px;
 cursor: nw-resize;
}
.dragresize-tm {
 top: -8px;
 left: 50%;
 margin-left: -4px;
 cursor: n-resize;
}
.dragresize-tr {
 top: -8px;
 right: -8px;
 cursor: ne-resize;
}

.dragresize-ml {
 top: 50%;
 margin-top: -4px;
 left: -8px;
 cursor: w-resize;
}
.dragresize-mr {
 top: 50%;
 margin-top: -4px;
 right: -8px;
 cursor: e-resize;
}

.dragresize-bl {
 bottom: -8px;
 left: -8px;
 cursor: sw-resize;
}
.dragresize-bm {
 bottom: -8px;
 left: 50%;
 margin-left: -4px;
 cursor: s-resize;
}
.dragresize-br {
 bottom: -8px;
 right: -8px;
 cursor: se-resize;
}

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
          
        coords += '&lt;btn ' + divTag[i].title + ' seq=&quot;'+ divTag[i].id + '&quot;' + ' x=&quot;' + elmX +'&quot; y=&quot;' + elmY + '&quot; w=&quot;' + elmW +'px&quot; h=&quot;' + elmH + 'px&quot; ' + '/&gt;' + '\n';
          
    }
    
}
//alert(coords);

document.getElementById("xmlData").value = coords;

}
</script>



</head>
<body>
   
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

	<input name="xmlData" id="xmlData" style="font-size: 1px;visibility: hidden;" />
	<input name="pageNo" id="pageNo" value="<?php echo $pageno_; ?>" style="font-size: 1px;visibility: hidden;" />
	<input name="addNewRedsqr" id="addNewRedsqr" value="<btn page='0' id='0' link='http://productlink/default'/>" style="font-size: 1px;visibility: hidden;" />

     <?php
        if($isEdit == 1){
     ?>

     <div align="bottom" style="position:relative;padding:20px;background-color:#2C353F;color:#E4E8EC;font-family:Arial, Helvetica, sans-serif;top:-18px;margin-left: auto;
       margin-right: auto;left: 0;
       right: 0;">
       <input name="btnGenerate" type="submit" id="btnGenerate" value="Save Changes" title="Save Changes" onclick="return confirm('Continue to ' + this.value +'?');"/>
       <input type="checkbox" id="cloneRedsqr" name="cloneRedsqr" onclick="javascript:enableCloneRedsqr();" >Clone redSqr's	
	   <input type="checkbox" id="editRedsqr" name="editRedsqr" onclick="javascript:enableEditRedsqr();" >Edit redSqr's	
	   <input type="checkbox" id="destroyRedsqr" name="destroyRedsqr" onclick="javascript:enableDestroyRedsqr();" >Delete redSqr's
       &nbsp;&nbsp;| Enter product link: <input type="text" id="productLink" value="http://domain-name/product-id" size="98" />	   
     </div>

     <?php
		}

	?> 
	<div id="divContainer" style="position:absolute;width:1220px;height:800px;margin-left: auto;
       margin-right: auto;left: 0;
       right: 0;">
	
    <div style="position:relative;width:1200px;height:800px;
       margin-left: auto;
       margin-right: auto;
       left: 0;
       right: 0;">

    <!-- left page-->   
    <div style="float:left;position: relative;width: 600px;">
        <!--<img id="Image1" class="imgOpa" src="./images/tran1.png" style="border-width:0px;" />-->
    <img src="<?php echo './pages/pHi'.$pageno_.'.jpg'; ?>" style="width: 600px;height: 700px;" />

     
        <div id="nav_left" style="position:relative; float: left;top:-390px;left:-50px;">
		 	<a href="default.php?nav=<?php echo 'left&emode='. $_SESSION['editTracked'];?>"><img id="Image1" src="./images/left.png" align="left" style="border:none;" /></a>
	    </div> 
     
		<input id="xy" type="text" value="testing" style="width: 200px;visibility: hidden;" />
     

     </div>
     
     <!-- right page-->
    <div style="float:right;position: relative;width: 600px;"></div>
        <img src="<?php echo './pages/pHi'.++$pageno_.'.jpg'; ?>" style="width: 600px;height: 700px;" />
        
        <div id="nav_right" style="position:relative; float: right;top:-390px;left:50px;">
		 	<a href="default.php?nav=<?php echo 'right&emode='. $_SESSION['editTracked']; ?>"><img id="Image1" src="./images/right.png" align="right" style="border:none;" /></a>
	    </div>
	   
  </div>
  
   <div style="float:right;position: relative;top:-90px;width:1220px;">

<?php

     $advanceLoadingPageNo = $pageCount; // 6-2 = 4 advance pages where do the load
     $advanceLoading = $pageno_;
     $i = 0;	 

	 for ($i=$advanceLoading+1; $i<=$advanceLoadingPageNo; $i++)
	 {
	  //echo 'pages: ' . $i;
	 ?>
	    <img src="<?php echo './pages/pHi'.$i.'.jpg'; ?>" style="width: 30px;height: 40px;padding-left:5px;padding-right:5px;" />
	   
	 <?php
	 }	

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
	    <div id="<?php echo $divId;?>" class="<?php if($_SESSION['editTracked'] == 1){echo $edit_mode;} else { echo $view_mode;} ?>" title="<?php echo $url; ?>" onclick="javascript:destroyEditCloneDiv(this.id);"
	              style="position:absolute;background-color:#CC9999;border:solid 0px #F8CB7F;<?php echo $coordinates;?>">
	          

			  <a href="<?php echo $link; ?>" target="_blank" ><img id="Image1" src="./images/cart.png" align="right" style="margin-top:-22px;margin-right:-18px;width:48px;height:48px;border-width:0px;" /></a>
	 			
	 			<?php if($_SESSION['editTracked']==1){echo '<p align="center" style="font-family:Times New Roman,Georgia,Serif;color:#FFFFFF;">'.$url.'</p>';} ?>  
					
					
	    </div>
		
	<?php
	   
       }
     
	?>	
 </div>
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
   
   function normalizedXMLTags($xml){
   	
	  $xml = str_replace ( '&amp;', '&', $xml );
	  $xml = str_replace ( '&#039;', '\'', $xml );
	  $xml = str_replace ( '&quot;', '"', $xml );
	  $xml = str_replace ( '&lt;', '<', $xml );
	  $xml = str_replace ( '&gt;', '>', $xml );
   	  return $xml;
   }		

     ?>
 
    </form>


 
</body> 

</html>

