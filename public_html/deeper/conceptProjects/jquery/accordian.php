
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


	<div id="accordian">

		<h3>Title</h3>
		<div>
			<p>text</p>
		</div>
		<h3>Title</h3>
		<div>
			<p>text</p>
		</div>
		<h3>Title</h3>
		<div>
			<p>text</p>
		</div>
		<h3>Title</h3>
		<div>
			<p>text</p>
		</div>

	</div>

	<ul id="sortable">

		<li>matt</li>
		<li>bill</li>
		<li>brad</li>

	</ul>

	<script type="text/javascript">

	$("#accordian").accordion();

	$("#sortable").sortable();

        </script>
        
    </body>

</html>
