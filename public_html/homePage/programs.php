

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
          background: url(../images/programPage1.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          
          
          }
        
          body {
              
              background: none;
              
              
          }
          
          .pageHeader
          {
              font-weight:bold;
              font-size:20px;
              color:black;
              background-color:#cc0808;
              border-radius:20px;
              width: 400px;
              margin:10px;
              text-align: center;
          }
          
          .container {
              
              text-align: center;
              margin-top: 100px;
              width: 450px;
              background-color:white;
              color:black;
              border-radius:20px;
              height:500px;
              width:650px;
              
          }
          .link
          {
              
              border-radius:10px;
              width:250px;
              height:80px;
              margin-bottom:20px;
                         
              font-size:18px;
              font-weight:bold;
              color:black;
          }
          .link:hover
          {
              color:black;
              background-color:darkred;
          }
          .link:active
          {
              color:black;
              background-color:darkred;
              text-decoration:none;
          }
          #myTable
          {
                margin: auto;
                width: 50%;
               
                border-collapse: separate;
                margin-top: 30px;
          }
          .linkText
          {
              color:black;
          }
          .linkText:hover
          {
              color:black;
              text-decoration:none;
          }
          
          .header
          {
              text-align:center;
              margin-bottom:15px;
              text-decoration:underline;
              font-weight:bolder;
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
      
      <div class="pageHeader">
      
        Matthew Daw's Program List Page
      
      </div>
      
      <a href="homePage.php"><div id="returnHome">Return To Home</div></a>
    
      <div class="container" id="pageContent">
      
          <h1>Links To Projects</h1>
          
         
          
          
          <table id="myTable">
            <tr>

            </tr>
              
              
            <tr>              
                <td><form  action="http://79.170.40.172/matthewbradleydaw.com/weatherGenerator.php?">
                <input class="link" type="submit" value="Weather Forcast Project" />
                </form></td> 
                <td><form  action="http://79.170.40.172/matthewbradleydaw.com/deeper/schedulingProject/administrative/adminLoginPage.php">
                <input class="link" type="submit" value="Scheduling Project" />
                </form></td> 
            </tr>
              
            <tr>
                <td><form  action="http://79.170.40.172/matthewbradleydaw.com/representativeProject/htmlSection.php?">
                <input class="link" type="submit" value="Representative Project" />
                </form></td> 
            </tr>
              
            <tr>
                <td><form  action="http://79.170.40.172/matthewbradleydaw.com/deeper/journal/signInPage.php?">
                <input class="link" type="submit" value="Journal Project" />
                </form></td> 
            </tr>
              
           <tr>    
                <td><form  action="http://79.170.40.172/matthewbradleydaw.com/deeper/twitterProject/">
                <input class="link" type="submit" value="Twitter Clone Project" />
                </form></td> 
            </tr>

          
          
          
          
          </table>
          
      
            
        </div>
            
      
<script>

    var makeProgramInforAppear = function(file)
    {
        var btn = document.createElement("div");        // Create a <button> element
        var t = document.createTextNode("CLICK ME");       // Create a text node
        btn.appendChild(t);                                // Append the text to <button>
        btn.className = "container";
        document.body.appendChild(btn);  
    }
    
    var clearInfo = function()
    {
        document.getElementById("pageContent").style.display = 'block';
        // hide the lorem ipsum text
        document.getElementById("pageContent").style.display = 'none';
        // hide the link
        //btn.style.display = 'none';
        
    }
    
    document.getElementById("factorial").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("text");
    }
    

    
</script>
            
  

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      
  </body>
</html>



