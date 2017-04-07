<body>

    <div class="container">
        
    <button type="button" id="senate">senate</button>
    <button type="button" id="house">house</button>
        
        
         <form>
  
    <input type="text" class="form-control" name="currentPage" id="city" placeholder="Eg. London, Tokyo">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          
          
    <script>
        
        //document.getElementById("selectedButton").value = "texting";
          
         document.getElementById("house").onclick = function()
            {
             
                document.getElementById("city").value = "house";
            }
        document.getElementById("senate").onclick = function()
            {
             
                document.getElementById("city").value = "senate";
            }
          
    </script>


        </div>
    
  </body>


<?php

    $curretnPage = "";
    $error = "";
    echo "soemthing";
    if($_GET['currentPage'] == "senate")
    {
        
        echo "senate";
        
    }
    if($_GET['currentPage'] == "house")
    {
        
        echo "house";
        
    }

?>