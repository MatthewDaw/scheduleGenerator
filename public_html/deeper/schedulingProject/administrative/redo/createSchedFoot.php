
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">

jQuery.fn.exists = function(){ return this.length > 0; }

var numOfPeriods = "<?php echo $numberOfPeriods; ?>";

$('#numberOfPeriodsText').val(numOfPeriods);

var numOfstudents = "<?php echo $numberOfStudents ; ?>";     
    
$('#numberOfStudents').val(numOfstudents);

var schedPassword = "<?php echo $schedPassword ; ?>";    

$('#schedPasswordText').val(schedPassword); 
   
          
function getCanTeachCheckBoxData(input)
{    
    var preClassArray = input.split('&');
    var numberOfPeriods = preClassArray[0];
    ////////alert(preClassArray[1]);
    var classArray = preClassArray[1].split('/');
    var finalClassArray = [];
    
    var numberOfSubjects = 0;
    console.log((classArray[1].split(',')));
    
    var instructorSubjectsArray = [];
    
    for(i = 0; i < classArray.length-1; i++)
        {
            numberOfSubjects = numberOfSubjects +((classArray[i].split(',')).length) -1;
            instructorSubjectsArray[i] = ((classArray[i].split(',')).length) -1;
        }
    ////////alert(numberOfSubjects);
    
    numberOfIterations = numberOfSubjects * numberOfPeriods;
    
    var outputString = '';
    var classIteration = 0;
    var b = 0;
    var outputArray = [[]];
    
    for(i = 1; i < (numberOfIterations+1); i++)
        {
            outputString = outputString+(($("#canTeachClassCheckbox"+i+"").is(":checked")).toString());
            console.log((($("#canTeachClassCheckbox"+i+"").is(":checked")).toString()));
            
             if((i%numberOfPeriods) == 0)
                {
                    classIteration++;
                    if(classIteration == instructorSubjectsArray[b])
                        {
                            classIteration = 0;
                            b++;
                            outputString = outputString+'&';
                        }
                    else{
                    outputString = outputString+'/';
                    }
                }
            else{
                outputString = outputString+',';
            }
        }
    return outputString;
    
    //console.log(finalClassArray);
    
    //return myArray[0].length;
    var returnString = '';
    var i = 8;
    var j = 1;
    }
    
 function getSubClassSizeAvailability()
{
    
    var subMinSizeOfClass = getValuesOfTextBoxes("#subMinSizeOfClass");
        

    var subMaxSizeOfClass = getValuesOfTextBoxes("#subMaxSizeOfClass");
    
   var input = ($("#instructorSubclassButton").val());
   var prePreClassArray = input.split('&');
   var preClassArray = prePreClassArray[1].split('/');
   var numOfClasses = 0;
   // return input;
    var breakArray = [];
    var tempValue;
   for(i = 0; i < preClassArray.length-1; i++)
       {
            tempValue = preClassArray[i].split(',').length-1;
            numOfClasses = numOfClasses+tempValue;
            breakArray[i] = tempValue;
       }
    //return breakArray;
    //return numOfClasses;
    var string = '';
    var string2 = '';
    var output = [];
    var output2 = [];
    var count = 0;
    //return numOfClasses+1;
    var something = ($('#subMinClassesToTeach'+1+'').val());
    ////////alert(something);
    for(i = 1; i < numOfClasses+1; i++)
    {
        string = string + $('#subMinClassesToTeach'+i+'').val()+'/'+($('#subMaxClassesToTeach'+i+'').val());
        string2 = string2 + $('#subMinSizeOfClass'+i+'').val()+'/'+($('#subMaxSizeOfClass'+i+'').val());
        //return string;
        if(i == breakArray[count])
        {
            output[count] = string;
            output2[count] = string2;
            count++;
            string = '';
            string2 = '';
        }
        else if(i == numOfClasses)
            {
                output[count] = string;
                output2[count] = string2;
            }
        else{
            string = string+',';
            string2 = string2+',';
        }
        
    }
    //alert(output);
    var conVar = ['concatbreakpoint'];
    var outputFinal = output.concat(output2);
    //alert(outputFinal.toString());
    
    //alert(outputFinal);
    
    return outputFinal;
    //return sting;
}   

          
          
          
function saveNumberOfStudents()
{
            $.ajax({
            type: "POST",
            url: "actions.php?action=numOfStudents",
            data: "numOfStudents=" + $('#numberOfStudents').val(),
            success: function(result) {
                if(result != 1)
                    {
                        //////////alert(result);
                    }
                else
                {
                    //////////alert('saveNumOfStudents');
                }
                
            }
        }) 
}
          
