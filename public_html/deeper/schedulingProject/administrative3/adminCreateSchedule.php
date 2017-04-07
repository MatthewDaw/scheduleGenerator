<?php //include("adminLogedInHeader.php");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
    session_start();

include("../connection.php");
$error = '';
 
echo $_SESSION['workingScheduleTable'];


$table = $_SESSION['workingScheduleTable'];

echo "<br>";

echo $_SESSION['workingScheduleName'];

$nameOfSchedule = $_SESSION['workingScheduleName'];

$savedClassData = array();


function getNumberOfRows()
{
    
    global $link;
    $table = $_SESSION['workingScheduleTable'];
    $lookingClassName2 = "nameOfClass";
    $newTableName =  $table.$lookingClassName2;
    
    //$query = "SELECT * FROM ".$newTableName."";
    
    $query = "SELECT COUNT(*) FROM ".$newTableName." ";
    

    
    
    
    if($result = mysqli_query($link, $query))
    {
        
        $result = mysqli_query($link, $query);
         $row = mysqli_fetch_array($result);

        return $row[0];
        
        
    }
    else
    {
        echo "getNumberOfRowsFailed";
    }  
    
}

function openData()
{
    global $link, $savedClassData;
    $table = $_SESSION['workingScheduleTable'];
    $lookingClassName2 = "nameOfClass";
    $newTableName =  $table.$lookingClassName2;
    

    
    $query = "SELECT * FROM ".$newTableName."";

    
    $i = 0;
    
    if($result = mysqli_query($link, $query))
    {
        while($row = mysqli_fetch_array($result))
        {
            $savedClassData[$i] = $row;
            $i++;
        }
    }
    
    
    echo "<br>";
    echo $query;
    echo "<br>";
    
    
    while($row = mysql_fetch_array($result))
    {
    
        echo $row["nameOfClass"];
        
    }
   
}

openData();
    


function insertIntoTable($i)
{
    
            global $link;
    
            $table = $_SESSION['workingScheduleTable'];
            $lookingClassName = "nameOfClass";
    
            $lookingClassNameForPost = "nameOfClass".($i+1);
    
            $lookingClassName2 = "nameOfClass";
            $newTableName =  $table.$lookingClassName2;
    
            $minSizeOfClassID = "minSizeOfClass".($i+1);
            $minSizeOfClassValue = $_POST[$minSizeOfClassID];
        
            $maxSizeOfClassID = "maxSizeOfClass".($i+1);
            $maxSizeOfClassValue = $_POST[$maxSizeOfClassID];
        
            $minNumberOfSectionsID = "minNumberOfSection".($i+1);
            $minNumberOfSectionsValue = $_POST[$minNumberOfSectionsID];
             
            $maxNumberOfSectionsID = "maxNumberOfSection".($i+1);
            $maxNumberOfSectionsValue = $_POST[$maxNumberOfSectionsID];
    

    
            $minSizeOfClassID = "minSizeOfClass";
            
        
            $maxSizeOfClassID = "maxSizeOfClass";
            
        
            $minNumberOfSectionsID = "minNumberOfSection";
           
             
            $maxNumberOfSectionsID = "maxNumberOfSection";
            

    
            $query = "INSERT INTO ".$newTableName." (".$lookingClassName.", ".$minSizeOfClassID.", ".$maxSizeOfClassID.", ".$minNumberOfSectionsID.", ".$maxNumberOfSectionsID.") VALUES ('".$_POST[$lookingClassNameForPost]."' , '".$minSizeOfClassValue."', '".$maxSizeOfClassValue."', '".$minNumberOfSectionsValue."', '".$maxNumberOfSectionsValue."') ";
            
            echo "<br>"."<br>".$query."<br>"."<br>";
            
            if(mysqli_query($link, $query))
            {
                echo "insertionDone";
            }
            else
            {
                echo "InsertionFailed";
            }  
}


