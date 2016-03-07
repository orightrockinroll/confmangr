<html>
<body>
<form enctype="multipart/form-data" 
  action="build_file.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	  <table width="100%">
		 <tr>
			    <td><h1>[Step-5]</h1></td>
				<td><h1></h1></td>
				<td><h1>[Step-6]</h1></td>
		</tr> 			  
	  
	  	  <tr>
			<td><h1>Input fields for eBrochure source:</h1></td>
			<td><h1>...</h1></td>
			<td><h1>Start generating the excel file:</h1></td>
		  </tr> 
		  <tr>
		  <td>Excel file:</td>
		  <td><input type="file" name="file" /></td>
		  <td><input type="submit" value="Generate" /></td>
		  </tr>
		  <tr>
			<td>Config fileName (ex. configCurrys):</td>
			<td><input type="text" name="configFileName" size="50"></td>
		  </tr>
		  <!--
		  <tr>
		  <td>eBrochure base source file (ex. eBrochure201.zip):</td>
		  <td><input type="file" name="zipFile" /></td>
		  </tr>		  
		  -->
		  <tr>
			<td>eBrochure source folder (ex. myEbSourceFolder):</td>
			<td><input type="text" name="newEbBaseProjSource" value="<?php echo $_GET['source_target'];?>" size="50"></td>  
		  </tr>		  
		  <tr>
			<td>eBrochure target folder (ex. myEbTargetFolder):</td>
			<td><input type="text" name="newEbDir" value="<?php echo $_GET['source_target'];?>" size="50"></td>  
		  </tr>
	  </table>
	  </form>
  </body>
</html>
