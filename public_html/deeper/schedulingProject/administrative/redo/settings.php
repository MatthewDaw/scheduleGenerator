<style>

#scheduleGeneratorContent
    {
        position:relative;
        border-style: solid;
        border-width:3px;
        border-color: black;
        height: 95%;
        width: 80%;
        margin: auto;
    }
#settingsHead
    {
        text-decoration: underline;
        font-weight: bold;
        text-align:center;
    }
.radioButton
    {
        align-content: center; 
        text-align: center;
        width: 10%;
        margin:auto;
    }
    
#saveSettings
    {
        display: block;
          margin-left: auto;
          margin-right: auto;
        width:150px;
        height:60px;
    }
    
#submitReport
    {
     position:relative;
    padding-top:60px;
    }
    
.alert
    {
        display: none;
    }

</style>


<?php
include("createSchedHead.php");

?>
<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="logginHeader">
    <!--<a class="navbar-brand" href="%"><span id="pLogginHeader"></span>Administration Schedule Generator Page</a>-->

    <a class="navbar-brand" href="%"> 

<?php /*if(//$_SESSION['workingUser'] == "")
{
    echo "Administration Schedule Generator Page";
}
else
{
	echo //$_SESSION['workingUser']."'s Schedule Generator Page";
}


*/
 ?>

</a>
    
    <div class="pull-xs-right">
    
        <a href='index.php'><button class="btn btn-success-outline" type="submit">Create Schedule</button></a>
        <a href='../adminLogedInPage.php'><button class="btn btn-success-outline" type="submit">Return To Home</button></a>
        <a href='../adminLoginPage.php? logout=1'><button class="btn btn-success-outline" type="submit">Logout</button></a>
    
    </div>
</nav>

<div id="submitReport">
<div class="alert alert-danger" role="alert" id='error'></div>
<div class="alert alert-success" role="alert" id='success'></div>
    
</div>
<div id="error"><?php /*if($error != "")
{
    echo '<div class="alert alert-danger" role="alert">There were error(s) in your form:<br>'.$error.'</div>';
}*/
    ?>

</div>

    
	<p id="tableHead" style="text-align:center; text-decoration:underline; font-size:20px;"><?php 
        /*
    if($nameOfSchedule != "")
{
    //echo $nameOfSchedule;
}
    else
    {
        echo "Schedule Data Page";
    }*/
    ?></p>
<hr>
<div id="scheduleGeneratorContent">
<h1 id='settingsHead' >Settings</h1>
    
<table>
    
    <tr>
    <th></th>
    <th>Same For All Subjects</th>
    <th>Different For Each Subject</th>
    <th>Determin by Instructor</th>
    <th>Determine by Instructor's Class</th>
    </tr>
<tr>
    <td>Number Of Students In Each Class</td>
    <form action=''>
        <td><input type='radio' name='numberOfStudents' value=1></td>
        <td><input type='radio' name='numberOfStudents' value=2></td>
        <td><input type='radio' name='numberOfStudents' value=3></td>
        <td><input type='radio' name='numberOfStudents' value=4></td>
    </form>
</tr>
    
    <tr>
        <th></th>
    <th>Same For All Instructors</th>
    <th>Different For Each Instructor</th>
    <th>Different For Each Instructor Class</th>
    </tr>
    <tr>
    <td>Instructor Availability To Teach</td>
<form action=''>
    <td><input type='radio' name='availability' class='radioButton' value=1></td>
    <td><input type='radio' name='availability' class='radioButton' value=2></td>
    <td><input type='radio' name='availability' class='radioButton' value=3></td>
</form>
    </tr>
 
    <tr>
    <th></th>
    <th>Same For All Instructors</th>
    <th>Determine By Instructor</th>
    <th>Determine By Instructor's Subjects</th>
    
    </tr>
    <tr>
    <td>Number Of Sections Instructor Can Teach</td>
<form action=''>
    <td><input type='radio' name='numOfSectionsInstructor' class='radioButton' value=1></td>
    <td><input type='radio' name='numOfSectionsInstructor' class='radioButton' value=2></td>
    <td><input type='radio' name='numOfSectionsInstructor' class='radioButton' value=3></td>
</form>
    </tr>
    
   <tr>
    <th></th>
    <th>Same For All Subjects</th>
    <th>Different For Each Subject</th>
    
    </tr>
    <tr>
    <td>Number Of Sections</td>
<form action=''>
    <td><input type='radio' name='numOfSections' class='radioButton' value=1></td>
    <td><input type='radio' name='numOfSections' class='radioButton' value=2></td>
</form>
    </tr>
    

    
    

  
    <tr>
    <th></th>
    <th>Manual Entry</th>
    <th>Student Entry</th>
    </tr>
    
