function drawRect(argMc:MovieClip, argNumThickness:Number, argStrOutlineColor:String, argNumOutlineAlpha:Number, 
	argNumX:Number, argNumY:Number, argNumWd:Number, argNumHt:Number,
		argBgColor:String, argNumBgAlpha:Number):Void {
	with (argMc) {		
		if (argNumThickness != null)lineStyle(argNumThickness, argStrOutlineColor, argNumOutlineAlpha);			
		if (argBgColor != null)	beginFill(argBgColor, argNumBgAlpha);
		
		moveTo(argNumX,argNumY);
		lineTo(argNumX,argNumY+argNumHt);
		lineTo(argNumX+argNumWd,argNumY+argNumHt);
		lineTo(argNumX+argNumWd,argNumY);
		lineTo(argNumX,argNumY);
		
		if (argBgColor != null)	endFill();
	}	
} //function drawRect