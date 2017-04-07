<?php

    $weather = "";
    $error = "";

    if($_GET['city'])
    {
        
        $city = str_replace(' ','',$_GET['city']);
    
        $forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        $file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        if($file_headers[0] == "HTTP/1.1 404 Not Found")
        {
            $error = "That city could not be found.";
        }
        
        else
        {
        
        $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">',$forecastPage);
            
            if(sizeof($pageArray) > 1)
            {
        
                $secondPageArray = explode('</span></span></span>',$pageArray[1]);
                
                    if(sizeof($secondPageArray) > 1)
                    {

                        $weather = $secondPageArray[0];
                        
                    }
                    
                    else
                    {
                        $error = "That city could not be found.";
                    }
                
            }
            else
            {
                $error = "That city could not be found.";
            }
            
        }
        
    }
    

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

      <title>Matthew'sPage</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <style type="text/css">
      
      html { 
          background: url(images/backgroundImage.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
        
          body {
              
              background: none;
              
          }
          
          .header
          {
              font-weight:bold;
              font-size:20px;
              color:black;
              background-color:white;
              border-radius:20px;
              width: 350px;
              text-align: center;
              margin:10px;
          }
          
          .container {
              
              text-align: center;
              margin-top: 100px;
              width: 450px;
              
          }
          
          input {
              
              margin: 20px 0;
              
          }
          
          #weather {
              
              margin-top:15px;
              
          }
         
                    #returnHome
          {
              position:fixed;
              top:10px;
              right:10px;
              border-radius:20px;
              text-align:center;
              
              font-weight:bold;
              font-size:20px;
              
              float:right;
             
              width:400px;
              background-color:#cc0808;
              color:black;
          }
          
      </style>
      
  </head>
  <body>
      
      <div class="header">
      
        Matthew Daw's Weather Page
      
      </div>
      
    
      <div class="container">
      
          <h1>What's The Weather?</h1>
          
          
          
          <form>
  <fieldset class="form-group">
    <label for="city">Enter the name of a city to get a 1-3 day weather forcast.</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php echo $_GET['city']; ?>">
  </fieldset>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      
      
        <div id = "weather">
           
            <?php
            
                if($weather)
                {
                    echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                }
            
                else if ($error)
                {
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                }
            
                            

            
            ?>
            
        </div>
            
            
        </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      
  </body>
</html>