<tr>  
    <td>Student Class Preferences</td>
    <form action=''>
        <td><input type='radio' name='studentClassPreferences' value=1></td>
        <td><input type='radio' name='studentClassPreferences' value=2></td>
    </form>
</tr>
    
</table>
    
    
<h1 id='settingsHead' >Defaults</h1>
    
<table>

    <tr>
    <td>Min Number Of Sections Per Subject</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="minNumberOfSections">
    </fieldset>
    </td>  
    <td>Max Number Of Sections Per Subject</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="maxNumberOfSections">
    </fieldset>
    </td> 
    </tr>
    
    <tr>
    <td>Min Size Of Classes</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="minSizeOfClasses">
    </fieldset>
    </td>  
    <td>Max Size Of Classes</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="maxSizeOfClasses">
    </fieldset>
    </td> 
    </tr>
    
    <tr>
    <td>Min Number Of Sections For Each Instructor</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="minNumberOfSectionsInstructor">
    </fieldset>
    </td>  
    <td>Max Number Of Sections For Each Instructor</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="maxNumberOfSectionsInstructor">
    </fieldset>
    </td> 
    </tr>
    
    <tr>
    <td>Min Number Of Students For Each Instructor Class</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="minNumberOfStudentsInstructor">
    </fieldset>
    </td>  
    <td>Max Number Of Students For Each Instructor Class</td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" id="maxNumberOfStudentsInstructor">
    </fieldset>
    </td> 
    </tr>
</table>
    
    <button id="saveSettings" type="submit" value="Save" class="tempClass btn btn-primary">Save</button>
    
</div>



<!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">

    
function getDefaults()
{
    $returnValue = '';
    
    $returnValue = $('input[name=numberOfStudents]:checked').val() + '/' + $('input[name=availability]:checked').val() + '/' + $('input[name=numOfSectionsInstructor]:checked').val() + '/' + $('input[name=numOfSections]:checked').val() + '/' + $('input[name=studentClassPreferences]:checked').val() + '/' + $('#minNumberOfSections').val() + '/' + $('#maxNumberOfSections').val() + '/' + $('#minSizeOfClasses').val() + '/' + $('#maxSizeOfClasses').val() + '/' + $('#minNumberOfSectionsInstructor').val() + '/' + $('#maxNumberOfSectionsInstructor').val() + '/' + $('#minNumberOfStudentsInstructor').val() + '/' + $('#maxNumberOfStudentsInstructor').val();
    
    //$returnValue = $('input[name=availability]:checked').val() + '/' + $('input[name=sizeOfClass]:checked').val() + '/' + $('input[name=numberOfSections]:checked').val() + '/' + $('#minNumberOfSections').val() + '/' + $('#maxNumberOfSections').val() + '/' + $('#minSizeOfClasses').val() + '/' + $('#maxSizeOfClasses').val() + '/' + $('#minNumberOfSectionsInstructor').val() + '/' + $('#maxNumberOfSectionsInstructor').val() + '/' + $('input[name=studentClassPreferences]:checked').val() + '/' + (($("#numberOfStudentsInstructor").is(":checked")).toString()) + '/' + (($("#numberOfStudentsInstructorClass").is(":checked")).toString());
    

    return $returnValue;
    
}
          
     var defaults = '';     
    $.ajax({
        
        type: "POST",
        url: "actions.php?action=getDefaults",
        data: {},
        success: function(result) { 
            defaults = result.split('/');
            $("input[name=numberOfStudents][value='"+defaults[0]+"']").prop("checked",true);
            $("input[name=availability][value='"+defaults[1]+"']").prop("checked",true);
            $("input[name=numOfSectionsInstructor][value='"+defaults[2]+"']").prop("checked",true);
            $("input[name=numOfSections][value='"+defaults[3]+"']").prop("checked",true);
            $("input[name=studentClassPreferences][value='"+defaults[4]+"']").prop("checked",true);
            
            $('#minNumberOfSections').val(defaults[5]);
            $('#maxNumberOfSections').val(defaults[6]);
            $('#minSizeOfClasses').val(defaults[7]);
            $('#maxSizeOfClasses').val(defaults[8]);
            $('#minNumberOfSectionsInstructor').val(defaults[9]);
            $('#maxNumberOfSectionsInstructor').val(defaults[10]);
            $('#minNumberOfStudentsInstructor').val(defaults[11]);
            $('#maxNumberOfStudentsInstructor').val(defaults[12]);
        }
    })
    //alert(defaults);
          
          
$("#saveSettings").click(function() {
    
    $.ajax({
        type: "POST",
        url: "actions.php?action=saveSettings",
        data: {settings: getDefaults()},
        success: function(result) { 
            if(result == 'saved')
                {
                    $("#success").show();
                    $('#error').hide();
                    $('#success').html(result);
                }
            else{
                $("#success").hide();
                $('#error').show();
            $('#error').html(result);
            }
        }
    })
})




</script>


