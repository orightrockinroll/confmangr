<?php

/*
		CopyRight � ADE 2005-2006
		http://www.ade-solutions.nl
*/
/*

		Multiple File Upload (class)
		Is copyrighted, but free to use for non commercial use.
		But please let this notice intact!

		Multiple File Upload (class).php
		Simplyfied uploading file's to a webserver.
		Included are for demonstration 2 file's
		test_upload.htm : how to implement a save action
		save_files.php  : how to initiate the class
*/

//include("general_functions.php");
function HasLastSlash($content){
	$loc = $content;
	$last_slash = (substr($content,strlen($content)-1,1)=="/");
	if (!$last_slash) {
		$loc = ($content . "/");
	}
	return $loc;
}

class multiple_upload {
    var $uploaddir;
    var $max_files;
    var $max_size;
    var $permission;
    var $show;
    var $files;
    var $allowed = array();
    var $notallowed = array();
    var $errors = array();

    function multiple_upload()
    {
		//preset some values
    	$this->uploaddir = "uploads";
        $this->max_files = 1;
        $this->max_size = 10000;
        $this->permission = 0777;
        $this->allowed = array();
        $this->notallowed = array();
        $this->show = false;
    }

	function validate(){
		$num = count($this->files[file][name]);
		//Control for max_files
		if ($num > $this->max_files) {
			$this->errors[0][] = "To many files! max allowed=" . $this->max_files;
			return FALSE;
		} else {
			//check for all files, SIZE and FILE_TYPE
			for ($i = 0;$i < $num; $i++) {
				//Check SIZE
				if ($this->files[file][size][$i] > $this->max_size) {
					$this->errors[1][] = "File: " . $this->files[file][name][$i] .
									     " size: " . $this->files[file][size][$i] .
									     " not allowed Max=: " .
									     ($this->max_size/1000) . " kb";
				}
				//split file-type information (image/gif)
				$file_type = split('[/.-]', $this->files[file][type][$i]);
				//Check if file-type ALLOWED
				if (in_array($file_type[1], $this->allowed)) {
					$this->errors[2][] = "File: " . $this->files[file][name][$i] .
								         " type: " . $this->files[file][type][$i] .
									     " not in list allowed";
				//else Check if file-type NOT ALLOWED
				} else if (in_array($file_type[1], $this->notallowed)) {
					$this->errors[2][] = "File: " . $this->files[file][name][$i] .
									     " type: " . $this->files[file][type][$i] .
									     " not allowed";
				}
			}
			if (count($this->errors)>0) {
				return FALSE;
			}
		}
		return TRUE;
	}

    function execute()
    {
//		echo "<html>En nu ? " . print_r($this) . "</html>";
    	//Get directory
    	$remdir = $this->uploaddir;
    	//Add when nessecary a slash
    	$remdir = HasLastSlash($remdir);
    	//Is dir writeable

    	if (!is_writable($remdir)) {
			$this->errors[0][] = "Not allowed to write to dir:" . $remdir;
			return FALSE;
    	}

		$num = count($this->files[file][name]);
		//Control for max_files
		if ($num > $this->max_files) {
			$this->errors[0][] = "To many files! max allowed=" . $this->max_files;
			return FALSE;
		} else {
			//check for all files, SIZE and FILE_TYPE
			for ($i = 0;$i < $num; $i++) {
				$filename = $this->files[file][name][$i];
				//$this->errors[0][] = $filename;
                if ( !empty( $filename)) {			   // this will check if any blank field is entered
                    $add = $remdir . $filename;		   // upload directory path is set
					if(is_uploaded_file($this->files[file][tmp_name][$i]))
					{
						move_uploaded_file($this->files[file][tmp_name][$i], $add);
	                    if (!chmod( "$add", $this->permission)) { // set permission to the file.
    	              		$this->errors[0][] = "Problems with copy of: " . $filename;                    }
					}
                    /*
                    copy($this->files[file][tmp_name][$i], $add); //upload the file to the server
                    if (!chmod( "$add", $this->permission)) { // set permission to the file.
                  		$this->errors[0][] = "Problems with copy of: " . $filename;                    }
                  	*/
                }
			}
			return TRUE;
		}
    }
}
?>