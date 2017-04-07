<html>

<head>
    
    <title>jQuery</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
    <style>
    
        #circle
        {
            width:150px;
            height:150px;
            border-radius:50%;
            background-color:green;
            margin:10px;
        }
        
        .square
        {
            width:150px;
            height:150px;
            background-color:red;
            margin:10px;
        }
        
        #hiddenText
        {
            display:none;
            
        }
    
    </style>
    
</head>

    
<body>
    


    <div id="circle"></div>
    
    <script type="text/javascript">

  /*      $("div").click(function()
        {
            $(this).fadeOut("slow",function(){
           alert("fadeout has finished"); 
        });               
        });
        
        $("#fadeout").click(function(){
           $("p").fadeOut(); 
        });*/
        
        /* $("#toggle").click(function()
         {
             if($("#text").css("display") == "none")
                 {
                     $("#text").fadeIn();
                 }
            $("#text").fadeOut();
         });*/
        
        $("#circle").click(function(){
           
            $(this).animate({
                width:"400px",
                height:"400px",
                marginLeft:"100px",
                marginTop:"100px"
            }, 2000, function(){
                $(this).css("background-color","red");
            });
            
        });
        
    
    </script>
    
</body>

</html>