<head>
        <title>MatthewDaw</title>
        
         <link rel="stylesheet" type="text/css" href="cssSection2.css">

</head>


<body>

<div  id="pageTitle">
    
    <div id="pageHead">
    <img class="stateSeal" src="images/stateSeal.png"><span id="text-title">Legislators And Their Lobbyists</span>
        
</div>
    
    <div id="content">
    
        <div id="side-bar">
            
            
            <button class="button" id="home">Home</button>
            <button class="button" id="senate">Senate Members</button>
            <button class="button" id="house">House Members</button>
            <button class="button" id=lobbyists>Lobbyists</button>
            <button class="button" id=lobbyists>Company Sponsors</button>
            
            <table id="myTable">
            </table>
            
        </div>
    
    
 </div> 

    
    </div>







    
                <script type="text/javascript">





   
/*
var generateDetailedData = function()
{
    
<?php
include 'detailGenerator.php';
?>
   
}*/



//include 'detailGenerator.php';
var magicArray = (<?php echo json_encode($array); ?>);
//alert(magicArray[1][11]);

//global 
var houseObjectBox = [];
var senateObjectBox = [];
var completeObjectBox = [];

var table = document.getElementById("myTable");
var tableLength = 5;
var activePage = "home";
var generateData = true;
                    
var sizeOfSenate = 29;
var sizeOfHouse = 75;

                    





function clearTable()
{
  
    var rowCount = table.rows.length;
    for (var b = rowCount; b > 0; b--) {
      table.deleteRow(b-1);
   }
    
}





function person(pName,pID,pPicture,pDist)
{
    this.name = pName;
    this.district = pDist;
    this.btn = document.createElement('button');
    this.btn.className= 'person-Box';
    this.btn.id = activePage+pID;
    
    
           this.img = new Image();

                this.img.src = pPicture;
                this.img.className = "person-Picture";
                
                
                this.btn.appendChild(this.img);
    
    
        this.t = document.createElement('div');
                this.z = document.createTextNode(this.name);
                this.t.id = "legislator-name-text/n";
                this.t.appendChild(this.z);
    
                this.btn.appendChild(this.t);
    
        this.o = document.createElement('div');
                this.p = document.createTextNode(this.district);
                this.o.id = "legislator-district-text";
                this.o.appendChild(this.p);
    
                this.btn.appendChild(this.o);
    

    
    this.btn.addEventListener("click", function() {
          //window.location.href = "http://79.170.40.172/matthewbradleydaw.com/representativeProject/htmlSection.php?source=" + activePage + "findNumber=" + pID;
        
        //makePersonalInfoAppear(pName,pID,pPicture,pDist);
        makePersonalInfoAppearDerived(pID);
	
    }, false);
}






var newFillObjectBox = function()
{
    for(var i = 0; i < magicArray.length-2; i++)
    {
        var myThing = new person(magicArray[i+1][0],(i+1),magicArray[i+1][3],"District- "+magicArray[i+1][7] + ' ' + magicArray[i+1][11]);
        completeObjectBox[i] = myThing;
        //pName,pID,pPicture,pDist
    }
    //fillTable(completeObjectBox);
}
newFillObjectBox();

    
var fillTable = function(objectArray,house)
{
    
    //var row = table.insertRow(0);
    //var cell = row.insertCell(0);
    //cell.appendChild(objectBox[2].btn);
        
    r = 0;
    k = 0;
    
    var startPoint;
    var endPoint;
    var addAmount = 0;

	if(house =="house")
	{
	   startPoint = 0;
        endPoint = sizeOfHouse;
	}

	if(house=="senate")
	{
        var addAmount = sizeOfHouse;
        startPoint = sizeOfHouse+1;
        endPoint = sizeOfHouse + sizeOfSenate -75;
	}
    
    tempObjectBox = completeObjectBox;

    var startLegString = "images/leg-";
    var endLegString = ".png";
    var combined = "";
    
    for (var r = 0; r < ((endPoint)/tableLength); r++)
        {
        row = table.insertRow(r);


        while((k != (endPoint )) && (k != (r*tableLength)+tableLength))
            {
        
        var cell = row.insertCell(k - (r*tableLength));
        cell.appendChild(tempObjectBox[k+addAmount].btn);
                k++;

            }
        
        
        }
        
    
}


document.getElementById("home").onclick = function()
{
    
    //window.location.href = "http://79.170.40.172/matthewbradleydaw.com/representativeProject/htmlSection.php?source=blank";
	clearTable();
}

document.getElementById("house").onclick = function()
{

    clearTable();
    fillTable(completeObjectBox,"house");
}

document.getElementById("senate").onclick = function()
{
    clearTable();
    fillTable(completeObjectBox,"senate");
    
}









