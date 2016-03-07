<html>
  <head>
    <title>Currys Mobile</title>
    <meta http-equiv="refresh" content="5" />
    <!--<link rel="stylesheet" href="xpy.css" type="text/css" media="screen" />-->

  </head>	
  <body onResize="document.location=window.location;" background="images/wall_wide_large3.jpg" >
  <!--<body background="images/wall_wide_large3.jpg" > -->
  <form name="myForm" >
 
	    <script src="scale.js" type="text/javascript"></script>
		  <table style="margin:0;padding:0;width:auto;" align="center" >
		   <?php
		   	$per_page = 6;
	         $total_pages = 72;
	         
		   	if (!empty($_GET['pages'])){
				 $page = $_GET['pages'];
			
				   if ($page  <=0 || $page > $total_pages) {
			   	  $page = 1; 
			   	} 
			 
			   }else {
			   	$page = 1;
			   	}  	
			   	
			   	
			   	
			   	/*if (!empty($_GET['pageNo'])){
			   	 $page = $_GET['pageNo'];
			   	} else {
			   		$page = 1;
			   		}
			   	*/	
		   
		   require_once 'menu.php'; 
		?>
		<!--    
			<tr>			  
			  <td align="right" ><div name="divMenu1" ><a href="?pages=<?php echo ($page - 2); ?>"><img name="imgPrev" src="images/prev3.png" width="64" height="32"/></a></div></td>
			  <td align="left" ><div name="divMenu2" ><a href="?pages=<?php echo ($page + 2); ?>"><img name="imgNext" src="images/next3.png" width="64" height="32"/></a></div></td>
         </tr> 
		-->
		
		 
			
		   <tr>
		    				
		  <?php  					
			
			# SETTINGS
	//$max_width = 200;
	//$max_height = 500;
   
   //<![if !IE]> <body onresize="document.location=window.location;"> <![endif]>
   //<!--[if IE]> <body onresize="window.location.reload();"> <![endif]-->	
	

	/*	
	if (!empty($_GET['pages'])){
	 $page = $_GET['pages'];

	   if ($page < 0) {
   	  $page = 0; 
   	}
 
   }else {
   	$page = 0;
   	}  	
   */	
   		
  //echo "page" .$page; 	
	
	$has_previous = true;
	$has_next = true;
	
	$count = 0;
	//$skip = $page * $per_page;		
	$next = true;
	$previous = false;
	
			   $device_orientation = '';
			   $device_width = '';
			   $device_height = '';
			   $device_css = '';
		   			  
			     

			       
				    echo "<script language='javascript'>\n";
				  	 echo "var today = new Date()\n";
	             echo "var expiry = new Date(today.getTime() + 365 * 24 * 60 * 60 * 1000)\n";
					 echo " setCookie('wd_value', (pageWidth()/2)-20, expiry)\n";
					 echo " setCookie('ht_value', pageHeight()-75, expiry)\n";
					 echo " setCookie('scr_width', pageWidth()-75, expiry)\n";
					 echo "</script>\n";
					 
					 
			 		 $device_width = $_COOKIE["wd_value"];
				    $device_height= $_COOKIE["ht_value"];	
				    $scr_width = $_COOKIE["scr_width"];	
                 			        		
			        			
			       $device_css = 'position:relative;margin:0;padding:0;width:'. $device_width .'px;height:'. $device_height .'px;visibility:visible;';

                $page_number = $page;
					//for ( $counter = 1; $counter <= 75; $counter += 1) 
					for ( $counter = 0; $counter < $per_page; $counter++)
					  {
                     if ($counter > 1) {
                     	$device_width = "15x";
                     	$device_height = "20px";
			       		 	          
	                  echo '<img src="pages/pHi'.$page_number.'.jpg" width="'.$device_width.'" height="'.$device_height.'" alt="Loading..."/>';
                       	
                     } else {	
                        /*
                        if ($device_height > 800) {
                        	$device_height = 800;
                        }		
                        
                        if ($device_width > 550) {
                        	$device_width = 550;
                        	}			  	
						  	   */
						  	   if ($counter == 0) {       	  	   
			       		    echo '<map name="testmap"><area shape="poly" coords="17,51,42,35,66,51,66,89,17,89" href="www.google.com.ph" alt="Google Text"></map>'; 	          
	                      echo '<td align="right"><div name="imgDiv" style="'.$device_css.'"><img name="imgDisplay" src="pages/pHi'.$page_number.'.jpg" width="'.$device_width.'" height="'.$device_height.'" alt="Loading..." usemap="#testmap"/></div></td>';
                        } else {
                           echo '<map name="testmap"><area shape="poly" coords="17,51,42,35,66,51,66,89,17,89" href="www.google.com.ph" alt="Google Text"></map>'; 	          
	                        echo '<td align="left"><div name="imgDiv" style="'.$device_css.'"><img name="imgDisplay" src="pages/pHi'.$page_number.'.jpg" width="'.$device_width.'" height="'.$device_height.'" alt="Loading..." usemap="#testmap"/></div></td>';
                          	
                        	}
                     }						  	 
						  	          	  	 
				         if ($next) {
				           ++$page_number;
				         } else if ($previous) {
                       --$page_number; 				         	
				         }  		
					         		
				    }
				   

			  ?>		
		  
<?php
	if ( $has_previous )
		//echo '<p class="prev"><a href="?pages='.($page - 1).'">&larr; Previous Page</a></p>';

	if ( $has_next )
		//echo '<p class="next"><a href="?pages='.($page + 1).'">Next Page &rarr;</a></p>';
?>
				
			  </tr>
		  </table>    
    </form>
  </body>
 
</html>