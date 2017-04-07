
<html>

    <head>
        
        <title>jQuery</title>
 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        
        <script src="jquery-ui/jquery-ui.js"></script>
        
        <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
        
        <style type="text/css">

	#draggable
		{
			width:100px;
			height:100px;
			background-color:red;
		}

	#droppable
	{
		width:300px;
		height:300px;
		background-color:blue;
	}

	</style>
        
    </head>

    <body>

	<div id="draggable"></div>

	<div id="droppable"></div>
        
       

	<script type="text/javascript">

	$("#draggable").draggable();

	$("#droppable").droppable({

	drop: function(event, ui)
	{
		alert("dropped");
	}
});

        </script>
        
    </body>

</html>
