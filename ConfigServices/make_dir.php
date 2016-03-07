<? 

$newEbDir = $_POST['newEbDir'];
//$newEbDir = "TestFolder";

//note the ! before the file_exists
  function createDir($dir) {
	if(!file_exists($dir)){ 
		mkdir($dir, 0777); 
		chmod($dir, 0777);
	  echo "made"; 
	}else{ 
	   echo "already made"; 
	} 
  }	
?> 