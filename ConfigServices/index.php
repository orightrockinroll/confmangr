<html>
    <head>
        <title>eBrochure Builder v2.0</title>
    </head>
    <body>
        <script type='text/javascript'>
            function empty(element, alertMessage){
            	var errorLabel = document.getElementById('errMsg');
            	if(element.value.trim()== ""){	
            		errorLabel.innerHTML = 'Invalid project name! Please try again.';
            		element.focus();
            		return false;
            	}	
            	   errorLabel.innerHTML = '';
            	return true;
            }
              
        </script>
        <style> 
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
				height:30px;
			}
        </style>
        <div style="margin:auto; width:100%; text-align:center;">
            <h1 style="color:#000">eBrochure Builder v2.0</h1>
        </div>
        <div id="container">
            <form enctype="multipart/form-data" 
                action="build_source_eb.php" method="post" onsubmit="return empty(document.getElementById('newEbSourceDir'), 'Please Enter a Valid Brochure or Catalogue Name!');">
                <table width="auto">
                    <tr style="height:80px;">
                        <td>
                            <h3>Step 1</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>Enter eBrochure/Catalogue Name (eg. MyTestBrochure):</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="newEbSourceDir" class="textinput" name="newEbSourceDir" />
                            <span> <label type="text" id="errMsg" style="color:red;" /></span>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Enter Hostname (eg. localhost or xpydion.com):</td>
                        <td>
                        	<input type="text" id="hostName" name="hostName" style="width:200px;" />
                        	<span> <label type="text" id="errMsg" style="color:red;" /></span>
                        </td>					
                         </tr> -->		  			  
                    <tr>
                        <td style="padding-top:20px;">
                            <input type="submit" value="Create Now!" class="btn" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>