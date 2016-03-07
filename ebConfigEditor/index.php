<html>
  <body>
      <form enctype="multipart/form-data" 
  action="write_xml_config_eb_changes.php" method="post">     
		  <table width="100%">
			<tr>
			  <td>
			    <h1 style="color:#5D7B9D;font-style:italic;">xPydion</h1>				
			  </td>
			  <td>
			    <h2>Configuration for ebconfig.xml:</h2>
			  </td>	  	  
			 </tr> 	    
		  
		    <?php 
				$xml = simplexml_load_file("../ebconfig.xml");
				$fbConfigSrcFile = "";
					foreach($xml->children() as $child)
					  {
					  //echo $child->getName() . ": " . $child . "<br />";
					  if ($child->getName() == "fbConfigSrc") {
					     $fbConfigSrcFile = $child;
					  }
					   
					  ?>
						  <tr>			  
							  <td>
								 <label style="width:200px;"><b><?php echo $child->getName();?></b><label/>
							   </td>		                       							   
							   <td>
								  <input type="text" name="<?php echo $child->getName(); ?>" value="<?php echo $child; ?>" style="width:200px;" />
							   </td>
						  </tr>
				<?php		  
				       
				  }
			  ?>			  
			<tr>
			  <td>
			    <h1 style="color:#5D7B9D;font-style:italic;">xPydion</h1>				
			  </td>
			  <td>
			    <h2>Configuration for <?php echo $fbConfigSrcFile ?>:</h2>
			  </td>	  	  
			 </tr> 	    
          
		    <?php 
				$xml = simplexml_load_file("../".$fbConfigSrcFile);
				
					foreach($xml->children() as $child)
					  {
					  //echo $child->getName() . ": " . $child . "<br />";
					 	if ($child->getName() != "pages") {			
					  ?>
						  <tr>			  
							  <td>
								 <label style="width:200px;"><b><?php echo $child->getName();?></b><label/>
							   </td>				  
							   <td>
								  <input type="text" name="<?php echo $child->getName(); ?>" value="<?php echo $child; ?>" style="width:200px;" />
							   </td>
						  </tr>
				<?php	
				     }
				
                if ($child->getName() == "pages") {				
				?>	 
					<tr>			  
						<td style="text-align:left;">
							 <label style="width:200px;"><b>&lt;pages&gt;</b><label/>
						</td>										   
						<td style="width:100%;">									   
						  
						   </td>									 
					 </tr>
				 <?php
				 }
					 
                    if ($child->getName() == "pages")				
						foreach($child->children() as $child2)
						{
						  //echo $child2->getName() ." " . $child2;
						?>		  
								  <tr>			  
									  <td style="text-align:right;">
										 <label style="width:200px;"><b><?php echo "&lt;/".$child2->getName()."&gt;";?></b><label/>
									   </td>										   
									   <td>									   
										  <input type="text" name="<?php echo $child2->getName(); ?>[]" value="<?php echo $child2; ?>" style="width:100%;"/>										  
									   </td>									 
								  </tr>
						<?php		  
						}

				  }
			  ?>			  
			  <tr>			  
				  <td style="text-align:left;">
					 <label style="width:200px;"><b>&lt;/pages&gt;</b><label/>
				  </td>										   
				  <td style="width:100%;"/>									   						  
			  </tr>

			  <tr>			  
 				   <td style="width:200px;text-align:right;">
					 <label><b>Save changes?</b><label/>
				   </td>				  			  
				   <td>
					  <input type="submit" value="Save" />
				   </td>
			  </tr>
			  
		  </table>    
	  </form>
  </body>

</html>