function updateTable($i)
{
    
    
            global $link;
    
            $table = $_SESSION['workingScheduleTable'];
            $lookingClassName = "nameOfClass";
    
            $lookingClassName2 = "nameOfClass";
            $newTableName =  $table.$lookingClassName2;
    
            $lookingClassNameForPost = "nameOfClass".($i+1);
    
            $minSizeOfClassID = "minSizeOfClass".($i+1);
            $minSizeOfClassValue = $_POST[$minSizeOfClassID];
        
            $maxSizeOfClassID = "maxSizeOfClass".($i+1);
            $maxSizeOfClassValue = $_POST[$maxSizeOfClassID];
        
            $minNumberOfSectionsID = "minNumberOfSection".($i+1);
            $minNumberOfSectionsValue = $_POST[$minNumberOfSectionsID];
             
            $maxNumberOfSectionsID = "maxNumberOfSection".($i+1);
            $maxNumberOfSectionsValue = $_POST[$maxNumberOfSectionsID];
    

    
            $minSizeOfClassID = "minSizeOfClass";
            
        
            $maxSizeOfClassID = "maxSizeOfClass";
            
        
            $minNumberOfSectionsID = "minNumberOfSection";
           
             
            $maxNumberOfSectionsID = "maxNumberOfSection";
    
    
    
    
    
            $query = "UPDATE ".$newTableName." SET ".$lookingClassName." = '".$_POST[$lookingClassNameForPost]."',  ".$minSizeOfClassID." = '".$minSizeOfClassValue."',  ".$maxSizeOfClassID." = '".$maxSizeOfClassValue."',  ".$minNumberOfSectionsID." = '".$minNumberOfSectionsValue."',  ".$maxNumberOfSectionsID." = '".$maxNumberOfSectionsValue."' WHERE id = ".($i+1)."";
        
            if(mysqli_query($link, $query))
            {
                echo "updateDone";
            }
            else
            {
                echo "updateFailed";
            }
    
}


 if($_POST['save'] != '')
 {

     $_POST['schedClose'] = $_POST['save'];
     
     $numberOfClasses = (sizeof($_POST)-1) /5;

     
     $makerInsertion = false;
     
     for ($i = 0; $i < $numberOfClasses; $i++)
     {
     
        $lookingClassName = "nameOfClass".($i+1);
        // echo ;
         $minSizeClass = "minSizeOfClass".($i+1);
         
         $maxSizeOfClass = "maxSizeOfClass".($i+1);
         
         $lookingClassName2 = "nameOfClass";
     $newTableName =  $table.$lookingClassName2;
         
     
         $query = "SELECT * FROM ".$newTableName." WHERE id= ".($i+1)."";  
       
         
            $minSizeOfClassID = "minSizeOfClass".($i+1);
            $minSizeOfClassValue = $_POST[$minSizeOfClassID];
        
            $maxSizeOfClassID = "maxSizeOfClass".($i+1);
            $maxSizeOfClassValue = $_POST[$maxSizeOfClassID];
        
            $minNumberOfSectionsID = "minNumberOfSection".($i+1);
            $minNumberOfSectionsValue = $_POST[$minNumberOfSectionsID];
             
            $maxNumberOfSectionsID = "maxNumberOfSection".($i+1);
            $maxNumberOfSectionsValue = $_POST[$maxNumberOfSectionsID];


         
if($makerInsertion)
{

    echo "need to make Insertion";
    insertIntoTable($i);
    

}
         else
         {
         
    if(mysqli_query($link, $query))
    {     

        
        echo "<br>";
        
        echo "<br>";
        echo "somete";
    if($i < getNumberOfRows())
        {
        echo "need to update";
        updateTable($i);
        }
        else
        {
            echo "need to insert";
            insertIntoTable($i);
        }

    } //a10wef  $query = "ALTER TABLE `adminData` ADD sched".$i." text";
    else 
    {
        echo "need to make table";
        $makerInsertion = true;
        
        //$query = "CREATE TABLE ".$tableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP)";
        $query = "CREATE TABLE ".$newTableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP, "."nameOfClass"." text, "."minSizeOfClass"." text, "."maxSizeOfClass"." text, "."minNumberOfSection"." text, "."maxNumberOfSection"." text)";
        
        
        if(mysqli_query($link, $query))
        {
            insertIntoTable($i);
        }
        
        else
        {
            echo "table not made";
        }
        
    }
        
        /*
        $query = "ALTER TABLE ".$table." ADD ".$lookingClassName." text";
        
        
        if(mysqli_query($link, $query))
        {
            echo "class made";
            $query = "UPDATE ".$table." SET ".$lookingClassName." = "
        }
        else
        {
            echo "class not made";
        }
        */
    }

    }
 
     //unset($_POST['schedClose']);
 }


 if($_POST['save'] != '')
 {
     echo "save";
    echo "<br>".$_POST['save']."<br>"; 
     print_r($_POST);
 }
     
     
 if($_POST['delete'] != '')
 {
     echo "delete";
     echo "<br>".$_POST['delete']."<br>"; 
 }


