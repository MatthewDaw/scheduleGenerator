<?php

session_start();
//include("adminLogedInHeader.php");

//session_start();

include("../connection.php");

$i = 1;
$continue = true;
$scheduleArray = array();
$_SESSION['error'] = "";


$savedClassData = array();

$userData = array();

$query = "SELECT * FROM `adminData` WHERE id = ".$_SESSION['id']."";

if($result = mysqli_query($link, $query))
{
    $userData = mysqli_fetch_array($result);
}

function checkForRepeatedClass($userData, $nameToAdd)
{
    for($i = 7; $i < ((sizeof($userData))/2); $i++)
    {
        if($userData[$i] == $nameToAdd)
        {
            return false;
        }
    }
    return true;
}

function closeSched($schedNum)
{
    global $link, $userData;
    $i = $schedNum;
    
    $query = "SELECT schedPassword FROM adminData WHERE id=".$_SESSION['id']."";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $shedPassword = $row[0];
    //return $shedPassword;
    $inputArray = explode('/',$shedPassword);
    $returnString = '';
    $tempArray = array();
    $tempCounter = 0;
    
    for($k = 0; $k < sizeof($inputArray); $k++)
    {
        if( ($k+1) !=  $schedNum)
        {
            $tempArray[$tempCounter] = $inputArray[$k];
            $tempCounter++;
        }
    }
    for($k = 0; $k < sizeof($tempArray); $k++)
    {
        $returnString .= $tempArray[$k];
        if($k != ((sizeof($tempArray))-1))
        {
            $returnString .= '/';
        }
    }
    //return $returnString;
    $query = "UPDATE adminData SET schedPassword='".$returnString."' WHERE id='".$_SESSION['id']."'";
    mysqli_query($link, $query);
    
    while(($userData[$i+7] != '') && ($userData[$i+7] != null) && isset($userData[$i+7]))
    {
        $query = "UPDATE `adminData` SET sched".$i."='".$userData[$i+7]."' WHERE`id` = '".$_SESSION['id']."'";
        mysqli_query($link, $query);
        $i++;
    }    
    $query = "UPDATE `adminData` SET sched".$i." ='' WHERE`id` = '".$_SESSION['id']."'";         
    mysqli_query($link, $query);
    
    $temp = $schedNum + 6;
    
    $query = "DROP TABLE ".$userData[1]."".$userData[0]."".$userData[$temp]."";
    mysqli_query($link, $query);
    
    $query = "DROP TABLE ".$userData[1]."".$userData[0]."".$userData[$temp].""."nameOfClass"."";
    mysqli_query($link, $query);
}

function getSchedData()
{
    global $link, $userData;
    
    $returnValue = '';
   // return ((sizeof($userData))/2 -7);
    for ($i = 0; $i < ((sizeof($userData))/2 -7); $i++)
    {
        if($userData[$i+7] != '')
        {
            $t = $i+1;
            $returnValue .= "<table><tr><td>".$userData[$i+7]."".$t."</td></tr><tr><td><button id='openSchedButton".$t."' onclick='openSchedule(".$t.")' >Open</button></td></tr><tr><td><button id='closeSchedButton".$t."' onclick='deleteSchedule(".$t.")'>Close</button></td></tr></table>";
        }
    }   
    return $returnValue;
}

function addSchedToEnd($schedName, $whereToAdd)
{
    global $link;
    $query = "UPDATE `adminData` SET sched".($whereToAdd-6)." = '".$schedName."' WHERE id=".$_SESSION['id']." LIMIT 1";
    if (mysqli_query($link, $query))
    {
        return "complete";
    }
    else
    {
        return "";
    }
}


function insertNewSched($schedName, $whereToAdd)
{
    global $link;
			$query = "ALTER TABLE `adminData` ADD sched".($whereToAdd/2 -6)." text";
				if(mysqli_query($link, $query))
				{
                    //return "stepone";
                    //$i = $i +1;
				$query = "UPDATE `adminData` SET sched".($whereToAdd/2 -6)." = '".mysqli_real_escape_string($link, $schedName)."' WHERE `id` = '".mysqli_real_escape_string($link, $_SESSION['id'])."'";
				
                if(mysqli_query($link, $query))
				{
                 return "complete";   
                }
                    
				}
    return "failure";
}