function saveSchedulePassword()
  {
            $.ajax({
            type: "POST",
            url: "actions.php?action=saveSchedulePassword",
            data: "schedPassword=" + $('#schedPasswordText').val(),
            success: function(result) {
                //alert(result);
                
            }
        })
  }
          
function saveNumberOfPeriods()
{
                $.ajax({
            type: "POST",
            url: "actions.php?action=numberOfPeriods",
            data: "numberOfPeriods=" + $('#numberOfPeriodsText').val(),
            success: function(result) {
                if(result != 1)
                    {
                        //////alert(result);
                    }
                else
                {
                    //////////alert('success');
                }
                
            }
        })
    /*
            $.ajax({
            type: "POST",
            url: "actions.php?action=numOfStudents",
            data: "numOfStudents=" + $('#numberOfStudents').val(),
            success: function(result) {
                if(result != 1)
                    {
                        //////////alert(result);
                    }
                else
                {
                    //////////alert('saveNumOrPeriods');
                }
                
            }
        })
        
        */
}
          
          

          
          
function getClassInputData()
  {

      var i = 1;
      var k = 0;
      var j = 0;

      var classNameArray = [[]];
      var subClassArray = [[]];
    while($("#nameOfClass"+i+"").exists())
        {
            
          
            subClassArray[k] = ($("#nameOfClass"+i+"").val()); 
            
            k++;
            subClassArray[k] = ($("#minSizeOfClass"+i+"").val()); 
            k++;
            subClassArray[k] = ($("#maxSizeOfClass"+i+"").val()); 
            k++;
            subClassArray[k] = ($("#minNumberOfSection"+i+"").val()); 
            k++;
            subClassArray[k] = ($("#maxNumberOfSection"+i+"").val()); 
            k++;            
            console.log("checkarray " + subClassArray);
            //classNameArray.push(subClassArray);
          
            j++;
            i++;
          
        }
      
      return subClassArray;
      
  }
          
          
function getInstructorInputData()
  {

      var i = 1;
      var k = 0;
      var j = 0;

      var classNameArray = [[]];
      var subClassArray = [[]];
    while($("#teachName"+i+"").exists())
        {
            
          
            subClassArray[k] = ($("#teachName"+i+"").val()); 
            
            k++;
            subClassArray[k] = ($("#teachMinClasses"+i+"").val()); 
            k++;
            subClassArray[k] = ($("#teachMaxClasses"+i+"").val()); 
            k++;
            
            console.log("checkarray " + subClassArray);
            //classNameArray.push(subClassArray);
          
            j++;
            i++;
          
        }
      
      return subClassArray;
      
  }
          
          
function getNumberOfSections()
{
    var i = 1;
    $returnArray = [];
    while($("#numberOfSemesterClass"+i+"").exists())
        {
            $returnArray[(i-1)] = $("#numberOfSemesterClass"+i+"").val();
            i++;
        }
    return $returnArray;
}
          
function getNumberOfSectionsCheckBox()
{  
    var i = 1;
    $returnArray = [];
    while($("#numberOfSemesterClassCheckBox"+i+"").exists())
        {
            $returnArray[(i-1)] = (($("#numberOfSemesterClassCheckBox"+i+"").is(":checked")).toString());
            i++;
        }
    return $returnArray;
}
          
