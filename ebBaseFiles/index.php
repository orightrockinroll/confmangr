
 <?php  					

ini_set('display_errors', 'Off');
error_reporting(E_ALL);
			     
				if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone'))
				 {
				  header('Location: iPhone.php');
				  //echo 'iPhone orientation.';				    
				  //exit();
				  
				} else if(strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
				 {
				  //header('Location: http://yoursite.com/iphone');
                  echo 'iPad orientation.';			  
				  //exit();
				 
				} else if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))
				 {
				  header('Location: iPad.php');
				  //echo 'iPad orientation.';				  				  
				  //exit();
				} 				
				else {
					  header('Location: default.php');
					  //echo 'Desktop orientation.';
					  			    
	          }
				 
 ?>		
