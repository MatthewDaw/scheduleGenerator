
<?php

session_start();
$link = mysqli_connect("localhost", "cl17-schedule", "FD!zGR^-6", "cl17-schedule");


if (mysqli_connect_error()) {

    die ("Database Connection Error");

}


$table = $_SESSION['workingScheduleTable'];

$classTableName = $table."nameOfClass";

function getData()
{    
    global $link, $classTableName;
    $savedClassData = array();

    echo "<br>";
    $query = "SELECT * FROM ".$classTableName."";

    
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
    
    return $savedClassData;    
}




function addClass()
{
    global $numOfClassesToDisplay, $secretValue;
    
    for($i = 0; $i < $numOfClassesToDisplay; $i++)
    {
    echo $secretValue;
    }
}




?>