function saveClasses()
{
    var numberOfSectionsArray = getNumberOfSections();
    
    var numberOfSectionsArrayCheckBox = getNumberOfSectionsCheckBox();
    
        var minNumberOfSection = '';
    if(($("#minNumberOfSection").exists()))
        {
            minNumberOfSection = $("#minNumberOfSection").val();
        }
    var maxNumberOfSection = '';
    if($("#maxNumberOfSection").exists())
        {
            maxNumberOfSection = $("#maxNumberOfSection").val();
        }
        var minSizeOfClass = '';
    if(($("#minSizeOfClass").exists()))
        {
            minSizeOfClass = $("#minSizeOfClass").val();
        }
    var maxSizeOfClass = '';
    if($("#maxSizeOfClass").exists())
        {
            maxSizeOfClass = $("#maxSizeOfClass").val();
        }
            $.ajax({
                    type: "POST",
                    url: "actions.php?action=saveClass",
                    data: {classData:getClassInputData(), a:minNumberOfSection, b:maxNumberOfSection, c:minSizeOfClass, d:maxSizeOfClass, e:numberOfSectionsArray, f:numberOfSectionsArrayCheckBox },
                    success: function(result) {
                        alert(result);
                    }
                })
    
    /*
    var minNumberOfSection = '';
    if(($("#minNumberOfSection")..exists())
        {
            minNumberOfSection = $("#numberOfSectionsForm").val();
        }
    var maxNumberOfSection = '';
    if($("#maxNumberOfSection").exists())
        {
            maxNumberOfSection = $("#maxNumberOfSection").val();
        }
        var minSizeOfClass = '';
    if(($("#minSizeOfClass").exists())
        {
            minSizeOfClass = $("#minSizeOfClass").val();
        }
    var sizeOfClassForm = '';
    if($("#maxSizeOfClass").exists())
        {
            sizeOfClassForm = $("#maxSizeOfClass").val();
        }
    
/*
    1:Number Of Sections
    2:Number Of Students In Each Class
*/
          
    
 
}
function showClass()
{
    //numberOfSectionsForm
    
            if(($("#showClasses").html()) == "Show Subjects")
            {
                $.ajax({
                    type: "POST",
                    url: "actions.php?action=showClass",
                    data: "tweetContent=" + $("#tweetContent").val(),
                    success: function(result) {
                        $("#placeToAddClasses").html(result);
                    }
                })
                
                $("#showClasses").html("Hide Subjects");
                $("#placeToAddClasses").show();
                
                $(".classDataInput").show();
                
                //$("#showInstructor").html("Show Instructors");
                //$("#instructorDataArea").hide(); 
            }
    
           else if(($("#showClasses").html()) == "Hide Subjects")
            {
                $("#showClasses").html("Show Subjects");
                $("#placeToAddClasses").hide();
                $(".classDataInput").hide();
            }
    


        //numberOfStudForm numberOfSections
        $.ajax({
            type: "POST",
            url: "actions.php?action=getSettings",
            data: {classData:getClassInputData()},
            success: function(result) {
                
                $resultArray = result.split('/');
                $(".numberOfStudForm").hide();
                $(".numberOfSections").hide();
                
                //numberOfSectionsForm
                
                 if($resultArray[3] == 1)
                    {
                        $(".numberOfSectionsForm").show();  
                        $(".numberOfSections").hide();
                    }
                else
                {
                    $(".numberOfSectionsForm").hide();
                    if($resultArray[3] == 2)
                        {
                            $(".numberOfSections").show();
                        }
                    else
                    {
                        $(".numberOfSections").hide();
                    }
                }
                if($resultArray[0] == 1)
                    {
                        $(".sizeOfClassForm").show();
                        $(".numberOfStudForm").hide();
                    }
                else{
                    $(".sizeOfClassForm").hide();
                    
                    if($resultArray[0] == 2)
                        {
                            $(".numberOfStudForm").show();
                        }
                    else{
                        $(".numberOfStudForm").hide();
                    }
                }
                
                


            }
        })
        /*
                    $.ajax({
            type: "POST",
            url: "actions.php?action=getSettings",
            data: {classData:getClassInputData()},
            success: function(result) {
                var resultArray = result.split('/');
                if(resultArray[1] == 1)
                    {
                        $(".numberOfSectionsForm").show();
                        $(".numberOfSectionsForm2").hide();
                    }
                else
                {
                    $(".numberOfSectionsForm").hide();
                    $(".numberOfSectionsForm2").show();
                }
                if(resultArray[2] == 1)
                    {
                        $(".sizeOfClassForm").show();
                        $(".sizeOfClassForm2").hide();
                    }
                else{
                    $(".sizeOfClassForm").hide();
                    $(".sizeOfClassForm2").show();
                }
            }
        })
        */
}
          
