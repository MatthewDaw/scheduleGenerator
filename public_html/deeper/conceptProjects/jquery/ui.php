
<html>

    <head>
        
        <title>jQuery</title>
 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        
        <script src="jquery-ui/jquery-ui.js"></script>
        
        <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
        
        <style type="text/css">

	#resizable
		{
			width:100px;
			height:100px;
			background-color:red;
		}

	#also
{
width:100px;
			height:100px;
			background-color:yellow;
}

	</style>
        
    </head>

    <body>
        
       

	<div style="width:400px;height:300px;background-color:blue;">
	<span id="draggable">Drag me!</span>
	</div>

	<div id="resizable"></div>

	<div id="also"></div>
        
        <script type="text/javascript">
            
           $( "#draggable" ).draggable({containment:"parent"});  //{ axis: "x"}    

      	   $("#resizable").resizable({
		grid:50,
		alsoResize: "#also",
		resize: function(event, ui)
	{
	$("#resizable").width() > 300
		{
		alert("big enough");
		}
	}
	});

	$("#also").resizeable();
            
        </script>
        
    </body>

</html>