?>


<div id="error"><?php //if($_SESSION['error'] != "")
//{
   // echo '<div class="alert alert-danger" role="alert">'.print_r($result).'</div>';
//}
    
?>

<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="logginHeader">
    <!--<a class="navbar-brand" href="%"><span id="pLogginHeader"></span>Administration Schedule Generator Page</a>-->

    <a class="navbar-brand" href="%"> 

<?php if($userName == "")
{
    echo "Administration Schedule Generator Page";
}
else
{
	echo $userName."'s Schedule Generator Page";
}



 ?>

</a>
    
    <div class="pull-xs-right">
    
        <a href='adminLogedInPage.php'><button class="btn btn-success-outline" type="submit">Return To Home</button></a>
        <a href='adminLoginPage.php? logout=1'><button class="btn btn-success-outline" type="submit">Logout</button></a>
    
    </div>
</nav>

<div id="error"><?php if($error != "")
{
    echo '<div class="alert alert-danger" role="alert">There were error(s) in your form:<br>'.$error.'</div>';
}
    ?>

</div>

<div id="scheduleGeneratorContent">


	<p id="tableHead" style="text-align:center; text-decoration:underline; font-size:20px;"><?php 
        
    if($nameOfSchedule != "")
{
    echo $nameOfSchedule;
}
    else
    {
        echo "Schedule Data Page";
    }
    ?></p>

<hr>

    <table id="scheduleDataEntryTable">
      <tr>  
<form method="post">

        
    <td>Name Of Schedule: </td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" name="nameOfSchedule">
    </fieldset>
    </td>    

        <td>Number Of Periods: </td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:90px;">
	    </fieldset>
	    </td> 	
<td>
    </form>
  <button type="submit" class="btn btn-primary" id="testSubmit">Submit</button></td>

          
    

    </tr>
<tr id="scheduleArray"></tr>
    </table>
<hr>
    
    
<table class="scheduleDataEntryTable" style="text-align:left;">

    
    <tr>   
        <td>Estimate Number Of Students: </td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td>  

        
    </tr>
    
    </table>
    <hr>
    
    <p class="th">Potential Class Offerings</p>
    
    <table class="scheduleDataEntryTable ct" style="text-align:left;" id="classListTable">
 
        
            
        
  
        <!--
        <td>Class Name</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods">
	    </fieldset>
	    </td>  
        
        <td>Min Size Of Class</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td>  
        
        <td>Max Size Of Class</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td> 
        
        <td>Min Number Of Sections</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td> 
        
        <td>Max Number Of Sections</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td> 
        -->
    
    </table>
    
    <input type="button" value="Add Class Refined" /> 
        
    <button id="saveClass" type="submit" value="Save" class="tempClass btn btn-primary addClassButton">Save</button>

    
   
    <p></p>
    <button type="submit" class="btn btn-primary addClassButton" id="addClass">Add Class</button>
    
    <hr>
    
    <p class="th">Teachers</p>
    
    <table class="scheduleDataEntryTable" style="text-align:left;">
    
    <tr>
        <td>Teacher Name</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td>  
        
        <td>Teacher Name</td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" style="width:120px;">
	    </fieldset>
	    </td>          
    </tr>
    
</table>

    




</div>



<?php include("adminCreateSchedFooter.php");?>
