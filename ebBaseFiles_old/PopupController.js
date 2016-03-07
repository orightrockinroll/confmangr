
var myclose = false;
var myEbCtr;
var myMain = false;
var myIndex = false;
var winEBrochure = null;

function popupWin() {				
	//var intWinCenterH = intCenterH - 517;
	//var intWinCenterV = intCenterV - 390;
	//var strWinSetting = 'channelmode'; //channelmode
	
	   var strWinSetting = 'fullscreen=no,width=1024,height=720';				
		    winEBrochure = window.open("main.html","myEb",strWinSetting);		
		//winEBrochure.focus();	
}

function customPopupWindow(pageURL, title,w,h) {
   var left = (screen.width/2)-(w/2);
   var top = ((screen.height/2)-(h/2))/3;

   winEBrochure = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 

function writeCaller(callerWindow) {
  var myCaller = readCookie("myCallerWindow"); 
	if (myCaller == null) {
	   createCookie("myCallerWindow",callerWindow,2); 
	}
}

function confirmClose(callerWindow) {
    
  if (readCookie("myCallerWindow") == "main") {	
	//event.returnValue = '[Ok] = Will close the Catalog / [Cancel] = Continue using the Catalog.';  
	event.returnValue = 'WARNING! Loading of images is in progress... Please avoid closing this window while fetching data from the server or else the application will not work properly. Recommendation is to minimized the window or close the parent or the main window where the Catalog is calling from. This recommendation is to prevent session loss while using this Catalog. Thank you.';  
	//return false;
  } 
  
}

function HandleOnClose() {
if (myclose==true) alert("Window is closed");
}

function respConfirm () {
     var response = confirm('Confirm Test: Continue?');
     // OR var response = window.confirm('Confirm Test: Continue?');

     if (response) alert("Your response was OK!");
     else alert("Your response was Cancel!");
}

function closePopup() {
	//if (typeof winEBrochure.closed == "undefined" || typeof winEBrochure == null) {
	//	  alert("undefined");
	//	}
		
	if (false == winEBrochure.closed){
	   winEBrochure.close();		
	} else {
	  // alert('Window already closed!');
	}
}    



