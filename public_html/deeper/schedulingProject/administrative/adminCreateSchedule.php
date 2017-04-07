<?php //include("adminLogedInHeader.php");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
    session_start();

include("../connection.php");
$error = '';
 
echo $_SESSION['workingScheduleTable'];


$table = $_SESSION['workingScheduleTable'];

$classTableName = $table."nameOfClass";

echo "<br>";

echo $_SESSION['workingScheduleName'];



    $table = $_SESSION['workingScheduleTable'];
    $lookingClassName2 = "nameOfClass";
    $newTableName =  $table.$lookingClassName2;
    $query = "SELECT * FROM ".$newTableName."";
    $numberOfScheduledClasses = 0;
    if($result = mysqli_query($link, $query))
    {
        while($row = mysqli_fetch_array($result))
        {
            $numberOfScheduledClasses++;            
        }
    }




$query = "SELECT numberOfPeriods FROM ".$table." ";

$numberOfClassPeriods;



     $scheduledClassArray = array();
     echo "<br>";echo "<br>";echo "<br>";
    echo  $numberOfScheduledClasses;
     echo "<br>";echo "<br>";echo "<br>";
     for($i = 0; $i < $numberOfScheduledClasses; $i++)
     {
     
     $lookingClassNameForPost = "nameOfClass".($i+1);
         
     //echo $_POST[$lookingClassNameForPost];
         echo " ";
        $scheduledClassArray[$i] = $_POST[$lookingClassNameForPost];
     
     }
     
     print_r($scheduledClassArray);
    echo sizeof($scheduledClassArray);
     echo "<br>";echo "<br>";echo "<br>";
     
     
     $sameClassError = false;

    $sameClassErrorNameArray = array();
     
    $s = 0;

     for($i = 0; $i < sizeof($scheduledClassArray); $i++)
     {
         
         
         for($j = $s; $j < sizeof($scheduledClassArray); $j++)
         {
             if(($i != $j) && ($scheduledClassArray[$i] == $scheduledClassArray[$j]))
             {
                 $sameClassError = true;
                 
                 $goodToInput = true;
                 
                 /*
                 for($k = 0; $k < sizeof($sameClassErrorNameArray); $i++)
                 {
                     if(($i+1) == $sameClassErrorNameArray[$k])
                     {
                         $goodToInput = false;
                     }
                 }
                 */
                 
                 if($goodToInput)
                 {
                     array_push($sameClassErrorNameArray, ($i+1), ($j+1));
                 }
                 
                 
             }
             $s++;
         }
     }




if($result = mysqli_query($link, $query))
{
    $result = mysqli_query($link, $query);
     $row = mysqli_fetch_array($result);

    echo "<br>numberOfClassPeriods: ";
    echo $row[0];
    echo "<br>";
    $numberOfClassPeriods = $row[0];
}



$query = "SELECT numberOfStudents FROM ".$table." ";

$numberOfStudents;

if($result = mysqli_query($link, $query))
{
    $result = mysqli_query($link, $query);
     $row = mysqli_fetch_array($result);

    echo "<br>numberOfClassPeriods: ";
    echo $row[0];
    echo "<br>";
    $numberOfStudents = $row[0];
}



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





/*
function openData()
{
    global $link, $savedClassData;
    $table = $_SESSION['workingScheduleTable'];
    $lookingClassName2 = "nameOfClass";
    $newTableName =  $table.$lookingClassName2;
    

    
    $query = "SELECT * FROM ".$newTableName."";

    
    $i = 0;
    $numberOfScheduledClasses = 0;
    if($result = mysqli_query($link, $query))
    {
        while($row = mysqli_fetch_array($result))
        {
            $savedClassData[$i] = $row;
            $i++;
            $numberOfScheduledClasses++;
        }
    }
    
    
    echo "<br>";
    echo $numberOfScheduledClasses;
    echo "<br>";
    
    
    while($row = mysql_fetch_array($result))
    {
    
        echo $row["nameOfClass"];
        
    }
   
}

openData();
*/

