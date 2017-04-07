

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
          background: url(../images/solidWorks.jpg) no-repeat center center fixed; 
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
              width: 350px;
              
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
              width: 47%;   
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
          
          
          #pictureTable
          {   

            margin: auto;
            width: 50%;
            
            padding: 10px;
          }
          
          
          #pictureTable td, th
          {
            border:1px solid black;
              overflow: hidden;
              padding:4px;

          }
          
      </style>
      
  </head>
  <body>
      
      <div id="pageHeader">
      
        Matthew Daw's SolidWorks Page
      
      </div>
      
      <a href="homePage.php"><div id="returnHome">Return To Home</div></a>
    
      <div class="container" id="pageContent">
      
          <h1>Projects</h1>
          
         
          
          
          <table id="myTable">

            <tr>              
                <td><button id="classProjects" class="link">Class Projects</button></td>
                <td><button id="robotProject" class="link">Robot Project</button></td>
            </tr>
              
            <tr>              
                <td><button id="airCompresser" class="link">Airsoft Gun Air Compressor</button></td>
                <td><button id="miscProjects" class="link">Misc Projects</button></td>
            </tr>

          
          
          </table>
          
      
            
        </div>
            
      
<script>


    

    var makeProgramInforAppear = function(myTitle)
    {
        var btn = document.createElement("div");        // Create a <button> element

        btn.className = "essayContainer";
        btn.id = "essayContainer";
 
        
        
        var header = document.createElement("div");
        //header.id = "headerID";
        header.id = 'essayTitle';
        //document.getElementById("demo").innerHTML = "Paragraph changed!";
        header.innerHTML = myTitle;
        
        btn.appendChild(header);
        
        var pictureTable = document.createElement('TABLE');
        pictureTable.id = "pictureTable";
        btn.appendChild(pictureTable);
        
        document.body.appendChild(btn);
        

        
        
        var temp = document.createElement("a");
        temp.href = "solidWorks.php";
        var returnToEssays = document.createElement("div");
        returnToEssays.innerHTML = "Return To Projects";
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
    
    document.getElementById("classProjects").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Class Projects");
        
        var table = document.getElementById("pictureTable");
 

 
              
        //var src = document.getElementById("pictureTable");
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/BEARING.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/SAFTEYKEY.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
 
 
              
        //var src = document.getElementById("pictureTable");
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/U-BRACKET.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/SLIDER.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
 
              
        //var src = document.getElementById("pictureTable");
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/V-BLOCK.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/BLCOK ASSEMBLY.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/ALIGHNMENT GUIDE.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/BRACE.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/INDEX FEED.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/TOOL HOLDER.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);

        
        
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/INSERT CAP.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/SHAFT BASE.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
    
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/PIPE STAND.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/PACKING RING.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        
            var img = document.createElement("img");
        img.src = "../images/solidWorksImages/HP-4.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/SHAFT BASE.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        
    }
    
    document.getElementById("robotProject").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Robot Project");
        
        var table = document.getElementById("pictureTable");
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/topOfRobot.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
                
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/robotBase.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/midPlane.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);       
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/RealPIASSEM.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/aimingDevice.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
    }
    
    
    
    document.getElementById("airCompresser").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Airsoft Gun Air Compressor");
        
        var table = document.getElementById("pictureTable");

        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/leftGearBox.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/TopSkrew.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/airsoftgunassem.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/openGun.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        
    }
    
    
    document.getElementById("miscProjects").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Misc Projects");
        
        var table = document.getElementById("pictureTable");

        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/Braclet.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/ORNAMENT2.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/ORNAMENT.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/theWave.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        var row = table.insertRow(0);
        var cell = row.insertCell(0);
        
        cell.appendChild(img);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        
        
        var img = document.createElement("img");
        img.src = "../images/solidWorksImages/Ring.JPG";
        img.style.height = "210px";
        img.style.width = "300px";
        //src.appendChild(img);

        //var row = table.insertRow(1);
        var cell = row.insertCell(1);
        cell.style.height = "210px";
        cell.style.width = "300px";
        
        cell.appendChild(img);
        
        
        
    }
    
    
</script>
            
  

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      
  </body>
</html>



