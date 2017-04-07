

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
          background: url(../images/essayPage1.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          
          
          }
        
          body {
              
              background: none;
              
              
          }
          
          #pageHeader
          {
              font-weight:bold;
              font-size:20px;
              color:black;
              background-color:#cc0808;
              border-radius:20px;
              width: 300px;
              
              text-align: center;
              position:fixed;
              top:10px;
              left:10px;

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
          
        .essayContainer {
              
              text-align: left;
              margin-top: 100px;
              width: 450px;
              background-color:white;
              color:black;
              border-radius:20px;
              height:1000px;
              width:900px; 
              margin: auto;
              width: 55%;   
              padding: 10px;
            overflow:scroll;
            
            
          }
          
          .link
          {
              
              border-radius:10px;
              width:250px;
              height:80px;

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
          .link
          {
              margin:10px;
          }
          #myTable
          {
            margin: auto;
            width: 50%;
            padding: 10px;
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
             
              width:200px;
              background-color:#cc0808;
              color:black;
          }
          
          
            #returnToEssays
          {
              position:fixed;
              top:60px;
              left:10px;
              border-radius:20px;
              text-align:center;
              
              font-weight:bold;
              font-size:20px;
              
              float:left;
             
              width:200px;
              background-color:#cc0808;
              color:black;
          }
          
          #essayTitle
          {
              font-size:20px;
              font-weight:bold;
              text-decoration:underline;
              text-align:center;
              margin-bottom:10px;
          }
          
          #essayConent
          {
              font-size:16px;
              text-align:left;
              padding-bottom:10px;
              overflow:scroll;
          }
          
      </style>
      
  </head>
  <body>
      
      <div id="pageHeader">
      
        Matthew Daw's Essay Page
      
      </div>
      
      <a href="homePage.php"><div id="returnHome">Return To Home</div></a>
    
      <div class="container" id="pageContent">
      
          <h1>Essays</h1>
          
         
          
          
          <table id="myTable">

            <tr>              
                <td><button id="personalBiography" class="link">Person Biograph</button></td>
                <td><button id="category" class="link">Category Scholarship Activities</button></td>
            </tr>
            <tr>              
                <td><button id="leadership" class="link">Leadership Description</button></td>
                <td><button id="service" class="link">Community Service/Citizenship Description</button></td>
            </tr>
            <tr>              
                <td><button id="unique" class="link">Unique Qualities</button></td>
                <td><button id="lifeEnrichment" class="link">Life Enrichment</button></td>
            </tr>
 
          
          
          
          </table>
          
      
            
        </div>
            
      
<script>

    
function populatePre(url) {
    var myID = "essayContent";

    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        document.getElementById(myID).textContent = this.responseText;
    };
    xhr.open('GET', url);
    xhr.send();
}
    

    var makeProgramInforAppear = function(myTitle,fileLocation)
    {
        var btn = document.createElement("div");        // Create a <button> element

        btn.className = "essayContainer";
 
        
        
        var header = document.createElement("div");
        //header.id = "headerID";
        header.id = 'essayTitle';
        //document.getElementById("demo").innerHTML = "Paragraph changed!";
        header.innerHTML = myTitle;
        
        btn.appendChild(header);
        
        

        
        
        
        var essayContent = document.createElement("pre");
        essayContent.id = "essayContent";
        //header.id = 'essayTitle';
        //document.getElementById("demo").innerHTML = "Paragraph changed!";
        populatePre(fileLocation);
        
        btn.appendChild(essayContent);
        
        document.body.appendChild(btn);
        

        
        
        var temp = document.createElement("a");
        temp.href = "techniquePrograms.php";
        var returnToEssays = document.createElement("div");
        returnToEssays.innerHTML = "Return To Programs";
        returnToEssays.id = "returnToProgram";
        temp.appendChild(returnToEssays);
        
        document.body.appendChild(temp);
        
  


        var temp = document.createElement("a");
        temp.href = "techniquePrograms.php";
        var returnToEssays = document.createElement("div");
        returnToEssays.innerHTML = "Return To Essays";
        returnToEssays.id = "returnToProgram";
        temp.appendChild(returnToEssays);
        
        document.body.appendChild(temp);
            
        
        var temp = document.createElement("a");
        temp.href = "essays.php";
        var returnToEssays = document.createElement("div");
        returnToEssays.innerHTML = "Return To Essays";
        returnToEssays.id = "returnToEssays";
        temp.appendChild(returnToEssays);
        
        document.body.appendChild(temp);

    }
    
    var clearInfo = function()
    {
        document.getElementById("pageContent").style.display = 'block';
        // hide the lorem ipsum text
        document.getElementById("pageContent").style.display = 'none';
        // hide the link
        //btn.style.display = 'none';
        
    }
    
    document.getElementById("personalBiography").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Personal Biography","../essayText/personalBio.txt");
    }
    
    document.getElementById("category").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Category Scholarship Activities","../essayText/category.txt");
        
    }
    
    document.getElementById("leadership").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Leadership Description","../essayText/leadership.txt");
        
    }
    
    document.getElementById("service").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Community Service/Citizenshop Description","../essayText/service.txt");
        
    }
    
    document.getElementById("unique").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Unique Qualities","../essayText/unique.txt");
        
    }
    
    document.getElementById("lifeEnrichment").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Life Enrichment","../essayText/life.txt");
        
    }
    
    document.getElementById("returnToEssays").onclick = function()
    {
        alert("check");
    }
    
</script>
            
  

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      
  </body>
</html>



