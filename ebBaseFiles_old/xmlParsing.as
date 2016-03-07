//------------- xmlParsing.as functions : BEGIN -------------\\
function getNodeValue(argXn:XMLNode, argStrSearch:String):String {
	var strTarget:String = null, strNodeVal:String = null;
	argStrSearch = argStrSearch.toUpperCase();		
	for (var aNode:XMLNode = argXn.firstChild; aNode != null; aNode=aNode.nextSibling) {
		strTarget = aNode.nodeName.toUpperCase();
		if (strTarget == argStrSearch) {
			strNodeVal = aNode.firstChild.nodeValue;	
			break;
		}
	} //for (var aNode:XMLNode = my_xmlNode.firstChild; aNode != null; aNode=aNode.nextSibling)
	return strNodeVal;
} //function getNodeValue(argXMLNode:XMLNode, argStrSearch:String):String
	
function getNode(argXn:XMLNode, argStrSearch:String):XMLNode {
	var xnNode:XMLNode = null;
	var strTarget:String = null;
	argStrSearch = argStrSearch.toUpperCase();		
	for (var aNode:XMLNode = argXn.firstChild; aNode != null; aNode=aNode.nextSibling) {
		strTarget = aNode.nodeName.toUpperCase();
		if (strTarget == argStrSearch) {
			xnNode = aNode;
			break;			
		}
	} //for (var aNode:XMLNode = argXn.firstChild; aNode != null; aNode=aNode.nextSibling)
	return xnNode;
} //function getNode(argXn:XMLNode, argStrSearch:String):XMLNode
	
//------------- xmlParsing.as functions : END -------------\\