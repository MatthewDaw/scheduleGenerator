<?php


        $link = mysqli_connect("localhost", "cl17-schedule", "FD!zGR^-6", "cl17-schedule");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }


$savedClassData = array();

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

          
function openClassData()
{
    
    global $scheduleArray;
          $classNumber = 1;

           $scheduleArray = $savedClassData;
           
    $i = 0;
          for($i = 0; $i < sizeof($scheduleArray); $i++)
          {
              
            
              
              echo'<table><td>Class Name</td><td><fieldset class="form_group" ><input value="'.$scheduleArray[i][2].'"  name="nameOfClass'.$classNumber.'" class="form-control scheduleInput" type="text" name="numberOfPeriods'.$classNumber.'  "></fieldset></td><td>Min Size Of Class</td><td><fieldset class="form_group" ><input value="'.$scheduleArray[$i][3].'" name="minSizeOfClass'.$classNumber.'" class="form-control scheduleInput" type="text" name="numberOfPeriods'.$classNumber.'" style="width:120px;"></fieldset></td> <td>Max Size Of Class</td><td><fieldset class="form_group" >	    <input value="'.$scheduleArray[$i][4].'" name="maxSizeOfClass'.$classNumber.'" class="form-control scheduleInput" type="text" name="numberOfPeriods'.$classNumber.'" style="width:120px;">	    </fieldset></td> </table> <table><tr> <td>Min Number Of Sections</td><td>  <fieldset class="form_group" ><input value="'.$scheduleArray[$i][5].'" name="minNumberOfSection'.$classNumber.'" class="form-control scheduleInput" type="text" name="numberOfPeriods'.$classNumber.'" style="width:120px;"></fieldset></td> <td>Max Number Of Sections</td><td>     <fieldset class="form_group" ><input value="'.$scheduleArray[$i][6].'" name="maxNumberOfSection'.$classNumber.'" class="form-control scheduleInput" type="text" name="numberOfPeriods'.$classNumber.'" style="width:120px;"></fieldset></td> <td></td> </tr></table><br><br>';
              
              $classNumber++; 
          }
        
}



    function displayTweetBox() {
        

            echo '<div id="tweetSuccess" class="alert alert-success">Your tweet was posted successfully.</div>
            <div id="tweetFail" class="alert alert-danger"></div>
            <div class="form">
  <div class="form-group">
    <textarea class="form-control" id="tweetContent"></textarea>
  </div>
  <button id="postTweetButton" class="btn btn-primary">Post Tweet</button>
</div>';
            
            
         
    }


?>