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
		
		function getXyLocation(event){		
		   	var elmY = event.pageY-document.getElementById("maxIcon").offsetTop;
			document.frmEditor.yAxis.value = (elmY * 1.7);	
		}
		
		function getXyLocationOverload(event, divObj){	
			//alert(divObj.id);
		   var redSqrMaxIconId = "maxIcon" + divObj.id;	
		   var elmY = event.pageY-document.getElementById(redSqrMaxIconId).offsetTop;
		   alert(redSqrMaxIconId);
		   document.frmEditor.yAxis.value = (elmY * 1.7);
		   //document.frmEditor.yAxis.value = elmY;
		   //alert(elmY);
		
		//pos_y = event.offsetY?(event.offsetY):event.pageY-document.getElementById("maxIcon").offsetTop;
		//document.frmEditor.yAxis.value = (pos_y * 1.7);
		}		