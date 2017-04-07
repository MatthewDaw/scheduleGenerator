


<form name="refreshForm">
<input type="hidden" name="visited" value="" />
</form>

<form method="POST" id="emptyInputs">
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
</body>
<!-- jQuery first, then Bootstrap JS. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">

          
          var classNumber = 1;

           var scheduleArray = <?php echo json_encode($savedClassData); ?>;
           
        //alert(scheduleArray.length);
          
          //alert(scheduleArray[0][2]);
           
          for(i = 0; i < scheduleArray.length; i++)
          {
              
              console.log(scheduleArray[i]);
              
              var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input value="'+scheduleArray[i][2]+'"  name="nameOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'  "></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input value="'+scheduleArray[i][3]+'" name="minSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input value="'+scheduleArray[i][4]+'" name="maxSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input value="'+scheduleArray[i][5]+'" name="minNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input value="'+scheduleArray[i][6]+'" name="maxNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td></td> </tr></table><br><br>');
              
              
              //var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input value="'+scheduleArray[i][2]+'" id="nameOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input id="minSizeOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input id="maxSizeOfClass'+classNumber+'" value="'+scheduleArray[i][3]+'" name="maxSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input value="'+scheduleArray[i][4]+'" id="minNumberOfSection'+classNumber+'" name="minNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input id="maxNumberOfSection'+classNumber+'" name="maxNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> </tr></table><br><br>');

              //name of inputs: nameOfClass, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSections, schedClose
              
              $("#classListTable").append(newTableData);
              
              
   
                        
              
              classNumber++; 
          }

          
          

          
          
         
function checkRefresh()
{
   /* 
    if(document.refreshForm.visited.value == "")
    {           
        // This is a fresh page load
            alert ( 'Fresh Load' );
        document.refreshForm.visited.value = "1";
            
    }
    else
    {

        // This is a page refresh
        alert ( 'Page has been Refreshed, The AJAX call was not made');
                 $(document).ready(function() {
            //option A
                     
            $("form").submit(function(e){
                alert('submit intercepted');
                e.preventDefault(e);
            });
        });
            

    }
    */
}
   checkRefresh();       
          
$( document.body ).click(function() {
    //alert('Hi I am bound to the body!');
    e.default
    document.cookie = "username=John Doe";
});
          
          
          
          document.getElementById("addClass").onclick = function()
          {
              //alert("click");
              //var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods"></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;"></fieldset></td><td><td><form method="post"><input  name="schedClose" value="aValue" class="tempClass2" hidden><input id="aValueclose" type="submit" value="close" class="tempClass"></form></td></td> </tr></table><br><br> ');
              
              var newTableData = $('<table><td>Class Name</td><td><fieldset class="form_group" ><input id="nameOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input id="minSizeOfClass'+classNumber+'" type="text" name="firstname"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input id="maxSizeOfClass'+classNumber+'" name="maxSizeOfClass'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input id="minNumberOfSection'+classNumber+'" name="minNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input id="maxNumberOfSection'+classNumber+'" name="maxNumberOfSection'+classNumber+'" class="form-control scheduleInput" type="text" name="numberOfPeriods'+classNumber+'" style="width:120px;"></fieldset></td> </tr></table><br><br>');

              //name of inputs: nameOfClass, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSections, schedClose
              
  
              
              
              
              $("#classListTable").append(newTableData);
              
              classNumber++;       
              
          }
          
        
          var scheduleArray = <?php echo json_encode($numberOfClassPeriods); ?>;
        
          //alert(scheduleArray);
        document.getElementById("numberOfPeriods").value = scheduleArray;
          
          
          var numOfStudentsArray = <?php echo json_encode($numberOfStudents); ?>;
        
          //alert(scheduleArray);
        document.getElementById("numberOfStudents").value = numOfStudentsArray;
      
          
    </script>
      </body>
</html>
