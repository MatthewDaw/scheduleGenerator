<html>

<head>
    
    <title>AJAX</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
</head>

    
<body>
     <p></p>
    
    <script type="text/javascript">
        
    $.ajax("info.txt").done(function(data)
                           {
       $("p").html(data); 
    }).fail(function()
           {
       alert("could not get data"); 
    });
    
    </script>
    
</body>

</html>