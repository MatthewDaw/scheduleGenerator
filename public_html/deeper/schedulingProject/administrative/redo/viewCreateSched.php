


<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="logginHeader">
    <!--<a class="navbar-brand" href="%"><span id="pLogginHeader"></span>Administration Schedule Generator Page</a>-->

    <a class="navbar-brand" href="%"> 

<?php if($_SESSION['workingUser'] == "")
{
    echo "Schedule";
}
else
{
	echo $_SESSION['workingScheduleName']."'s Schedule Generator Page";
}



 ?>

</a>
    
    <div class="pull-xs-right">
    
        <a href='settings.php'><button class="btn btn-success-outline" type="submit">Settings</button></a>
        <a href='../adminLogedInPage.php'><button class="btn btn-success-outline" type="submit">Return To Home</button></a>
        <a href='../adminLoginPage.php? logout=1'><button class="btn btn-success-outline" type="submit">Logout</button></a>
    
    </div>
</nav>

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

<div id="scheduleGeneratorContent">



    

    

<hr>

    <table id="scheduleDataEntryTable">
      <tr>  


        
    <td>Name Of Schedule: </td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" name="nameOfSchedule">
    </fieldset>
    </td>    

        <td>Number Of Periods: </td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" id="numberOfPeriodsText" style="width:90px;" >
	    </fieldset>
	    </td> 	
    <td>   <button type="submit" class="btn btn-primary" id="numberOfPeriods">Submit</button> </td>



          
    

    </tr>
<tr id="scheduleArray"></tr>
    </table>
<hr>
    
<table id ='schedPassword'>
    
    <td>Schedule Password (for students)</td>
    <td><button id="info1" class="infoImage"><img src="../info.png"></button></td>
    	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" id="schedPasswordText" style="width:150px;" >
	    </fieldset>
	    </td> 	
    <td>   <button type="submit" class="btn btn-primary" id="schedulePassword">Submit</button> </td>
    
</table>
    
<hr>    
    
    
<table class="scheduleDataEntryTable" style="text-align:left;">


    <tr>   
        


        <td>Estimate Number Of Students: </td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfStudents" id="numberOfStudents" style="width:150px;">
	    </fieldset>
	    </td> 	
    <td>   <button type="submit" class="btn btn-primary" id="numberOfStudentsButton">Submit</button> </td>

            
    </tr>   
    </table>
    <hr>
    
    
<table class="scheduleDataEntryTable" style="text-align:left;">
    <tr>  
        <td>Number Of Semesters</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfStudents" id="numberOfStudents" style="width:90px;">
	    </fieldset>
	    </td> 	
    <td>   <button type="submit" class="btn btn-primary" id="numberOfStudentsButton">Submit</button> </td>

            
    </tr>   
    </table>
    <hr>
    
    
    <p class="th">Subjects <button type="submit" class="btn btn-primary addClassButton" id="showClasses">Show Subjects</button> </p>
    
    <div id="placeToAddClasses"></div>

    <table>
                <tr>    
        
        <td> <button id="deleteClass" type="submit" value="Save" class="tempClass btn btn-primary addClassButton classDataInput">Delete Class</button></td>
                    <td><input class="form-control scheduleInput classDataInput" value="" type="text" id="deleteClassValue" style="width:130px;" placeholder="Class Number"></td>
        

<td>        
        </tr>
        
        <tr>
            
            <td><button type="submit" class="btn btn-primary addClassButton classDataInput" id="addClass">Add Class</button></td>

        <td> <button id="saveClass" type="submit" value="Save" class="tempClass btn btn-primary addClassButton classDataInput">Save</button></td>
        </tr>
        
    </table>

    <p></p>
    
     
    <hr>
    
    <p class="th">Instructors<button type="submit" class="btn btn-primary addInstructorButton" id="showInstructor">Show Instructors</button> </p>
    <div id="instructorDataArea">
    <div id="placeToAddInstructors">
    
    </div>

    <table>
                <tr>    
        
        <td> <button id="deleteInstructor" type="submit" value="Save" class="tempClass btn btn-primary addInstructorButton ">Delete Instructor</button></td>
                    <td><input class="form-control scheduleInput" value="" type="text" id="deleteInstructorValue" style="width:150px;" placeholder="Instructor Number"></td>
        

<td>        
        </tr>
        
        <tr>
            
            <td><button type="submit" class="btn btn-primary addClassButton instructorDataInput" id="addInstructor">Add Instructor</button></td>

        <td> <button id="saveInstructors" type="submit" value="Save" class="tempClass btn btn-primary addInstructorButton classInstructorInput">Save</button></td>
        </tr>
        
    </table>
    </div>
    
    <p></p>
    
    <?php/*
session_start();
print_r($_SESSION);
*/
?>
    
    <button id="checkButton">check button</button>
    
    <hr> 
    

<table>
<tr><td><button type="submit" class="btn btn-primary addClassButton instructorDataInput" id="showSutdentData">Show Student Data</button></td></tr>
  </table>  
    <div id="studentDataDump" style="display: none;">somedata</div>
    


</div>
<div id="output"></div>