function showInstructors()
{
            
            if($("#showClasses").html() != "Show Subjects")
                {
                saveClasses();
                //$("#showClasses").html("Show Subjects");
                //$("#placeToAddClasses").hide();
                //$(".classDataInput").hide();
                }
            
            $.ajax({
            type: "POST",
            url: "actions.php?action=showInstructors",
            data: "numOfStudents=" + $('#numberOfStudents').val(),
            success: function(result) {
                
            
                $("#placeToAddInstructors").html(result);
            }
        })
            $("#showInstructor").html("Hide Instructors");
            $("#instructorDataArea").show();
    
    
            

}
          
function getCheckBoxInput()
{
    var numOfPeriods = '<?php 
    
        $query = "SELECT numberOfPeriods FROM ".$table." WHERE id = '1'";
           
        $result = mysqli_query($link, $query);
          
         $row = mysqli_fetch_array($result);
    echo $row[0];
    ?>';
    //return numOfPeriods;
    var returnString = '';
    var i = 1;
    var j = 1;

    while($("#canTeachCheckbox"+i+"").exists())
    {
        returnString = returnString + (($("#canTeachCheckbox"+i+"").is(":checked")).toString());
        
        
        if(numOfPeriods == j)
            {
                if($("#canTeachCheckbox"+(i+1)+"").exists())
                    {
                returnString = returnString + '/';
                    }
                j = 0;
            }
        else
        {
                returnString = returnString + ',';
        }
        i++;
        j++;
    }
    
    return returnString;
}
          
function getValuesOfTextBoxes(id)
{
    var i = 0;
    var returnArray = [];
    
    while($(""+id+(i+1)+"").exists())
        {
            returnArray[i] = $(""+id+(i+1)+"").val();
            i++;
            //alert($(""+id+i+"").val());
        }
    return returnArray;
}
          
          
function getSuperCheckBoxInput()
{
    var i = 1;
    var returnString = '';
    while($("#superCheckBox"+i+"").exists())
    {
        returnString = returnString + (($("#superCheckBox"+i+"").is(":checked")).toString());
        
        if($("#superCheckBox"+(i+1)+"").exists())
            {
                returnString = returnString + ',';
            }
        i++;
    }
    return returnString;
}
          

          
         
function saveInstructors()
    {
        //alert($('#teachMinStudents1').val()); 
        var myArray;
        ////alert($("#instructorSubclassButton").val());
        var passingVar = '';
        
        //teachMinStudents
        var teachMinStrudents = '';
        if($('#teachMinStudents'))
            {
                teachMinStrudents = $('#teachMinStudents').val();
            }
        var teachMaxStrudents = '';
        if($('#teachMaxStudents'))
            {
                teachMaxStrudents = $('#teachMaxStudents').val();
            }
        
    var teachMinStudents = getValuesOfTextBoxes('#teachMinStudents');
        
        

    var teachMaxStudents = getValuesOfTextBoxes("#teachMaxStudents");

    var subMinSizeOfClass = getValuesOfTextBoxes("#subMinSizeOfClass");
        

    var subMaxSizeOfClass = getValuesOfTextBoxes("#subMaxSizeOfClass");
        
    var tempArray = getSubClassSizeAvailability();
    
    var idx = (tempArray.length)/2;
    
    var subSectionSize = tempArray.slice(0,idx);
    var subSizeOfClass = tempArray.slice(idx);
        
    //alert(subSectionSize.toString());
    //alert(subSizeOfClass.toString());

        if(($("#instructorSubclassButton").exists()))
            {
                      $.ajax({
            type: "POST",
            url: "actions.php?action=saveInstructure",
            data: {classData:getInstructorInputData(), checkBoxData:getCheckBoxInput(), numberOfPeriods:$('#numberOfPeriodsText').val(), instructorSubjectCheck: getCanTeachCheckBoxData(($("#instructorSubclassButton").val())), instructorClassOpenings:subSectionSize, instructorSubAvailability:subSectionSize, superCheckBoxData:getSuperCheckBoxInput(), a:teachMinStudents, b:teachMaxStudents, c:subSizeOfClass, d:teachMinStrudents, e:teachMaxStrudents},
            success: function(result) {
                alert(result);
            }
        })  
            }
        else{
                    $.ajax({
            type: "POST",
            url: "actions.php?action=saveInstructure",
            data: {classData:getInstructorInputData(), checkBoxData:getCheckBoxInput(), numberOfPeriods:$('#numberOfPeriodsText').val(), instructorSubjectCheck: passingVar, instructorClassOpenings:subSectionSize, instructorSubAvailability:subSectionSize, superCheckBoxData:getSuperCheckBoxInput()},
            success: function(result) {
                alert(result);
            }
        })
        }
        
    //console.log(getInstructorInputData());
        /*
        $.ajax({
            type: "POST",
            url: "actions.php?action=saveInstructure",
            data: {classData:getInstructorInputData(), checkBoxData:getCheckBoxInput(), numberOfPeriods:$('#numberOfPeriodsText').val(), instructorSubjectCheck: getCanTeachCheckBoxData(($("#instructorSubclassButton").val())), instructorClassOpenings:subSectionSize, instructorSubAvailability:subSectionSize},
            success: function(result) {
                //alert(result);
            }
        })
        */
            //console.log(myArray);
    }
          
