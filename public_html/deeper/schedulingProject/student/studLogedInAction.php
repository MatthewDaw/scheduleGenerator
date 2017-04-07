<?php
session_start();

include("../connection.php");
$schedArray = array();
$schedArray[1] = 'nothing';



    $initialTable = "<table><tr><th>Name Of Schedule</th><th>Schedule Creator</th><th>State</th><th>District</th><th>School</th><th>Password Required</th><th>Sign Up</th></tr>";

   $query = "SELECT * FROM adminData";
    if($result = mysqli_query($link, $query))
    {
    $a = 0;
    $instructorTable = array();
    while($row = mysqli_fetch_array($result))
    {
        $instructorTable[$a] = $row;     
        $a++;
    }
        $m = 0;
    
    //return $instructorTable[7];
        
    //Array ( [0] => 8 [id] => 8 [1] => a [username] => a [2] => 0589bff79ecd2846125a1638111f5bb0 [password] => 0589bff79ecd2846125a1638111f5bb0 [3] => a [state] => a [4] => a [district] => a [5] => a [school] => a [6] => bill/joelord/default [schedPassword] => bill/joelord/default [7] => abd [sched1] => abd [8] => ebe [sched2] => ebe [9] => egee [sched3] => egee [10] => [sched4] => [11] => [sched5] => [12] => [sched6] => [13] => [sched7] => [14] => [sched8] => [15] => [sched9] => [16] => [sched10] => [17] => [sched11] => )
    
    $classArray = array();
        
    $r = 0;
        
    for($i = 0; $i < sizeof($instructorTable); $i++)
    {
        if($instructorTable[$i]['sched1'] != '')
        {
            $m = 0;
            while(($instructorTable[$i][($m+7)]) != '')
            {
                $schedArray[$r] = $instructorTable[$i][1].'/'.$instructorTable[$i][($m+7)];
                $initialTable .= "<tr><td>".$instructorTable[$i][($m+7)]."</td><td>".$instructorTable[$i][1]."</td><td>".$instructorTable[$i][3]."</td><td>".$instructorTable[$i][4]."</td><td>".$instructorTable[$i][5]."</td><td>".(checkIfPasswordNeeded($m,$i))."</td><td align='center' class='addScheduleCell'><button id='addSchedule".$r."' type='submit' class='tempClass btn btn-primary addScheduleButton' onclick='addSchedule(".$r.")' >Add Schedule</button></td></tr>";
                $m++;
                $r++;
            }
        }
    }
        
    $initialTable .= "</table>";
    //return $returnString;
    }
    else
    {
        //return "fail";
    }



function checkIfPasswordNeeded($input1,$input2)
{
    global $instructorTable;
    
    
    $schedPasswordArray = explode('/',$instructorTable[$input2][6]);
    if($schedPasswordArray[$input1] != '')
    {
        return 'Yes';
    }
    else
    {
        return 'No';
    }
    return 'Error';
}



function addSchedule($input)
{
    global $schedArray;
    $inputArray = explode('/',$schedArray[$input]);
}


if($_GET['action'] == 'getTableData')
{
    print_r($initialTable);
        
}  

    
if($_GET['action'] == 'addSchedule')
{
    //echo $_POST['scheduleToAdd'];
    print_r(addSchedule($_POST['scheduleToAdd']));
        
}
    
?>