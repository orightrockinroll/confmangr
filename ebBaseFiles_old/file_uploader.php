<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>R File Uploader</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
   
<script language="javascript" type="text/javascript">
<!--
function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function stopUpload(success){
      var result = '';
      if (success == 1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      //document.getElementById('f1_upload_form').innerHTML = result +'<br/><table width="1000"><tr><td><h3>Select Image to Upload:<\/h3><\/td><\/tr><tr><td><input name="file[]" type="file" size="120" /><\/td><\/tr><tr><td><input name="file[]" type="file" size="120" /><\/td><\/tr><tr><td><input name="file[]" type="file" size="120" /><\/td><\/tr><tr><td><input name="file[]" type="file" size="120" /><\/td><\/tr><tr><td><input name="file[]" type="file" size="120" /><\/td><\/tr><tr><td><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/tr><\/td><\/table> ';
	  	  
	  
      document.getElementById('f1_upload_form').style.visibility = 'visible';      
      return true;   
}


//-->
</script>   
</head>

<body>
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">R File Uploader</div><div id="header_right"></div></div>
            <div id="content">
                <form action="save_files.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process">Uploading...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_form" align="center"><br/>
					  <table width="1000">
						  <tr>
							 <td><h3>Select Image to Upload:</h3></td>		  
						  </tr>
						  <tr>
						  <tr>
							  <td>
								 <input type="file" name="file[]" size="120">
							  </td>
						  </tr>
						  <tr>
							  <td>
								 <input type="file" name="file[]" size="120">
							  </td>
						  </tr>
						  <tr>
							  <td>
								 <input type="file" name="file[]" size="120">
							  </td>
						  </tr>
						  <tr>
							  <td>
								 <input type="file" name="file[]" size="120">
							  </td>
						  </tr>
						  <tr>
							  <td>
								 <input type="file" name="file[]" size="120">
							  </td>
						  </tr>		  
						  <tr>
							  <td>
								 <input type="submit" name="submitBtn" class="sbtn" value="Upload">		  
							  </td> 		  
						  </tr>
					  </table>                      
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                 </form>
             </div>
             <div id="footer"><a href="#" target="_blank">Powered by R</a></div>
         </div>
                 
</body>   