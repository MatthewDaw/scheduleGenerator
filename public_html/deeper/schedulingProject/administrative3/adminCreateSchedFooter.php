


<form method="POST" id="save">
    <input type="hidden" name="delete" id="saveForm" value="" />
    <input type="hidden" name="save" id="saveForm" value="save" />
    
    <input type="hidden" name="nameOfClass" id="nameOfClass" value="" />
    
    <input type="hidden" name="minSizeOfClass" id="minSizeOfClass" value="" />
    
    <input type="hidden" name="maxSizeOfClass" id="maxSizeOfClass" value="" />
    
    <input type="hidden" name="minNumberOfSection" id="minNumberOfSection" value="" />
    
    <input type="hidden" name="maxNumberOfSection" id="maxNumberOfSection" value="" />
    
</form> 

<form method="POST" id="delete">
    <input type="hidden" name="save" id="" />
    <input type="hidden" name="delete" id="deleteForm"/>
</form> 

<!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">

          var postSaveButton = false;
          
          var classNumber = 1;
          var el;
          var id;
           var scheduleArray = <?php echo json_encode($savedClassData); ?>;
           
        
          for(i = 0; i < scheduleArray.length; i++)
          {
              
              console.log(scheduleArray[i]);
              
              //var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input value="'+scheduleArray[i][2]+'"  name="nameOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'  "></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input value="'+scheduleArray[i][3]+'" name="minSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input value="'+scheduleArray[i][4]+'" name="maxSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input value="'+scheduleArray[i][5]+'" name="minNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input value="'+scheduleArray[i][6]+'" name="maxNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td></td> </tr></table><br><br>');
              
              
              var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input id="nameOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input id="minSizeOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input id="maxSizeOfClass'+classNumber+'" name="maxSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input id="minNumberOfSection'+classNumber+'" name="minNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input id="maxNumberOfSection'+classNumber+'" name="maxNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> </tr></table><br><br>');

              //name of inputs: nameOfClass, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSections, schedClose
              
              $("#classListTable").append(newTableData);
              
              
             
              
     el = document.createElement('button');
 id = new Date().getTime().toString();
 // var class = "deleteClass";
  
  el.id = "className"+classNumber;
  el.innerHTML = "Delete Class";
  el.className = "deleteClass";
              /*

              */
  document.querySelector('.ct').appendChild(el);

              
                        
              
              classNumber++; 
          }
          
          
          
          document.querySelector('input[type="button"]').addEventListener('click', function() 
          {
              //alert("click");
              //var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods"></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;"></fieldset></td><td><td><form method="post"><input  name="schedClose" value="aValue" class="tempClass2" hidden><input id="aValueclose" type="submit" value="close" class="tempClass"></form></td></td> </tr></table><br><br> ');
              
              var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input id="nameOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input id="minSizeOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input id="maxSizeOfClass'+classNumber+'" name="maxSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input id="minNumberOfSection'+classNumber+'" name="minNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input id="maxNumberOfSection'+classNumber+'" name="maxNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> </tr></table><br><br>');

              //name of inputs: nameOfClass, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSections, schedClose
              
              
              
  el = document.createElement('button');
  id = new Date().getTime().toString();
 // var class = "deleteClass";
  
  el.id = "className"+classNumber;
  el.innerHTML = "Delete Class";
  el.className = "deleteClass";
  

    
  document.querySelector('.ct').appendChild(el);
              
              
              
              $("#classListTable").append(newTableData);
              
              classNumber++;       
              
          });
          
          if(postSaveButton)
          {
            
              var newTableData = $('<td><td><input  name="schedClose" value="classIsClosed" class="tempClass2" hidden><input id="aValueclose" type="submit" value="close" class="tempClass"></td></td>');

              //name of inputs: nameOfClass, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSections, schedClose
              
              $("#classListTable").append(newTableData);
              
          }
          
document.querySelector('input[type="button"]').addEventListener('click', function() {
  var el = document.createElement('button');
  var id = new Date().getTime().toString();
  el.id = id;
  el.innerHTML = id;
  //document.querySelector('.addClassButton').appendChild(el);
});
          
       
          
          
 document.querySelector('body').addEventListener('click', function(event) {
  if (event.target.className === 'deleteClass') {
      
    document.getElementById("deleteForm").value = event.target.id;
   document.getElementById("delete").submit();
      alert(event.target.id);
    
  }
    
  });
                                                 
      
          
          
 document.querySelector('body').addEventListener('click', function(event) {
  if (event.target.className === 'addClassButton') {
    document.getElementById("save").submit();
      alert(event.target.id);
  }
 });
 
              var i = 1;
    
   var k = 1;
var f = document.createElement("form");
f.setAttribute('method',"post");
f.setAttribute('action',"submit.php");
f.setAttribute('id',"class"+k+"")

var i = document.createElement("input"); //input element, text
i.setAttribute('type',"text");
i.setAttribute('name',"nameOfClass"+k+"");
//i.setAttribute('hidden','true');
i.setAttribute('value',""+document.getElementById('nameOfClass'+1+'').value+"");



f.appendChild(i);


document.getElementsByTagName('body')[0].appendChild(f);
    
    k++;

document.getElementById('saveClass').onclick = function() {


document.getElementById("class1").submit();    
    /*
    while(document.getElementById('nameOfClass'+i+''))
        {
    
        document.getElementById("save").id = 'save'+i+'';
    
    //$("#nameOfClass").name(""+document.getElementById('nameOfClass'+1+'').value+"");
    
    $("#nameOfClass").val(""+document.getElementById('nameOfClass'+i+'').value+"");
    
    //document.getElementById("nameOfClass").setAttribte('name', 'nameOfClass'+i+'');
        
        
        //////
            
    alert(document.getElementById('nameOfClass'+i+'').value);
    alert(document.getElementById('minSizeOfClass'+i+'').value);
    alert(document.getElementById('maxSizeOfClass'+i+'').value); 
    
        alert(document.getElementById('minNumberOfSection'+i+'').value);
    
    alert(document.getElementById('maxNumberOfSection'+i+'').value);
       
            document.getElementById("save").submit();
    i++;
        }*/
        
    
    
}
      
          
    </script>
      </body>
</html>