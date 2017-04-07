var table = document.getElementById("myTable");
var tableLength = 5;
var activePage = "home";
var legNames = [
var legNamesDist = ["masfaf sdfasfa sfsadfas fse","you"]

var senNames = [
    "Scott Sandall","Jefferson Moss","asdf","sgs"
];

var senDistNames = [
    "asd","tet","wet","et"
]


alert("hi");

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
        makePersonalInfoAppear(pID);
    }, false);
}


var getPictureLink = function(i)
{
    var imageSearch;
    if(activePage == "house")
        {
            imageSearch = "images/leg-"
        }
    if(activePage == "senate")
        {
            imageSearch = "images/sen-"
        }
        if(activePage == "home")
        {
            imageSearch = "images/home-"
        }
    return activePage+"-",imageSearch+(i+1)+".png";
}

var objectBox = [];
//objectBox.push(ted);
var bill = new person("bill","yoyo","apple");

var fillObjectBox = function(namesArray,sourceArray,tempObjectBox)
{    

    
    for(var i = 0; i < namesArray.length; i++)
        {
            var myThing = new person(namesArray[i],(i+1),getPictureLink(i),"District- "+(i+1)+": "+sourceArray[i]);
            tempObjectBox[i] = myThing;
        }
 
}
    
var fillTable = function(objectArray)
{
    
    //var row = table.insertRow(0);
    //var cell = row.insertCell(0);
    //cell.appendChild(objectBox[2].btn);
        
    r = 0;
    k = 0;
    var startLegString = "images/leg-";
    var endLegString = ".png";
    var combined = "";
    
    for (var r = 0; r < (objectArray.length/5); r++)
        {
        row = table.insertRow(r);


        while((k != objectArray.length) && (k != (r*tableLength)+tableLength))
            {
        
        var cell = row.insertCell(k - (r*tableLength));
        cell.appendChild(objectBox[k].btn);
                k++;

            }
        
        
        }
        
    
}


document.getElementById("home").onclick = function()
{
    
    activePage = "home";
    
    clearTable();
}

document.getElementById("house").onclick = function()
{
    activePage = "house";
    clearTable();
    fillObjectBox(legNames,legNamesDist,objectBox);
    fillTable(objectBox);
}

document.getElementById("senate").onclick = function()
{
    activePage = "senate";
    clearTable();
    fillObjectBox(senNames,senDistNames,objectBox);
    fillTable(objectBox);
}

var makePersonalInfoAppear = function(abtn)
{
    clearTable();
    var tempArray;
    var tempSourceArray;
    if(activePage == "house")
        {
            tempArray = legNames;
            tempSourceArray = legNamesDist;
        }
    if(activePage == "senate")
        {
            tempArray = senNames;
            tempSourceArray = senDistNames;
        }
    var pName = tempArray[abtn-1];
    var pSource = tempSourceArray[abtn-1];
    
    var mybtnName = document.getElementById(abtn);
    
    var mybtn = document.createElement('button');
    mybtn.className= 'personInfoBox';
    
    var tempImg = new Image();

                tempImg.src = getPictureLink(abtn-1);
                tempImg.id = "personInfoBox-picture";
                
                
                mybtn.appendChild(tempImg);
    
    
        var t = document.createElement('div');
                var z = document.createTextNode(pName);
                t.id = "personInfoBox-Text";
                
    
                
    
        //var o = document.createElement('div');
                var p = document.createTextNode(",   District "+abtn +": "+pSource);
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
}