print_r($savedClassData);
    


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
            

    
            $query = "INSERT INTO ".$newTableName." (id, ".$lookingClassName.", ".$minSizeOfClassID.", ".$maxSizeOfClassID.", ".$minNumberOfSectionsID.", ".$maxNumberOfSectionsID.") VALUES ( '".($i+1)."','".$_POST[$lookingClassNameForPost]."' , '".$minSizeOfClassValue."', '".$maxSizeOfClassValue."', '".$minNumberOfSectionsValue."', '".$maxNumberOfSectionsValue."') ";
            
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
    
    
            echo "<br>";
            echo "classcrapname";
            echo $_POST[$lookingClassNameForPost];
            echo "<br>";
    
    
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

$classTableName = $table."nameOfClass";

 if($_POST['save'] != '')
 {
     

     
     if($sameClassError)
     {
         
         $error .= "The following classes had the same name: <br>";
         echo "same class error";
         echo print_r($sameClassErrorNameArray);
         
         for($i = 0; $i < sizeof($sameClassErrorNameArray); $i++)
         {
             $error .= $sameClassErrorNameArray[$i]." ";
         }
             
         $error .= "<br>";
     }
     
     

    else
    {
     
     

     $_POST['schedClose'] = $_POST['save'];
     
     $numberOfClasses = floor((sizeof($_POST)-1) /5);

     
     $makerInsertion = false;
     
        echo "number of classes is: ";
        echo $numberOfClasses;
        
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

         
    if(mysqli_query($link, $query))
    {     

        
        echo "<br>";
        echo "number of rows ";
        echo getNumberOfRows();
        echo "<br>";
        echo "somete";
    if($i < getNumberOfRows())
        {
            echo "<br>";
        echo $_POST["nameOfClass3"];
            echo "<br>";
        echo "need to update";
        updateTable($i);
        }
        else
        {
            echo "<br><br>";
            echo "problem area";
            echo $lookingClassNameForPost = "nameOfClass".($i+1);
            echo "need to insert";
            insertIntoTable($i);
        }

    } //a10wef  $query = "ALTER TABLE `adminData` ADD sched".$i." text";
    else 
    {
        echo "need to make table";
        $makerInsertion = true;
        
        
        
        //$query = "CREATE TABLE ".$tableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP)";
        $query = "CREATE TABLE ".$newTableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP, "."nameOfClass"." text, "."minSizeOfClass"." text, "."maxSizeOfClass"." text, "."minNumberOfSection"." text, "."maxNumberOfSection"." text, "."schedPassword"." text)";
        
        
        if(mysqli_query($link, $query))
        {
            insertIntoTable($i);
        }
        
        else
        {
            echo "table not made";
        }
        
    }
        

    }
     }

    
 
     //unset($_POST['schedClose']);
     
    }
 


echo "sdfds";

echo $numberOfScheduledClasses;


if($_POST['deleteClassValue'])
{
    //$_POST['deleteClassValue']
    if(!is_numeric($_POST['deleteClassValue']))
       {
        $error .= "Delete value must be a number";
       }
       else
       {
           echo "deletionBegins";
           $query = "SELECT nameOfClass FROM ".$classTableName." WHERE id = '".$_POST['deleteClassValue']."'";
           
        $result = mysqli_query($link, $query);
         $row = mysqli_fetch_array($result);
           echo $row[0];
           
           
           $query = "DELETE FROM ".$classTableName." WHERE id = '".$_POST['deleteClassValue']."' LIMIT 1";
           
           echo "<br>";
           echo $query;
           echo "<br>";
           if (mysqli_query($link, $query))
           {
               

               echo "successful Delete";               
               

           
           $startQuerryNumber = $_POST['deleteClassValue'];
           
           for($i = 0; $i < ($numberOfScheduledClasses-$_POST['deleteClassValue']); $i++)
           {
           
         $query = "UPDATE ".$classTableName." SET id = ".($_POST['deleteClassValue'])." WHERE id = '".($_POST['deleteClassValue']+1)."'";
               
           mysqli_query($link, $query);
           
               echo "shift successful";
               $startQuerryNumber++;
               
               //$query = "UPDATE ".$classTableName." SET id = ".($startQuerryNumber)." WHERE id = '".($startQuerryNumber+1)."'";         
               //$query = "UPDATE";
               

               
           }
               
           }
           else
           {
               echo "deletion failed";
           }
           
     
    }      
}