function saveEverything()
  {
  saveNumberOfPeriods();   
  saveSchedulePassword();
  saveNumberOfStudents();
 
      
  if(($("#showInstructor").html()) != "Show Instructors")
      {
          //////////alert('savingInstructor');
          saveInstructors();
      }
      
  if(($("#showClasses").html()) == "Hide Subjects")
      {
          //////////alert('savingClasses');
          saveClasses();
      } 
      
  }
          

function getClassData1()
{
    var i = 1;
    var returnString = '';
    //return $("#classConnectionData"+i+"").val();
    while($("#classConnectionData"+i+"").exists())
    {
        returnString = returnString + $("#classConnectionData"+i+"").val();
        i++;
        if($("#classConnectionData"+i+"").exists())
            {
                returnString = returnString + ',';
            }
    }
    return returnString;
}
          
function getClassData2()
{
    var i = 1;
    var returnString = '';
    //return $("#classConnectionData"+i+"").val();
    while($("#classDataSizeOfClass"+i+"").exists())
    {
        returnString = returnString + $("#classDataSizeOfClass"+i+"").val();
        i++;
        if($("#classDataSizeOfClass"+i+"").exists())
            {
                returnString = returnString + ',';
            }
    }
    return returnString;
}
       
          
 function saveStudentData()
{
    $.ajax({
            type: "POST",
            url: "actions.php?action=saveStudentData",
            data: {studentData1:getClassData1(), studentData2:getClassData2()},
            success: function(result) {
                //$("#placeToAddClasses").html(result);
                //alert(result);
            }
        })
}


$("#addClass").click(function() {
    saveEverything();
        $.ajax({
            type: "POST",
            url: "actions.php?action=addClass",
            data: "tweetContent=" + $("#tweetContent").val(),
            success: function(result) {
                //////////alert(result);
            }
        })
        
        showClass();
        
        //$("#placeToAddClasses").html("<p>something</p>");
})
      








$("#showClasses").click(function() {

        //saveEverything();   
    
    showClass();


})













$("#saveClass").click(function() {

     saveEverything();
})

$("#deleteClass").click(function() {
            saveEverything();
                saveClasses();
    
        $.ajax({
            type: "POST",
            url: "actions.php?action=deleteClass",
            data: "deleteValue=" + $('#deleteClassValue').val(),
            success: function(result) {
                //$("#placeToAddClasses").html(result);
                //alert(result);
            }
        })
        
        
                $.ajax({
                    type: "POST",
                    url: "actions.php?action=showClass",
                    data: "tweetContent=" + $("#tweetContent").val(),
                    success: function(result) {
                        $("#placeToAddClasses").html(result);
                    }
                })
                
                $("#showClasses").html("Hide Classes");
                $("#placeToAddClasses").show();
                
                $(".classDataInput").show();
})

$("#numberOfPeriods").click(function() {

    $.ajax({
            type: "POST",
            url: "actions.php?action=numberOfPeriods",
            data: "numberOfPeriods=" + $('#numberOfPeriodsText').val(),
            success: function(result) {
                if(result != 1)
                    {
                        //alert(result);
                    }
                else
                {
                    //alert(result);
                }
                
            }
        })
    location.reload();
    
    
    if(($("#showInstructor").html()) != "Show Instructors")
      {
          showInstructors(); 
      }
           
})