var makePersonalInfoAppearDerived = function(IDnum)
{
	clearTable();

    var i = IDnum;

    
        var pName = magicArray[i][1];
        var pPicture = magicArray[i][3];
        var pDist = magicArray[i][11];
        var derprofession = magicArray[i][9];
    

    if(activePage == "house")
        {
            //alert("house");
        }
    if(activePage == "senate")
        {
            //alert("senate");
        }

    var mybtn = document.createElement('button');
    mybtn.className= 'personInfoBox';
    
    var tempImg = new Image();

                tempImg.src = pPicture;
                tempImg.id = "personInfoBox-picture";
                
                
                mybtn.appendChild(tempImg);
    
    
        var t = document.createElement('div');
                var z = document.createTextNode(pName + ",");
                t.id = "personInfoBox-Text";
                
    
                
    
        //var o = document.createElement('div');
                var p = document.createTextNode("   "+pDist);
                p.id = "legislator-district-text"
                //o.id = "legislator-district-text";
                //o.appendChild(p);
                
                t.appendChild(z);
                t.appendChild(p);
    mybtn.appendChild(t);
    
                //mybtn.appendChild(o);
    
    
    //mybtn.innerHTML = pName;
    var row = table.insertRow(0);
    var cell = row.insertCell(0);

   cell.appendChild(mybtn);

    var mybtn = document.createElement('button');
    mybtn.className= 'personInforBoxExtended';

    var row = table.insertRow(1);
    var cell = row.insertCell(0);
cell.appendChild(mybtn);
	var personTable = document.createElement('TABLE');

    
    
    
//fill in person data box
	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Legislation: ");
         z.className = "personInfoExtendedTitle";

	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
	cell.appendChild(z);
    var row = personTable.insertRow(1);
    var cell = row.insertCell(0);
    
    
    
    
    
    
    var link = document.createElement("a");
    link.setAttribute("href", magicArray[i][13])
    //link.className = "someCSSclass";
    
    
    var linkText = document.createTextNode("Link");
    link.appendChild(linkText);
    t.className = "personInfoExtendedTitleDetails";
    var cell = prow.insertCell(1);
    cell.className = "personInfoExtendedTitleDetails";
    //cell.id = "personInfoExtendedTitle";
    cell.appendChild(link);  
    
    
    
    	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Committee(s): ");
         z.className = "personInfoExtendedTitle";
	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
    //cell.style.textDecoration = none;
	cell.appendChild(z);
    
    
    var t = document.createTextNode(magicArray[i][12]);
    t.className = "personInfoExtendedTitleDetails";
    var cell = prow.insertCell(1);
    cell.className = "personInfoExtendedTitleDetails";
    //cell.id = "personInfoExtendedTitle";
    cell.appendChild(t);    
	


    
    
	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Legilative History:    ");
         z.className = "personInfoExtendedTitle";
	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
    //cell.style.textDecoration = none;
	cell.appendChild(z);
    
    
    var t = document.createTextNode(magicArray[i][4] + "-");
    t.className = "personInfoExtendedTitleDetails";
    var cell = prow.insertCell(1);
    cell.className = "personInfoExtendedTitleDetails";
    //cell.id = "personInfoExtendedTitle";
    cell.appendChild(t);



	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Profession: ");
         z.className = "personInfoExtendedTitle";

	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
	cell.appendChild(z);
    var row = personTable.insertRow(0);
    var cell = row.insertCell(0);
    
    
    var t = document.createTextNode(magicArray[i][9]);
    t.className = "personInfoExtendedTitleDetails";
    var cell = prow.insertCell(1);
    cell.className = "personInfoExtendedTitleDetails";
    //cell.id = "personInfoExtendedTitle";
    cell.appendChild(t);




	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Education: ");
         z.className = "personInfoExtendedTitle";

	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
	cell.appendChild(z);
    var row = personTable.insertRow(0);
    var cell = row.insertCell(0);
    
    
    var t = document.createTextNode(magicArray[i][10]);
    t.className = "personInfoExtendedTitleDetails";
    var cell = prow.insertCell(1);
    cell.className = "personInfoExtendedTitleDetails";
    //cell.id = "personInfoExtendedTitle";
    cell.appendChild(t);
	
    
/*
	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Email: ");
         z.className = "personInfoExtendedTitle";

	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
	cell.appendChild(z);
    var row = personTable.insertRow(0);
    var cell = row.insertCell(0);
*/
    

	mybtn.appendChild(personTable);
	 var z = document.createTextNode("Party: ");
         z.className = "personInfoExtendedTitle";

	var prow = personTable.insertRow(0);
	var cell = prow.insertCell(0);
	cell.className = "personInfoExtendedTitle";
	cell.appendChild(z);

    var row = personTable.insertRow(0);
    var cell = row.insertCell(0);
    
    
    var t = document.createTextNode(magicArray[i][6]);
    t.className = "personInfoExtendedTitleDetails";
    var cell = prow.insertCell(1);
    cell.className = "personInfoExtendedTitleDetails";
    //cell.id = "personInfoExtendedTitle";
    cell.appendChild(t);
    
            //console.log(magicArray[i][17]);
            if(magicArray[i][17] != "")
                {
                        mybtn.appendChild(personTable);
             var z = document.createTextNode("Possition: ");
                 z.className = "personInfoExtendedTitle";

            var prow = personTable.insertRow(0);
            var cell = prow.insertCell(0);
            cell.className = "personInfoExtendedTitle";
            cell.appendChild(z);

            var row = personTable.insertRow(0);
            var cell = row.insertCell(0);


            var t = document.createTextNode(magicArray[i][17]);
            t.className = "personInfoExtendedTitleDetails";
            var cell = prow.insertCell(1);
            cell.className = "personInfoExtendedTitleDetails";
            //cell.id = "personInfoExtendedTitle";
            cell.appendChild(t);

                }
    
    
    
  
}









</script>






</body>