if($_POST['numberOfPeriods'])
{
        if(!is_numeric($_POST['numberOfPeriods']))
       {
        $error .= "Number of periods must be a number";
        }
       else
       {
        echo "numberofperiods".$_POST['numberOfPeriods'];
           
           $query = "UPDATE ".$table." SET numberOfPeriods = '".$_POST['numberOfPeriods']."' LIMIT 1";
        if(mysqli_query($link, $query))
        {
            echo "succews";
            header("Refresh:0");
        }
           else
           {
               echo "failure";
           }
           
        }
       
}



if($_POST['numberOfStudents'])
{
        if(!is_numeric($_POST['numberOfStudents']))
       {
        $error .= "Number of students must be a number";
        }
       else
       {
        echo "numberofperiods".$_POST['numberOfStudents'];
           
           $query = "UPDATE ".$table." SET numberOfStudents = '".$_POST['numberOfStudents']."' LIMIT 1";
        if(mysqli_query($link, $query))
        {
            echo "succews";
            header("Refresh:0");
        }
           else
           {
               echo "failure";
           }
           
        }
       
}




?>


<head>

</head>


<script>

    var nogo = false;
    
    function checkRefresh()
{
    if( document.refreshForm.visited.value == "" )
    {           
        // This is a fresh page load
            alert ( 'Fresh Load' );
        document.refreshForm.visited.value = "1";
            
    }
    else
    {
        // This is a page refresh
        alert ( 'Page has been Refreshed, The AJAX call was not made');

    }
}

</script>

<body onLoad="checkRefresh()">

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
	    <input class="form-control scheduleInput" type="text" name="numberOfPeriods" id="numberOfPeriods" style="width:90px;">
	    </fieldset>
	    </td> 	
    <td>   <button type="submit" class="btn btn-primary" id="testSubmit">Submit</button> </td>
    </form>


          
    

    </tr>
<tr id="scheduleArray"></tr>
    </table>
<hr>
    
    
<table class="scheduleDataEntryTable" style="text-align:left;">

    <form method='post'>
    <tr>   
        
<form method="post">

        <td>Estimate Number Of Students: </td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" type="text" name="numberOfStudents" id="numberOfStudents" style="width:90px;">
	    </fieldset>
	    </td> 	
    <td>   <button type="submit" class="btn btn-primary" id="testSubmit">Submit</button> </td>
    </form>
            
	     

        
    </tr>
    
        </form>
        
    </table>
    <hr>
    
    <p class="th">Potential Class Offerings</p>
    
<form method="post">

    <table class="scheduleDataEntryTable ct" style="text-align:left;" id="classListTable">
 
        
    
    </table>
    
    <input type="hidden" name="save" value="go" />
        
    <button id="saveClass" type="submit" value="Save" class="tempClass btn btn-primary addClassButton">Save</button>

    </form>
   
    <p></p>

    <form method="post">

        <table>
        
 

        <td>Delete Class </td>
	    <td>     
	    <fieldset class="form_group" >
	    <input class="form-control scheduleInput" value="" type="text" name="deleteClassValue" style="width:90px;">
	    </fieldset>
	    </td> 
            
        <td><input type="submit"></td>
<td>
        
        </table>

    </form>

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