$("#numberOfStudentsButton").click(function() {
    
            saveEverything();
})

$("#showInstructor").click(function() {
    
    
    if(($("#showInstructor").html()) == "Show Instructors")
        {
            
            showInstructors();            
            
        }
    else
    {
        $("#showInstructor").html("Show Instructors");
        $("#instructorDataArea").hide(); 
    }
})




$("#saveInstructors").click(function() {
    ////////alert('sdfsdffs');
    ////alert('hi');
    saveInstructors();      
})  





$("#deleteInstructor").click(function() {
    //saveEverything();
    $.ajax({
            type: "POST",
            url: "actions.php?action=deleteInstructor",
            data: {classData:getInstructorInputData(), deleteValue : $('#deleteInstructorValue').val()},
            //data : { deleteValue : $('#deleteInstructorValue').val()},
            success: function(result) {
                //$("#placeToAddClasses").html(result);
                alert(result);
            }
        })
    
                $.ajax({
            type: "POST",
            url: "actions.php?action=showInstructors",
            data: "numOfStudents=" + $('#numberOfStudents').val(),
            success: function(result) {
                
            
                $("#placeToAddInstructors").html(result);
            }
        })
        
})

$("#addInstructor").click(function() {
  //alert('hiyo');
    //
    
        $.ajax({
            type: "POST",
            url: "actions.php?action=addInstructor",
            success: function(result) {
                //alert(result);
            }
        })
            $.ajax({
            type: "POST",
            url: "actions.php?action=showInstructors",
            data: "numOfStudents=" + $('#numberOfStudents').val(),
            success: function(result) {
                
            
                $("#placeToAddInstructors").html(result);
            }
        })
            //saveEverything();
})

$("#info1").click(function()
{
    //////////alert("In order to create a schedule, you provide a password that your students can use to sign up.");
    
})




$("#schedulePassword").click(function() {
    
    saveSchedulePassword();

})


function addSubjectToTeacher(aValue)
{
    ////////////alert(aValue); 
    var selectedClass = ($("#instructorClassSelector"+aValue+" option:selected").text());
    $.ajax({
        type: "POST",
        url: "actions.php?action=addInstructorClass",
        data: {instructorNum: aValue, classToAdd: selectedClass},
        success: function(result) {            
            //alert(result);
        }
    })
    showInstructors();
}


function deleteInstructorSubject(x,y)
  {  
      //////alert(x);
      //////alert(y);
      saveEverything();
        $.ajax({
        type: "POST",
        url: "actions.php?action=deleteInstructorClass",
        data: {first: x, second: y},
        success: function(result) {        
            //alert(result);
        }
    
    })
        
  if($("#showInstructor").html() == "Hide Instructors")
    {
      showInstructors();  
    }
  }
                
          
$("#checkButton").click(function() {
    //alert(getClassData2());
    //saveEverything();
    //console.log(subSectionSize);
    
    ////alert(getSuperCheckBoxInput());
    ////alert(getCheckBoxInput());
    
    ////alert(getCanTeachCheckBoxData(($("#instructorSubclassButton").val())));
    ////alert(getClassData());
    
    
    $.ajax({
            type: "POST",
            url: "actions.php?action=verifyForm",
            data: {classData:getInstructorInputData(), deleteValue : $('#deleteInstructorValue').val()},
            success: function(result) {
                if(result == 'exit')
                    {
                        window.location.href="createSchedule/createSchedule.php";
                        //alert('exit');
                    }
                $("#output").html(result);
                //////alert(result);
            }
        })
        
})

$("#info1").click(function() {
  //////alert('In order for students to input information into this schedule, they must use this password');  
})

$("#showSutdentData").click(function() {
          if($("#showSutdentData").html() == "Show Student Data")
              {
                  $("#showSutdentData").html("Hide Student Data");
                  
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=showStudentData",
                        success: function(result) {            
                            $("#studentDataDump").html(result);
                        }
                    })
                  
                  $("#studentDataDump").show();
              }
        else
            {
                $("#showSutdentData").html("Show Student Data");
                $("#studentDataDump").hide();
            }
}) 


          
    </script>
      </body>
</html>
