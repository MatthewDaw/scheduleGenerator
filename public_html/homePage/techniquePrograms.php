

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
          background: url(../images/programPage3.jpg) no-repeat center center fixed; 
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
              margin-top: 70px;
              width: 450px;
              background-color:white;
              color:black;
              border-radius:20px;
              height:660px;
              width:650px;
          }
          
        .essayContainer {
              
              text-align: center;
              margin-top: 100px;
              width: 450px;
              background-color:white;
              color:black;
              border-radius:20px;
              height:11820px;
              width:900px; 
              margin: auto;
              width: 55%;   
              padding: 10px;
            
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
          
          
            #returnToProgram
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
          
            #download
          {
              position:fixed;
              top:110px;
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
          
            #download2
          {
              position:fixed;
              top:150px;
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
          
          #essayContent
          {
              font-size:16px;
              text-align:left;
              padding-bottom:10px;
          }

          
      </style>
      
  </head>
  <body>
      
      <div id="pageHeader">
      
        Matthew Daw's Program
      
      </div>
      
      <a href="homePage.php"><div id="returnHome">Return To Home</div></a>
    
      <div class="container" id="pageContent">
      
          <h1>Programs</h1>
          
         
          
          
          <table id="myTable">

            <tr>              
                <td><button id="factorial" class="link">Factorial</button></td>
                <td><button id="graph" class="link">Graph</button></td>
            </tr>
            <tr>              
                <td><button id="hashTable" class="link">Hash Table</button></td>
                <td><button id="library" class="link">Library Database Generator</button></td>
            </tr>
            <tr>              
                <td><button id="linkedLists" class="link">Linked Lists</button></td>
                <td><button id="machineLanguage" class="link">Machine Language(LC3) Adder</button></td>
            </tr>
 
            <tr>              
                <td><button id="myVector" class="link">My Vector Class</button></td>
                <td><button id="Queue" class="link">Queue</button></td>
            </tr>
            
 
            <tr>              
                <td><button id="sorting" class="link">Sorting Algorithms</button></td>
                <td><button id="stacksAndQueues" class="link">Stacks and Queues</button></td>
            </tr>
            
 
            <tr>              
                <td><button id="tree" class="link">Trees</button></td>
                <td><button id="consoleGame" class="link">Console Game</button></td>

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

    var makeProgramInforAppear = function(myTitle,fileLocation,exeFile)
    {
        var btn = document.createElement("div");        // Create a <button> element

        btn.className = "essayContainer";
        btn.id = "aEssayContainer";
        
        
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
        
        if(exeFile == "Simulate")
            {
                    var temp = document.createElement("a");
                    temp.href = "../executableFiles/"+exeFile+".exe";
                    var returnToEssays = document.createElement("div");
                    returnToEssays.innerHTML = "Download Sinulator";
                    returnToEssays.id = "download";
                    temp.appendChild(returnToEssays);

                    document.body.appendChild(temp);
                
                    var temp = document.createElement("a");
                    temp.href = "../executableFiles/calculator.obj";
                    var returnToEssays = document.createElement("div");
                    returnToEssays.innerHTML = "Download Object File";
                    returnToEssays.id = "download2";
                    temp.appendChild(returnToEssays);

                    document.body.appendChild(temp);
            }
        else
        {
        
        var temp = document.createElement("a");
        temp.href = "../executableFiles/"+exeFile+".exe";
        var returnToEssays = document.createElement("div");
        returnToEssays.innerHTML = "Download Executable";
        returnToEssays.id = "download";
        temp.appendChild(returnToEssays);
        
        document.body.appendChild(temp);
            

        var temp = document.createElement("a");
        temp.href = "techniquePrograms.php";
        var returnToEssays = document.createElement("div");
        returnToEssays.innerHTML = "Return To Programs";
        returnToEssays.id = "returnToProgram";
        temp.appendChild(returnToEssays);
        
        document.body.appendChild(temp);
            
        }

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
        makeProgramInforAppear("Facotial", "../programText/factorial.txt","factorial");
    }
    
    document.getElementById("graph").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Graph", "../programText/graph.txt","graph");
    }
        
    document.getElementById("hashTable").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Hash Table", "../programText/hashTable.txt","hashTable");
    }
        
    document.getElementById("library").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Library Database Generator", "../programText/libraryCatalog.txt","libraryCatalog");
    }
        
    document.getElementById("linkedLists").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Linked Lists", "../programText/linkedLists.txt","linkedLists");
    }
        
    document.getElementById("machineLanguage").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Machine Language(LC3) Adder", "../programText/machineLanguage.txt","Simulate");
    }
             
    document.getElementById("myVector").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("My Vector Class", "../programText/myVector.txt","myVector");
    }
            
    document.getElementById("Queue").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Queue", "../programText/queue.txt","queue");
    }
            
    document.getElementById("sorting").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Sorting Algorithms", "../programText/sorting.txt","sorting");
    }
            
    document.getElementById("stacksAndQueues").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Stacks And Queues", "../programText/stacksAndQueues.txt","stacksAndQueues");
    }
                
    document.getElementById("tree").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Trees", "../programText/tree.txt","tree");
    }
    
    document.getElementById("consoleGame").onclick = function()
    {
        clearInfo();
        makeProgramInforAppear("Game Object File", "../programText/game.txt","game");
    }
    

    
</script>
            
  

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

      
  </body>
</html>



