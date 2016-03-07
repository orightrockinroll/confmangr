<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>eBrochure Builder v2.0 - File Uploads</title>
		<script src="js/jquery.js"></script>
		<script src="jquery-ui.js"></script>
        <script type="text/javascript" src="js/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="js/jquery.swfupload.js"></script>
		<link href="jquery-ui.css" rel="stylesheet">
        <script type="text/javascript">
			function notSupported(){
				alert("This feature is not supported yet.");
			}
            $(function(){
				$( "#tabs" ).tabs();
            	$('#swfupload-control').swfupload({
            		upload_url: "upload-file.php?source_target=<?php echo $_GET['source_target']?>",
            		file_post_name: 'uploadfile',
            		file_size_limit : "1024",
            		file_types : "*.jpg;*.png;*.gif",
            		file_types_description : "Image files",
            		file_upload_limit : 300,
            		flash_url : "js/swfupload/swfupload.swf",
            		button_image_url : 'js/swfupload/XPButtonUploadText_61x22.png',
            		button_width : 61,
            		button_height : 22,
            		button_placeholder : $('#button')[0],
            		debug: false
            	})
            		.bind('fileQueued', function(event, file){
            			var listitem='<li id="'+file.id+'" >'+
            				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
            				'<div class="progressbar" ><div class="progress" ></div></div>'+
            				'<p class="status" >Pending</p>'+
            				'<span class="cancel" >&nbsp;</span>'+
            				'</li>';
            			$('#log').append(listitem);
            			$('li#'+file.id+' .cancel').bind('click', function(){
            				var swfu = $.swfupload.getInstance('#swfupload-control');
            				swfu.cancelUpload(file.id);
            				$('li#'+file.id).slideUp('fast');
            			});
            			// start the upload since it's queued
            			$(this).swfupload('startUpload');
            		})
            		.bind('fileQueueError', function(event, file, errorCode, message){
            			alert('Size of the file '+file.name+' is greater than limit');
            		})
            		.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
            			$('#queuestatus').text('Files Selected: '+numFilesSelected+' / Queued Files: '+numFilesQueued);
            		})
            		.bind('uploadStart', function(event, file){
            			$('#log li#'+file.id).find('p.status').text('Uploading...');
            			$('#log li#'+file.id).find('span.progressvalue').text('0%');
            			$('#log li#'+file.id).find('span.cancel').hide();
            		})
            		.bind('uploadProgress', function(event, file, bytesLoaded){
            			//Show Progress
            			var percentage=Math.round((bytesLoaded/file.size)*100);
            			$('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
            			$('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
            		})
            		.bind('uploadSuccess', function(event, file, serverData){
            			var item=$('#log li#'+file.id);
            			item.find('div.progress').css('width', '100%');
            			item.find('span.progressvalue').text('100%');
            			//var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >view &raquo;</a>';
            			//item.addClass('success').find('p.status').html('Uploaded: | '+pathtofile);
            			item.addClass('success').find('p.status').html('Uploaded');
            		})
            		.bind('uploadComplete', function(event, file){
            			// upload has completed, try the next one in the queue
            			$(this).swfupload('startUpload');
            		})
            	
            });	
            
        </script>
        <style type="text/css" >
            #swfupload-control p{ margin:10px 5px; font-size:0.9em; }
            #log{ margin:0; padding:0; width:700px;}
            #log li{ list-style-position:inside; margin:2px; border:1px solid #ccc; padding:10px; font-size:12px; 
            font-family:Arial, Helvetica, sans-serif; color:#333; background:#fff; position:relative;}
            #log li .progressbar{ border:1px solid #333; height:4px; background:#FFFF99;}
            #log li .progress{ background:#336633; width:0%; height:4px;}
            #log li p{ margin:0; line-height:18px; }
            #log li.success{ border:1px solid #666699; background:#CCCCFF; }
            #log li span.cancel{ position:absolute; top:5px; right:5px; width:20px; height:20px; 
            background:url('js/swfupload/stop.png') no-repeat; cursor:pointer; }
             body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
			background: #E5EAEF;
            }
            tr {
            height:45px;
            padding-top: 10px;
            padding-bottom: 10px;
            }
            .textbox { 
            border: 1px solid #c9c9c9; 
            height: 40px; 
            font-size: 13px; 
            padding: 4px 4px 4px 4px; 
            border-radius: 4px; 
            -moz-border-radius: 4px; 
            -webkit-border-radius: 4px; 
            box-shadow: 0px 0px 8px #d9d9d9; 
            -moz-box-shadow: 0px 0px 8px #d9d9d9; 
            -webkit-box-shadow: 0px 0px 8px #d9d9d9; 
            } 
            .textbox:focus { 
            outline: none; 
            border: 1px solid #7bc1f7; 
            box-shadow: 0px 0px 8px #7bc1f7; 
            -moz-box-shadow: 0px 0px 8px #7bc1f7; 
            -webkit-box-shadow: 0px 0px 8px #7bc1f7; 
            } 
            .btn {
				-moz-box-shadow:inset 0px 1px 3px 0px #91b8b3;
				-webkit-box-shadow:inset 0px 1px 3px 0px #91b8b3;
				box-shadow:inset 0px 1px 3px 0px #91b8b3;
				background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #768d87), color-stop(1, #6c7c7c));
				background:-moz-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
				background:-webkit-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
				background:-o-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
				background:-ms-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
				background:linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
				filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#768d87', endColorstr='#6c7c7c',GradientType=0);
				background-color:#768d87;
				-moz-border-radius:5px;
				-webkit-border-radius:5px;
				border-radius:5px;
				border:1px solid #566963;
				display:inline-block;
				cursor:pointer;
				color:#ffffff;
				font-family:Arial;
				font-size:15px;
				font-weight:bold;
				padding:11px 23px;
				text-decoration:none;
				text-shadow:0px -1px 0px #2b665e;
			}
			.btn:hover {
				background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #6c7c7c), color-stop(1, #768d87));
				background:-moz-linear-gradient(top, #6c7c7c 5%, #768d87 100%);
				background:-webkit-linear-gradient(top, #6c7c7c 5%, #768d87 100%);
				background:-o-linear-gradient(top, #6c7c7c 5%, #768d87 100%);
				background:-ms-linear-gradient(top, #6c7c7c 5%, #768d87 100%);
				background:linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
				filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6c7c7c', endColorstr='#768d87',GradientType=0);
				background-color:#6c7c7c;
			}
			.btn:active {
				position:relative;
				top:1px;
			}
			
			#container
			{
				margin-left:50px;
				margin-right:50px;
				margin-top:20px;
				margin-bottom: 50px;
				background-color: #fff;
				border: 2px #D7D8D9 solid;
				padding: 20px;
			}
			
			.textinput{
				margin-top: 8px;
				max-width: 500px;
				width:100%;
				height:30
        </style>
    </head>
    <body>
        <div style="margin:auto; width:100%; text-align:center;">
            <h1 style="color:#000">eBrochure Builder v2.0</h1>
        </div>
        <div id="container">
			<h2 class="demoHeaders">Step 2</h2>
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Upload Images</a></li>
					<li><a href="#tabs-2">Upload PDF</a></li>
				</ul>
				<div id="tabs-1">
					 <div id="swfupload-control">
                <table>
                    <tr>
                        <td>	 
                            <?php 
                                //include 'page_url.php';	  
                                
                                //$source_target = $_GET['source_target'];
                                //$hostName = $_SERVER['SERVER_NAME'];
                                //$uploadUrl = curPageURL();
                                //$newProject = "http://".$hostName."/".$source_target;
                                //echo "<h4>Copy this link used to upload images:</h4>";			   
                                //echo "<a href=".$uploadUrl." target='_blank'>".$uploadUrl."</a>";			   
                                //echo "<h4>Copy the generated project link:</h4>";
                                //echo "<h2>http://localhost/iventures/build/ebConfigManager_v1.0/ebBaseProjects/".$source_target."</h2>";
                                //echo "<p style='padding-left: 20px;'>http://".$hostName."/ebConfigManager_v2.0/ebBaseProjects/".$source_target."</p>";
                                //echo "<p style='padding-left: 20px;'>http://".$hostName."/".$source_target."</p>";
                                
                                //echo "<a href='".$newProject."' target='_blank'>".$newProject."</a>";
                                   ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Select images to upload: (Press CTRL+A = To upload multiple images)
                        </td>
                        <!--
                            <td>
                             	    <h3>[ Step 4 ]</h3>
                            </td> -->	  	  
                    </tr>
                    <tr>
                        <td>
                            Upload upto 300 image files(jpg, png, gif), each having maximum size of 1MB
                        </td>
                        <!--
                            <td>
                            <h3><a href="http://www.xpydion.com/ebConfigManager/ConfigServices/generate_pages_eb.php?source_target=<?php echo $source_target; ?>">Generate xml pages from the excel file</a></h3>
                            </td> -->	  	  	  
                    </tr>
                    <tr>
                        <td>
                            <input type="button" id="button" value="Upload Images" class="btn" />	  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="queuestatus" ></p>
                            <ol id="log"></ol>
                        </td>
                    </tr>
                </table>
            </div>
				</div>
				<div id="tabs-2">
					<p>
						Upload PDF.
					</p>
					<input type="button" id="button" onclick="notSupported()" value="Upload PDF" class="btn" />	 
				</div>
			</div>
        </div>
    </body>
</html>