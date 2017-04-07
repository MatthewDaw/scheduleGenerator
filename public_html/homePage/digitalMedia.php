

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
          background: url(../images/digitalMediaImage.jpg) no-repeat center center fixed; 
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
              position:fixed;
              left:10px;
              top:10px;
              text-align: center;
          }
          
          .container {
              
              text-align: center;
              margin-top: 100px;
             
              background-color:white;
              color:black;
              border-radius:20px;
              height:1000px;
              width:1300px;
              
          }
          .link
          {
              
              border-radius:10px;
              width:250px;
              height:80px;
              margin:10px;
                         
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
                width: 80%;
               
                border-collapse: separate;
                margin-top: 30px;
                table-layout:fixed;
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
          
          table, td, th
          {
              border:1px solid black;
              overflow: hidden;
          }
          
          
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    margin:10px;
}



/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}



/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

         
      </style>
      
  </head>
  <body>
      
      <div class="pageHeader">
      
        Matthew Daw's Digital Media Page
      
      </div>
      
      <a href="homePage.php"><div id="returnHome">Return To Home</div></a>
    
      <div class="container" id="pageContent">
      
          <h1>Photoshop / Illustrator Projects</h1>
          
         
          
          
          <table id="myTable">

            <tr>              
                <td>
                    <img id="myImg" src="../images/digitalMediaPics/logo.jpg"  width="300" height="200">

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
                </td>
                                <td>
                    <img id="myImg" src="../images/digitalMediaPics/pictureToPost.jpg"  width="450" height="200">

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
                </td>
                
            </tr>
              
            <tr>
                 <td>
                    <img id="myImg" src="../images/digitalMediaPics/manAndFire.jpg"  width="300" height="200">

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
                </td>
                <td>
                    <img id="myImg" src="../images/digitalMediaPics/childPlay.jpg" width="450" height="172">

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
                </td>
                
            </tr>
              
              
                        <tr>
                 <td>
                    <img id="myImg" src="../images/digitalMediaPics/lionDoctorProject.jpg" width="350" height="154">

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
                </td>
                            <td><img id="myImg" src="../images/digitalMediaPics/yinYang.JPG" width="350" height="350"></td>
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
    

    
    
    
    
    
    
    
    
    
    
    
    
    









    
</script>
            
  

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      
  </body>
</html>



