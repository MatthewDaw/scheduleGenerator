<?php

        $link = mysqli_connect("localhost", "cl17-schedule", "FD!zGR^-6", "cl17-schedule");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
$secretValue = "secret";

//$table = $_SESSION['workingScheduleTable'];

$table = "a10asd";

$classTableName = $table."nameOfClass";

?>