if($_GET['action'] == 'makeSchedule')
{    
    $returnValue = '';
    //print_r($userData);
    if (checkForRepeatedClass($userData, $_POST['schedName']))
    {
    for ($i = 7; $i < (sizeof($userData))/2 -6; $i++)
    {
        if(($userData[$i] == '') ||  ($userData[$i] == null))
        {
        
            $returnValue = addSchedToEnd($_POST['schedName'], $i);
            $i = sizeof($userData);
        }

    }   
    if ($returnValue == '')
    {
        $returnValue = insertNewSched($_POST['schedName'], sizeof($userData));
        
    }
    
    $query = "CREATE TABLE ".$userData[1]."".$userData[0]."".$_POST['schedName']." (id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY, numberOfPeriods text, schedPassword text, numberOfStudents text, teacherName text, availablePeriods text, teachMinClasses text, teachMaxClasses text, numberOfStudentsInClass text, classSectionSize text, openArea text)";
    
    mysqli_query($link, $query);
    
    $query = "INSERT INTO ".$userData[1]."".$userData[0]."".$_POST['schedName']." (id, schedPassword, teachMinClasses, numberOfPeriods, openArea, numberOfStudents) VALUES (1, 'default', '2/2/1/1/1/1/2/1/2/1/2', 1, '1/2/1/2', 1000)";
        
    mysqli_query($link, $query);  

    
    $query = "INSERT INTO ".$userData[1]."".$userData[0]."".$_POST['schedName']." (id, teacherName, teachMinClasses, teachMaxClasses, numberOfStudents) VALUES (2, 'Instructor 1', 1, 2, 'true')";
    
    mysqli_query($link, $query);
    
    $query = "CREATE TABLE ".$userData[1]."".$userData[0]."".$_POST['schedName'].""."nameOfClass"." (id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nameOfClass text, studentsInOtherClasses text, minSizeOfClass text, maxSizeOfClass text, minNumberOfSection text, maxNumberOfSection text, studentsInClass text, numberOfSemesters text, numberOfSemestersCheck text)";
    
    mysqli_query($link, $query);
    
    $query = "INSERT INTO ".$userData[1]."".$userData[0]."".$_POST['schedName'].""."nameOfClass"." (id, nameOfClass, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSection, numberOfSemesters, numberOfSemestersCheck) VALUES (1, 'Subject 1', 1, 2, 1, 2, 1, 'false')";
    
    mysqli_query($link, $query);
        
    $query = "SELECT schedPassword FROM adminData WHERE id=".$_SESSION['id']."";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $schedPassword = $row[0];
        
    $returnString = '';
    if($row[0] == '')
    {
        $returnString = 'default';
    }
    else
    {
        $returnString = $schedPassword.'/default';
    }
    $query = "UPDATE adminData SET schedPassword='".$returnString."' WHERE id=".$_SESSION['id']."";
        //echo $returnString;
        //$query = "UPDATE adminData SET schedPassword=''";
    mysqli_query($link, $query);

    //echo $returnValue;
    }
    echo "Name is already in use";
}
    
if($_GET['action'] == 'displaySched')
{  
   // print_r($userData);
    echo getSchedData();
}
 

if($_GET['action'] == 'openSched')
{  
    echo $_POST['schedNum'];
    $_SESSION['workingUser'] = $userData[1];
    $_SESSION['workingScheduleName'] = $userData[(6+$_POST['schedNum'])];
    $_SESSION['workingScheduleTable'] = $userData[1].$_SESSION['id'].$userData[(6+$_POST['schedNum'])];
    $_SESSION['workingScheduleTableNumber'] = $_POST['schedNum'];
    print_r($userData);
    print_r($_SESSION);
    header("location: redo/index.php");
}
    
if($_GET['action'] == 'closeSched')
{ 
    //print_r($userData);
    print_r(closeSched($_POST['schedNum']));
}



?>