// SNOW EFFECTS
// This works with all Version 4+ Browsers.
// That is IE, Netscape, and Opera.
// It is a modification of a program found on the web.
//
// Robert Laurie (theman@islandman.org)
// http://www.islandman.org/info/javascript/snow
//
var snowsrc="snow.gif" // URL path to the snow image
var flakes = 15;   // total snowflakes
var dx, xp, yp;    // coordinate and position variables
var am, stx, sty;  // amplitude and step variables
var i, doc_width = 800, doc_height = 600;

if (document.getElementById)
{
    if(document.body.clientWidth)
    {
        doc_width = document.body.clientWidth;
        doc_height = document.body.clientHeight;
    }
    else
    {
        doc_width = window.innerWidth;
        doc_height = window.innerHeight;
    }
}
else if (document.all)
{
    doc_width = document.body.clientWidth;
    doc_height = document.body.clientHeight;
}
else if (document.layers)
{
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
}

dx = new Array();
xp = new Array();
yp = new Array();
am = new Array();
stx = new Array();
sty = new Array();

for (i = 0; i < flakes; ++ i)
{
    dx[i] = 0;                        // set coordinate variables
    xp[i] = Math.random()*(doc_width-50);  // set position variables
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;         // set amplitude variables
    stx[i] = 0.02 + Math.random()/10; // set step variables
    sty[i] = 0.7 + Math.random();     // set step variables
    if (document.layers)
    {
        document.write("<layer name=\"dot"+ i 
        + "\" left=\"15\" top=\"15\" visibility=\"show\"><img src='" 
        + snowsrc+"' border=\"0\"></layer>");
    }
    else if (document.getElementById||document.all)
    {
        document.write("<div id=\"dot"+ i 
        +"\" style=\"POSITION: absolute; Z-INDEX: "
        + i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\">"
        +"<img src='" + snowsrc + "' border=\"0\"></div>");
    }
}

if (document.layers) snowNS();
else if (document.getElementById||document.all) snowIE_NS6();
  
function snowNS() // Netscape main animation function
{  
   for (i = 0; i < flakes; ++ i)  // iterate for every dot
   { 
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) 
      {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
        doc_width = self.innerWidth;
        doc_height = self.innerHeight;
      }
      dx[i] += stx[i];
      document.layers["dot"+i].top = yp[i];
      document.layers["dot"+i].left = xp[i] + am[i]*Math.sin(dx[i]);
    }
    setTimeout("snowNS()", 40);
}

function snowIE_NS6() // IE and NS6 main animation function
{  
    for (i = 0; i < flakes; ++ i)
    {
      yp[i] += sty[i];
      if (yp[i] > doc_height-50)
      {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
        if(document.body.clientWidth)
        {
            doc_width = document.body.clientWidth;
            doc_height = document.body.clientHeight;
        }
        else
        {
            doc_width = window.innerWidth;
            doc_height = window.innerHeight;
        }
      }
      dx[i] += stx[i];
      if (document.getElementById)
      {
        document.getElementById("dot"+i).style.top=yp[i];
        document.getElementById("dot"+i).style.left=xp[i] 
        + am[i]*Math.sin(dx[i]);
      }
      else if (document.all)
      {
        document.all["dot"+i].style.pixelTop = yp[i];
        document.all["dot"+i].style.pixelLeft = xp[i] 
        + am[i]*Math.sin(dx[i]);
      }
    }
    setTimeout("snowIE_NS6()", 40);
}