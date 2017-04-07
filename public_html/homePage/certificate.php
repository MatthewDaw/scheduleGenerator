

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
          background: url(../images/certificatePageImage.jpg) no-repeat center center fixed; 
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
              width: 500px;
              padding-left: 10px;
              margin:10px;
              text-align:center;
          }
          
          .container {
              
              text-align: center;
              margin-top: 100px;
              width: 950px;
              background-color:white;
              color:black;
              border-radius:20px;
              height:600px;
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
              color:white;
              background-color:darkred;
          }
          .link:active
          {
              color:white;
              background-color:darkred;
              text-decoration:none;
          }
          #myTable
          {
              
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
          th
          {
              padding:10px;
              text-decoration:underline;
          }
          table, td, th
          {
              border:1px solid black;
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
      
        Matthew Daw's Certificate Page
      
      </div>
      <a href="homePage.php"><div id="returnHome">Return To Home</div></a>
    
      <div class="container" id="pageContent">
      
          <h1>Links To Projects</h1>
          
         
          
          
          <table id="myTable">
          
            <tr>
            
                <th>Programming Certificates</th>
                <th>Digital Media</th>
                <th>Welding</th>
                <th>Wood Working</th>
                <th>Furniture Design and Manufacturing</th>
              
            </tr>
              
            <tr>
            
                <td><a href="../images/certificateImages/CCA-Certificate-HTML Level 1.pdf">HTML</a></td>
                <td><a href="../images/certificateImages/digitalMedia.pdf">Digital Media Front</a></td>
                <td><a href="../images/certificateImages/welding.pdf">Welding Front</a></td>
                <td><a href="../images/certificateImages/woodworking.pdf">Wood Working Front</a></td>
                <td><a href="../images/certificateImages/furnitureDesign.pdf">Furniture Design Front</a></td>
                <td></td>
              
            </tr>
              
            <tr>
            
                <td><a href="../images/certificateImages/CCA-Certificate-CSS Level 1.pdf">CSS</a></td>
                <td><a href="../images/certificateImages/digitalMediaBack.pdf">Digital Media Back</a></td>
                <td><a href="../images/certificateImages/weldingBack.pdf">Welding Back</a></td>
                <td><a href="../images/certificateImages/woodWorkingBack.pdf">Wood Working Back</a></td>
                <td><a href="../images/certificateImages/furnitureDesignBack.pdf">Furniture Design Back</a></td>
                <td></td>
              
            </tr>
              
              <tr>
              <td height="70"><a href="../images/certificateImages/CCA-Certificate-Javascript Level 1.pdf">Javascript<br> </a></td><td></td><td></td><td></td><td></td>
              </tr>
                            <tr>
              <td height="70"><a href="../images/certificateImages/CCA-Certificate-PHP Level 1.pdf">PHP<br> </a></td><td></td><td></td><td></td><td></td>
              </tr>
                            <tr>
              <td height="70"><a href="../images/certificateImages/CCA-Certificate-MySQL Level 1.pdf">MySQL<br> </a></td><td></td><td></td><td></td><td></td>
              </tr>
 
                                      <tr>
              <td height="70"><a href="../images/certificateImages/CCA-Certificate-jQuery Level 1.pdf">jQuery<br> </a></td><td></td><td></td><td></td><td></td>
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



