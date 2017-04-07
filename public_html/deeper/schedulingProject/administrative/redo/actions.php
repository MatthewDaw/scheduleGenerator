<?php  


/*
Settings key:

Radio Buttons
0:availability
1:Number Of Sections
2:Number Of Students In Each Class
9: studentClassPreferences

Defualts
3:minNumberOfSections
4:maxNumberOfSections
5:minSizeOfClasses
6:maxSizeOfClasses
7:minNumberOfSectionsInstructor
8:maxNumberOfSectionsInstructor

checkBoxes
10: numberOfStudentsInstructor
11: numberOfStudentsInstructorClass
*/


$link = mysqli_connect("localhost", "cl17-schedule", "FD!zGR^-6", "cl17-schedule");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
session_start();
$userName;

$nameOfSchedule = $_SESSION['workingScheduleName'];

$table = $_SESSION['workingScheduleTable'];

$classTableName = $table."nameOfClass";

$query = "SELECT numberOfPeriods FROM ".$table." ";

$result = mysqli_query($link, $query);
    
$row = mysqli_fetch_array($result);
$numberOfPeriods = $row[0];  
    
$query = "SELECT schedPassword FROM ".$table." ";

$result = mysqli_query($link, $query);
    
$row = mysqli_fetch_array($result);
$schedPassword = $row[0];

$teacherClassArray = 1;


$query = "SELECT numberOfStudents FROM ".$table." ";

$result = mysqli_query($link, $query);
    
$row = mysqli_fetch_array($result);
$numberOfStudents = $row[0];


$query = "SELECT availablePeriods FROM ".$table." ";

$result2 = mysqli_query($link, $query);
    
$row = mysqli_fetch_array($result2);
$availablePeriods = $row[0];
  

function saveSchedPassword($data)
{
    //return $_SESSION;
    global $table, $link;
    //return 'sfdsfds';
    
    $query = "SELECT * FROM adminData WHERE id=".$_SESSION['id']."";
    $result = mysqli_query($link, $query);
    $userData = mysqli_fetch_array($result);
    
    $query = "UPDATE ".$table." set schedPassword='".$data."' WHERE id = 1";
    mysqli_query($link, $query);
    
    //return $userData;
    
    $query = "SELECT schedPassword FROM adminData WHERE id = ".$_SESSION['id']."";
    $result =mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $schedPassword = $row[0];
    
    $schedPaswordArray = explode('/', $schedPassword);
    
    $schedPaswordArray[(($_SESSION['workingScheduleTableNumber'])-1)] =$data;
    
    $returnString = '';
    for($i = 0; $i < sizeof($schedPaswordArray); $i++)
    {
        $returnString .= $schedPaswordArray[$i];
        if($i != ((sizeof($schedPaswordArray))-1))
        {
            $returnString .= '/';
        }
    }
    
    $query = "UPDATE adminData SET schedPassword='".$returnString."' WHERE id=".$_SESSION['id']."";
    mysqli_query($link, $query);
    
    return $schedPaswordArray;
    
    $insertPassword = '';
}


function deleteInstructorClass($first, $second)
{
   global $table, $link;
    
    //return "first ".$first." Second ".$second;
    
    
    
    $query = "SELECT * FROM ".$table." WHERE id = '".($first+1)."'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $furtherClass = $row[0];
    $i = $second;
    
    //return print_r($row);
    
    while(($row[$i+11] != '') && ($row[$i+11] != null) && isset($row[$i+11]))
    {
        $query = "UPDATE `".$table."` SET instructorClass".$i."='".$row[$i+11]."' WHERE`id` = '".($first+1)."'";
        mysqli_query($link, $query);
        $i++;
    }
    
    $query = "UPDATE `".$table."` SET instructorClass".$i." ='' WHERE`id` = '".($first+1)."'";         
    mysqli_query($link, $query);
    $availableClassArray = explode('/',$row[5]);
    $returnString = '';
    
    $hiddenVariable = 0;
    $returnArray = array();
    $m = 0;
    for($k = 0; $k < sizeof($availableClassArray); $k++)
    {
        if($k != ($second-1))
        {
            $returnArray[$m] .= $availableClassArray[$k];
            $m++;
        }
    }
    $returnString = '';
    for($k = 0; $k < sizeof($returnArray); $k++)
    {
        $returnString .= $returnArray[$k];
        if($k != (sizeof($returnArray))-1)
        {
            $returnString .= '/';
        }
            
    }
    $query = "UPDATE ".$table." SET availablePeriods = '".$returnString."' WHERE id = '".($first+1)."' LIMIT 1";
    mysqli_query($link, $query);
    return $availableClassArray;
    
}



function addClassToInstructor($instructorNum, $instructorClass)
{
    $instructorNum = $instructorNum+1;
    global $table, $link;
    
    $continue = true;
    
    $i = 1;
	while($continue) 
	{
		$query = "SELECT `instructorClass".$i."` FROM `".$table."` WHERE `id` = '".$instructorNum."'";
		if($result = mysqli_query($link, $query))
		{
			$row = mysqli_fetch_array($result);
            if($row[0] == $instructorClass)
            {
                return "Instructor already has that class";
            }
            
			if($row[0] == '')
			{ 
                //return $availablePeriods;
				$query = "UPDATE `".$table."` SET instructorClass".$i." = '".mysqli_real_escape_string($link, $instructorClass)."' WHERE `id` = '".mysqli_real_escape_string($link, $instructorNum)."'";
				$continue = false;
                mysqli_query($link, $query); 
                //return "success1";
			}
			else
			{
				//echo "notemtpy";
                $i = $i+1;
			}
		}
		else
		{
			
			$query = "ALTER TABLE `".$table."` ADD instructorClass".$i." text";
            
				if(mysqli_query($link, $query))
				{
                    
				$query = "UPDATE `".$table."` SET instructorClass".$i." = '".mysqli_real_escape_string($link, $instructorClass)."' WHERE `id` = '".mysqli_real_escape_string($link, $instructorNum)."'";
                    $continue = false;
				
                if(mysqli_query($link, $query))
				{
                $continue = false;
                //return "success2";
                    
                }
                    else
                    {
                        $continue = false;
                        //return "success3";
                    }

                    
				}
				else
				{
					//return "fail3";
				}
                
		}
	}
    
    //return $instructorNum;
    //return"hih";
    $query = $query = "SELECT availablePeriods, numberOfStudents, classSectionSize, numberOfStudentsInClass FROM ".$table." WHERE id='".$instructorNum."' LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $availablePeriods = $row[0];
    //return $row;
    $numberOfClasses = $row[2];
    $sizeOfClasses = $row[3];
    //return $row;
    
    //$availabilityArray
    
    //return $availablePeriods.'/';
    
    $query = $query = "SELECT numberOfPeriods, teachMinClasses FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row2 = mysqli_fetch_array($result);
    $numberOfPeriods = $row2[0];
    $settings = explode('/', $row2[1]);
    
/*
$("input[name=numberOfStudents][value='"+defaults[0]+"']").prop("checked",true);
            $("input[name=availability][value='"+defaults[1]+"']").prop("checked",true);
            $("input[name=numOfSectionsInstructor][value='"+defaults[2]+"']").prop("checked",true);
            $("input[name=numOfSections][value='"+defaults[3]+"']").prop("checked",true);
            $("input[name=studentClassPreferences][value='"+defaults[4]+"']").prop("checked",true);
            
            $('#minNumberOfSections').val(defaults[3]);
            $('#maxNumberOfSections').val(defaults[4]);
            $('#minSizeOfClasses').val(defaults[5]);
            $('#maxSizeOfClasses').val(defaults[6]);
            $('#minNumberOfSectionsInstructor').val(defaults[7]);
            $('#maxNumberOfSectionsInstructor').val(defaults[8]);
            $('#minNumberOfStudentsInstructor').val(defaults[9]);
            $('#maxNumberOfStudentsInstructor').val(defaults[10]);
*/
    
    //return $settings;
    //return $numberOfPeriods;
    $returnString3 = '';
    $returnString4 = '';
    //return $numberOfClasses;
    if($numberOfClasses != '')
    {
    $returnString3 = $numberOfClasses.','.$settings[7].'/'.$settings[8];
    $returnString4 = $sizeOfClasses.','.$settings[9].'/'.$settings[10];
    }
    else
    {
        $returnString3 = $settings[7].'/'.$settings[8];
        $returnString4 = $settings[5].'/'.$settings[6];
    }
    //return $returnString3;
    
    
    $query = "UPDATE ".$table." SET classSectionSize = '".$returnString3."', numberOfStudentsInClass='".$returnString4."' WHERE id = '".$instructorNum."' LIMIT 1";
    mysqli_query($link, $query);
    //return $returnString3;
    
    $returnString = '';
    //return $row;
    
    if(($row[0] != '') && ($row[0] != null))
    {
        $returnString .= $row[0].'/'.$row[1];
    }
    else
    {
        $returnString .= $row[1];
    }
    $query = "UPDATE ".$table." SET availablePeriods = '".$returnString."'  WHERE id = '".$instructorNum."' LIMIT 1";
    mysqli_query($link, $query);
    return $returnString;
    
    
    if(($numberOfPeriods == '') || ($numberOfPeriods == null))
    {
            for($i = 0; $i < $numberOfPeriods; $i++)
            {
                $returnString .= 'true';
                if($i != $numberOfPeriods-1)
                {
                    $returnString .= ',';
                }
            }
        $query = "UPDATE ".$table." SET availablePeriods = '".$returnString."' WHERE id = '".$instructorNum."' LIMIT 1";
    }
    else
    {
    
        //return $availablePeriods;
    if(!(($availablePeriods == '') || ($availablePeriods == null)))
    {
        $returnString = $availablePeriods.'/';
    }
        else
        {
            $returnString = $availablePeriods;
        }
    
    for($i = 0; $i < $numberOfPeriods; $i++)
    {
        $returnString .= 'true';
        if($i != $numberOfPeriods-1)
        {
            $returnString .= ',';
        }
    }
    //return $returnString;
    $query = "UPDATE ".$table." SET availablePeriods = '".$returnString."' WHERE id = '".$instructorNum."' LIMIT 1";
    //return $query;
    if(mysqli_query($link, $query))
    {
        //return $returnString;
    }
        //return $settings;
    //$returnString2 = ','.  $numberOfClasses
    //$returnString2 = ','.$settings[7].'/'.$settings[8];
    
        
    else
    {
        return "fail";
    }
    }
    
}


function updateNumberOfPeriods($i)
{
    global $table, $link;
    
    $query = "SELECT numberOfPeriods, classSectionSize, availablePeriods FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $numberOfPeriods = $row[0];


    
$availablePeriodsArray = explode('/',$row[2]);
    
//return $availablePeriodsArray[0];
    
$tempVar = explode(',',$availablePeriodsArray[0]);
  
//return "hi";
//return $tempVar[0];

$returnPeriodString;
    //return $numberOfPeriods;
if ($i != $numberOfPeriods)
{ 
        if($row[1] != '')
        {
            $saveString = '';
            if($i > $numberOfPeriods)
            {
                $saveString .= $row[1];
                for($k = 0; $k < ($i-$numberOfPeriods); $k++)
                {
                    $saveString .= ',true';
                }
            }
            else
            {
                $tempVar = explode(',',$row[1]);
                for($k = 0; $k < $i; $k++)
                {
                    $saveString .= $tempVar[$k];
                    if($k != ($i-1))
                    {
                        $saveString .= ',';
                    }
                }
            }
            $query = "UPDATE ".$table." SET classSectionSize='".$saveString."' WHERE id=1";
            mysqli_query($link, $query);
        }
   
    $query = "SELECT * FROM ".$table." ";
    $result2 = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result2);
    
    //mysqli_query($link, $query);
    $m = 2;
    while($row = mysqli_fetch_array($result2))
    {
        if(($row[0] != '') || ($row[0] != null))
        {
        $query = "SELECT numberOfStudents FROM ".$table." WHERE id=".$m."";
        $result = mysqli_query($link, $query);
        $row2 = mysqli_fetch_array($result);
        $superArray = explode(',',$row2[0]);
            //return $row2;
        $subReturnString2 = '';
        //return $superArray;
           //return $numberOfPeriods; 
            if($i > $numberOfPeriods)
            {
                $subReturnString2 .= $row2[0];
                for($k = 0; $k < ($i-$numberOfPeriods);$k++)
                {
                    $subReturnString2 .= ",true";
                }
                //return $subReturnString2;
            }
            else
            {
            $superArray = explode(',', $row2[0]);
               for($k = 0; $k < $i; $k++)
                {
                    $subReturnString2 .= $superArray[$k];
                    if(!($k == ($i-1)))
                    {
                        $subReturnString2 .= ',';
                    }
                } 
            }
            //return $subReturnString2;
            $query = "UPDATE ".$table." SET numberOfStudents = '".$subReturnString2."' WHERE id=".$m." LIMIT 1 ";
            mysqli_query($link, $query);
            
        if( ($row[5] != '') && ($row[5] != null) )      
        {
        $splitClasses = explode('/', $row[5]);
        $subReturnString = '';
        
        for($j = 0; $j < sizeof($splitClasses); $j++)
        {                         
            if($i > $numberOfPeriods)
            {
                $subReturnString .= $splitClasses[$j];
                for($k = 0; $k < ($i-$numberOfPeriods);$k++)
                {
                    $subReturnString .= ",true";
                }
            }
            else
            {
            $subSubClasses = explode(',',$splitClasses[$j]);
               for($k = 0; $k < $i; $k++)
                {
                    $subReturnString .= $subSubClasses[$k];
                    if(!($k == ($i-1)))
                    {
                        $subReturnString .= ',';
                    }
                } 
            }
            
            if($j != (sizeof($splitClasses)-1))
            {
                $subReturnString .= '/';
            }
            
        }
            //return $subReturnString;
        //return $subReturnString;
        $query = "UPDATE ".$table." SET availablePeriods = '".$subReturnString."' WHERE id=".$m." LIMIT 1 ";
        mysqli_query($link, $query);
        }
        }
        $m++;
}
    //return $m;

       $query = "UPDATE ".$table." SET numberOfPeriods = '".$i."' WHERE id = '1' LIMIT 1";
    if(mysqli_query($link, $query))
    {
        return 1;
    }
}
       else
       {
           return "failure";
        }

}


function updateNumberOfStudents($i)
{
    global $table, $link;
    
       $query = "UPDATE ".$table." SET numberOfStudents = '".$i."' LIMIT 1";
    if(mysqli_query($link, $query))
    {
        return 1;
    }
       else
       {
           return "failure";
        }
}


function getClassDataFromTable()
{
    
        global $link, $classTableName;
    $savedClassData = array();

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

function addInstructor()
{
    global $link, $table;
    
    
    $query = "SELECT teachMinClasses FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row2 = mysqli_fetch_array($result);
    $settingsArray = explode('/',$row2[0]);
    
    $query = "SELECT COUNT(id) FROM ".$table."";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    //return $row[0];
    
    $query = "INSERT INTO ".$table." (id, teachMinClasses, teachMaxClasses) VALUES ('".($row[0]+1)."', '".$settingsArray[7]."', '".$settingsArray[8]."') ";
    if (mysqli_query($link, $query))
    {
        //return "good";
    }
    else
    {
       //return "bad"; 
    }
    $query = "SELECT numberOfPeriods FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row2 = mysqli_fetch_array($result);
    
    $returnString = '';
    for($i=0; $i < ($row2[0]-1); $i++)
    {
        $returnString .="true,";
    }
    $returnString .="true";
    //return $returnString;
    $query = "UPDATE ".$table." SET numberOfStudents='".$returnString."' WHERE id='".($row[0]+1)."'";
    mysqli_query($link, $query);
}

if($_GET['action'] == 'addClass')
{

    $query = "SELECT teachMinClasses FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row2 = mysqli_fetch_array($result);
    $settingsArray = explode('/',$row2[0]);
    
    $query = "SELECT COUNT(id) FROM ".$classTableName."";
    echo $query;
    //echo $classTableName;
    
    if($result = mysqli_query($link, $query))
{
    $result = mysqli_query($link, $query);
     $row = mysqli_fetch_array($result);
    //echo $row[0];
    
   $query = "INSERT INTO ".$classTableName." (id, minSizeOfClass, maxSizeOfClass, minNumberOfSection, maxNumberOfSection) VALUES ( '".($row[0]+1)."', '".$settingsArray[5]."', '".$settingsArray[6]."', '".$settingsArray[3]."', '".$settingsArray[4]."') ";
    if (mysqli_query($link, $query))
    {
        echo "check";
        //print_r(getData());
        
    }
    else
    {
        echo '2';
    }
    
}
    else
    {
        echo '2';
    }
    
}
//a:minNumberOfSection, b:maxNumberOfSection, c:minSizeOfClass, d:sizeOfClassForm
function updateClassTable($classTable, $minNumberOfSection, $maxNumberOfSection, $minSizeOfClass, $maxSizeOfClass, $semesters, $semestersCheck)
{  
            global $link, $classTableName, $table;
    
    
    $query = "SELECT openArea FROM ".$table." WHERE id =1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $superClassData = explode('/', $row[0]);
    
    
    $returnString = '';
    if($minNumberOfSection == '')
    {
        $returnString .= $superClassData[0].'/';
    }
    else
    {
        $returnString .= $minNumberOfSection.'/';
    }
    
    if($maxNumberOfSection == '')
    {
        $returnString .= $superClassData[1].'/';
    }
    else
    {
        $returnString .= $maxNumberOfSection.'/';
    }
    
    if($minSizeOfClass == '')
    {
        $returnString .= $superClassData[2].'/';
    }
    else
    {
        $returnString .= $minSizeOfClass.'/';
    }
    
    if($maxSizeOfClass == '')
    {
        $returnString .= $superClassData[3];
    }
    else
    {
        $returnString .= $maxSizeOfClass;
    }
    
    $query = "UPDATE ".$table." SET openArea='".$returnString."' WHERE id=1";
    mysqli_query($link, $query);
    
    $k = 1;
    $j = 0;
    $classNameTable = array();
    $query = '';
    $query = "SELECT nameOfClass FROM ".$classTableName."";
    $result = mysqli_query($link, $query);
    $a = 0;
    while($row = mysqli_fetch_array($result))
    {
        $classNameTable[$a] = $row[0];     
        $a++;
    }
    
    $classNameArray = array();
    $query = "SELECT * FROM ".$table."";
    $result = mysqli_query($link, $query);
    $a = 0;
    while($row = mysqli_fetch_array($result))
    {
        $instuctorArray[$a] = $row;     
        $a++;
    }
    $changedClassArray = array();
    $anArray = array();
    //return $classNameTable;
    //return $classTable;
            for($i = 0; $i < sizeof($classTable); $i+= 5)
            {
                if($classNameTable[$k-1] != $classTable[$i])
                {
                    $changedClassArray[$j][0] = $classNameTable[$k-1];
                    $changedClassArray[$j][1] = $classTable[$i];
                    $j++;
                }
                $query = "UPDATE ".$classTableName." SET nameOfClass = '".$classTable[$i]."',  minSizeOfClass = '".$classTable[($i+1)]."',  maxSizeOfClass = '".$classTable[($i+2)]."',  minNumberOfSection = '".$classTable[($i+3)]."',  maxNumberOfSection = '".$classTable[($i+4)]."', numberOfSemesters = '".$semesters[$i]."', numberOfSemestersCheck='".$semestersCheck[$i]."' WHERE id = ".$k."";
                mysqli_query($link, $query);
                
                //, 
                
                $k++;
            }
    //return $changedClassArray;
    //return $changedClassArray[0][0];
        if($changedClassArray[0] != null)
        {
            for($i = 0; $i < (sizeof($instuctorArray)-1); $i++)
            {
                for($k = 11; $k < ((sizeof($instuctorArray[$i]))/2)+11; $k++)
                {
                    for($m = 0; $m < sizeof($changedClassArray); $m++)
                    {
                        if($instuctorArray[($i+1)][$k] == $changedClassArray[$m][0])
                        {
                            $query = "UPDATE ".$table." SET instructorClass".($m+1)." = '".$changedClassArray[$m][1]."' WHERE id = ".($i+2)."";
                            //return $query;
                            mysqli_query($link, $query);
                        }
                    }
                }
            }
        }
    return $changedClassArray;
}




function returnInstructorsFunction()
{
    //style="display: none;"
    global $link, $numberOfPeriods, $table, $availablePeriods, $instructorSubClassArray;
    $returnValue;
    
    $instructorClassString = $numberOfPeriods.'&';
    
    //$GLOBALS['teacherClassArray'] = 7;
    
    $query = "SELECT teachMinClasses, numberOfPeriods, classSectionSize FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row3 = mysqli_fetch_array($result);
    //return $row3[0];
    $settings = explode('/',$row3[0]);
    $numberOfPeriods = $row3[1];
    
    $hiddenVariable = 1;
    $hiddenVariable2 = 1;
    
    $subjectAvailabilityArrayTemp = explode('/',$row[5]);
    $subjectAvailabilityArray = array();

    foreach($subjectAvailabilityArrayTemp as $item)
    {
    $subjectAvailabilityArray[] = explode(',',$item);
    }

    $query = "SELECT * FROM ".$table."";
    //return $query;
    if($result = mysqli_query($link, $query))
    {
        //return 'hi';
        //$settings = explode('/', $row[0]);
        
        $row = mysqli_fetch_array($result);
        
        $number = 1;
        
        $subjectsData = getClassDataFromTable();
        
        //print_r($subjectsData);
        
        $subjectsArray = array();
        for($i = 0; $i < sizeof($subjectsData); $i++)
            {
                $subjectsArray[$i] = $subjectsData[$i][1];
            }
        
        
        $subAvailablePeriodsArray = explode('/',$availablePeriods);
        
        $tempVar = 1;
        
        if(($settings[1] == 1) || ($settings[2] == 1))
        {
            //echo '<hr><h3 class="sizeOfClassForm">Specific Instructor Data</h3><hr><table>';
            echo '<table>';
        }
        if($settings[1] == 1)
        {
            $returnValue .= "<tr><th>Instructor Availability</th></tr><tr>";
            if($row3[2] == '')
            {
                $returnString = '';
                for($i = 0; $i < ($numberOfPeriods-1); $i++)
                    {
                    $returnString .= "true,";
                    $returnValue .= "<td>".($i+1)."<input type='checkbox' id='superCheckBox".($i+1)."' value='small' checked /></td>";
                    }
                    $returnString .= "true";
                $query = "UPDATE ".$table." SET classSectionSize='".$returnString."' WHERE id=1";
                mysqli_query($link, $query);
                
                $returnValue .= "<td>".($i+1)."<input type='checkbox' id='superCheckBox".($i+1)."' value='small' checked /></td>";
                
            }
            else
            {
                $truthArray = explode(',',$row3[2]);
                
                for($i = 0; $i < $numberOfPeriods; $i++)
                {
                    $returnValue .= "<td>".($i+1)."<input type='checkbox' id='superCheckBox".($i+1)."' value='small'";
                    if($truthArray[$i] == 'true')
                    {
                        $returnValue .= 'checked';
                    }
                    $returnValue .= "/></td>";
                }
            }
                $returnValue .= "</tr>";
                
        }
        
        if($settings[2] == 1)
        {
            $data = array();
            if($row['teachMaxClasses'] == '')
            {
                $data[0] = $settings[7];
                $data[1] = $settings[8];
            }
            else
            {
            $data = explode('/',$row['teachMaxClasses']);
            }
            echo "<tr><td>Min Number Of Students In Class</td><td><input value='".$data[0]."' id='teachMinStudents' class='form-control scheduleInput' type='text' ></td><td>Max Number Of Students In Class</td><td><input value='".$data[1]."' id='teachMaxStudents' class='form-control scheduleInput' type='text' ></td></tr>";
        }
        
        if(($settings[1] == 1) || ($settings[2] == 1))
        {
            echo '</table>';
        }
        
        /*
        10: numberOfStudentsInstructor
        11: numberOfStudentsInstructorClass
        */
        $numberOfStudesntsArray = explode(',',$row['numberOfStudentsInClass']);
        $counter = 0;
        
        while($row = mysqli_fetch_array($result))
        {     
            //return $row;
            //return $row;
            //return $row;
            
        $returnValue .= "<table><th>Instructor ".$number."</th><tr><td>Instructor Name</td><td><input value='".$row[4]."' id='teachName".$number."' class='form-control scheduleInput' type='text' ></td></tr>";
        
            
            //return $settings;
            if($settings[2] == 2)
            {
        $returnValue .= "<tr><td>Min Number Of Sections To Teach</td><td><input value='".$row[6]."' id='teachMinClasses".$number."' class='form-control scheduleInput' type='text' ></td><td>Max Number Of Classes To Teach</td><td><input value='".$row[7]."' id='teachMaxClasses".$number."' class='form-control scheduleInput' type='text' ></td></tr>";
            }
            
            if($settings[0] == 3)
            {
                $subNumberOfStudentsArray = explode('/',$numberOfStudesntsArray[$counter]);
                $returnValue .= "<tr><td>Min Number Of Students In Class</td><td><input value='".$subNumberOfStudentsArray[0]."' id='teachMinStudents".$number."' class='form-control scheduleInput' type='text' ></td><td>Max Number Of Students In Class</td><td><input value='".$subNumberOfStudentsArray[1]."' id='teachMaxStudents".$number."' class='form-control scheduleInput' type='text' ></td></tr>";
                $counter++;
            }
        
        $returnValue .= "</tr></table>";
        
            //return $subAvailablePeriodsArray[1];
            $workingArray = explode(',', $subAvailablePeriodsArray[$number-1]);
            
            //return $workingArray[0];
            $tempArray = explode(',',$row[3]);
            //return $settings;
        if(($settings[1] == 1))
        {
            $returnValue .= '<div style="display: none;"><table><tr></tr>';
        }
            else
            {
                $returnValue .= '<div><table><tr></tr>';
            }
            $returnValue .= "<td>Periods Instructor Can Teach</td>";
        for($i = 0; $i < $numberOfPeriods; $i++)
        {
            $returnValue .= "<td><label>".($i+1)."  </label><input type='checkbox' id='canTeachCheckbox".($i + 1 + $numberOfPeriods*($number -1))."' value='small'";
            if(($tempArray[$i]) == "true")
            {
                $returnValue .= "checked";
            }
            $returnValue .= "/></td>";
        }
        
        $anoterString;
            
        $returnValue .= "</table></div><table><tr><td>Subjects Instructor Can Teach</td><div id='instructorClassses".$number."'></tr><table>";
        //return $row;
            //$instructorSubClassArray[$number-1] = $row;
            $j = 11;
            $go = false;
            //return print_r($row);
            
            
            $subjectAvailabilityArrayTemp = explode('/',$row[5]);
            $subjectAvailabilityArray = array();

            foreach($subjectAvailabilityArrayTemp as $item)
            {
            $subjectAvailabilityArray[] = explode(',',$item);
            }

            //return $row;
            
            $truthValues = explode('/',$row[5]);
            $tempValue = explode(',',$row[9]);
            
      
            $sizeOfClass = explode(',',$row['numberOfStudentsInClass']);
            //return $row;
            $hiddenVariable3 = 1;
            while ($row[$j])
            {
                
                $returnValue .= "<tr><td>".$hiddenVariable3.": ".$row[$j]."</td>";
                $tempValue2 = explode('/',$tempValue[$j-11]);
                
                $sizeOfClass2 = explode('/',$sizeOfClass[$j-11]);
                
                if($settings[2] != 3)
                {
                    
                       $returnValue .= '<tbody style="display:none">';
                }
                {
                    $returnValue .= '<div>';
                }
                $returnValue .="<td>Min Number Of Sections To Teach</td><td><input value='".$tempValue2[0]."' id='subMinClassesToTeach".$hiddenVariable2."' class='form-control scheduleInput' type='text' ></td><td>Max Number Of Classes To Teach</td><td><input value='".$tempValue2[1]."' id='subMaxClassesToTeach".$hiddenVariable2."' class='form-control scheduleInput' type='text' ></td></tbody>";
                
        
                if($settings[0] != 4)
                {
                    
                       $returnValue .= '<tbody style="display:none">';
                }
                {
                    $returnValue .= '<div>';
                }
                    $temp = explode('&', $sizeOfClass[($j-11)]);
                    $returnValue .="<td>Min Number Of Students To Teach</td><td><input value='".$sizeOfClass2[0]."' id='subMinSizeOfClass".$hiddenVariable2."' class='form-control scheduleInput' type='text' ></td><td>Max Number Of Students To Teach</td><td><input value='".$sizeOfClass2[1]."' id='subMaxSizeOfClass".$hiddenVariable2."' class='form-control scheduleInput' type='text' ></td></tbody>";
                
                
            
            $returnValue .= "<td><button value='".$row[$j]."' id='deleteInstructorSubjectasd".$hiddenVariable2."' type='submit' class='tempClass btn btn-primary addInstructorSubject ' onclick='deleteInstructorSubject(".($number).",".($j-10).")' >del</button></td>";
                $instructorSubClassArray[$number-1][$j-11] = $row[$j];
                $hiddenVariable2++;
                $hiddenVariable3++;
                
                $instructorClassString .= $row[$j].",";
                //return "hi";
                
                $subTruthValues = explode(',',$truthValues[$j-11]);
                    $j++;
                
                
        if($settings[0] != 3)    
        {
            $returnValue .= '<div style="display: none;">';
        }
                else
                {
                    $returnValue .= '<div>';
                }
        for($i = 0; $i < sizeof($subTruthValues); $i++)
        {
            if($settings[1] != 3)    
            {
                $returnValue .= '<td style="display: none;">';
            }
            else
            {
                $returnValue .= "<td>";
            }
                
            $returnValue .= "<label>".($i+1)."  </label><input type='checkbox' id='canTeachClassCheckbox".$hiddenVariable."' value='small'";
            $anoterString = $anoterString.$hiddenVariable.',';
            $hiddenVariable++;
            
            if(($subTruthValues[$i]) == "true")
            {
                $returnValue .= "checked";
            }
            $returnValue .= "/></td>";
            
            
        }
               
            $returnValue .= '</div></tr>';
              $go = true;  
            }
            if($go)
            {
                $instructorClassString .= "/";
            }
            $returnValue .= "</table><table>";
            
            
            
        $returnValue .= '</table><tr><td>Add Subject</td><td><select class="selectpicker" id="instructorClassSelector'.$number.'">';            
        for($i = 0; $i < sizeof($subjectsArray); $i++)
         {
            $returnValue .= "<option>".$subjectsArray[$i]."</option>";
         }
        $returnValue .= "</select></td><td><button id='addInstructorSubject".$i."' type='submit' value='Save' class='tempClass btn btn-primary addInstructorSubject' onclick='addSubjectToTeacher(".$number.")' >Add Subject</button></td></tr></table><br></table><hr>";            
            $number++;
        }
    }
    else
    {
        $returnValue .= "failure";
    }
    
    
    
    $returnValue .= "<input value='".$instructorClassString."' id='instructorSubclassButton' class='form-control scheduleInput' type='text' hidden>";
    
    //return $anoterString;
    
    return $returnValue.$anoterString;

}

function updateSubTextArea($array, $saveTo, $id)
{
    global $link, $table;
    
    $returnString = '';
    
}

function updateInstructorTable($instructorTable, $checkBoxData, $subCheckBoxData, $instructorClassCheckBox, $instructorSubAvailability, $instructorNumberOfClasses, $superAvailability, $teachMinStudents, $teachMaxStudents, $subSizeOfClass, $minSizeOfClassSuper, $maxSizeOfClassSuper)
{   
    //return $instructorSubAvailability;
    global $link, $table;
    
    //return $subSizeOfClass;
    
    if($superAvailability != '')
    {
        $query = "UPDATE ".$table." SET classSectionSize='".$superAvailability."' WHERE id=1 LIMIT 1";
        mysqli_query($link, $query);
    }
    
    foreach($tempArray as $item)
    {
        $checkBoxTeacherClassArray[] = explode('/',$item);
    }
    
    
    $query = "SELECT  FROM `".$table."` WHERE `id` = '2'";
		if($result = mysqli_query($link, $query))
		{
			$row = mysqli_fetch_array($result);
            //return print_r($row);
        }
  
    $returnString = '';
    
    //return $teachMinStudents;
    
    for($i = 0; $i < sizeof($teachMinStudents); $i++)
    {
        $returnString .= $teachMinStudents[$i].'/'.$teachMaxStudents[$i];
        if($i != ((sizeof($teachMinStudents))-1))
        {
        $returnString .= ',';
        }
    }
    if($returnString != '')
    {
    $query = "UPDATE ".$table." SET numberOfStudentsInClass='".$returnString."' WHERE id= 1";
    mysqli_query($link, $query);
    }
    
    //return 'break';
            $i = 0;
            $j = 1;
    
            $returningError = '';
    
            $tempArray = explode('/',$subCheckBoxData);
    
            //return $tempArray[0];
        
            //return print_r($tempArray);
    
            while (array_key_exists($i, $instructorTable))
            {
                if(!is_numeric($instructorTable[$i+1]))
                {
                    $returningError .= "Instructor ".$j."'s min number of classes needs to be a number"; 
                }
                else if(is_float($instructorTable[$i+1]))
                {
                    $returningError .= "Instructor ".$j."'s min number of classes needs to be a whole number";
                }
                
                if(!is_numeric($instructorTable[$i+2]))
                {
                    $returningError .= "Instructor ".$j."'s max number of classes needs to be a number"; 
                }
                else if(is_float($instructorTable[$i+2]))
                {
                    $returningError .= "Instructor ".$j."'s max number of classes needs to be a whole number";
                }
                $i = $i +3;
                $j++;
            }
                   
            if($returningError != '')
            {
                //return $returningError;
            }
    
    $query = "SELECT teachMinClasses FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $settings = explode('/',$row[0]);
    
    
    if($settings[2] == 1)
    {
        if(($minSizeOfClassSuper != '') || ($maxSizeOfClassSuper != '') || ($minSizeOfClassSuper != 'undefined') || ($maxSizeOfClassSuper != 'undefined'))
        {
           $query = "UPDATE ".$table." SET teachMaxClasses='".$minSizeOfClassSuper."/".$maxSizeOfClassSuper."' WHERE id=1";
            mysqli_query($link, $query);
        }
    }
    
            $checkBoxDataArray = explode('/', $checkBoxData);
    
    $tempArray = array();
    /*
        if($instructorClassCheckBox == '')
        {
            $tempArray = explode('&',$instructorClassCheckBox);
        }
        */
    //return $instructorClassCheckBox;
     //return $instructorClassCheckBox;
    $tempArray = explode('&',$instructorClassCheckBox);
    
    //return $checkBoxDataArray;
    $tempArray2 = array();
    $workingArray = array();
       
    $subSizeOfClassArray = array();
    
    $returnArray = array();
    
    $sizeOfClassCounter = 0;
    for($i = 0; $i < (sizeof($tempArray)-1); $i++)
    {
        $workingArray = explode('/',$tempArray[$i]);
        $returnString = '';
        $sizeOfClassReturnString = '';
        
        $superArray = explode(',', $checkBoxDataArray[$i]);
        for($j = 0; $j < sizeof($workingArray); $j++)
        {
            $workingArray2 = explode(',', $workingArray[$j]);
            
            for($k = 0; $k < (sizeof($workingArray2)); $k++)
            {
                $sizeOfClassReturnString .= $subMinSizeOfClass[$sizeOfClassCounter].'&'.$subMaxSizeOfClass[$sizeOfClassCounter];
                $sizeOfClassCounter++;
                    
                if($superArray[$k] == 'false')
                {
                    $returnString .= 'false';
                }
                else
                {
                    $returnString .= $workingArray2[$k];
                }
                if(($k == (sizeof($workingArray2))-1))
                {
                    if($j != (sizeof($workingArray)-1))
                    {
                    $returnString .= '/';
                    $sizeOfClassReturnString .= '/';
                    }
                }
                else
                {
                    $returnString .= ',';
                    $sizeOfClassReturnString .= ',';
                }
            }
        }
        $returnArray[$i] = $returnString;
        $subSizeOfClassArray[$i] = $sizeOfClassReturnString;
    }
    
    //return $subSizeOfClassArray;
    //return (sizeof($instructorTable))/3;
            //print_r($tempArray);
    //return $returnArray;
            for($i = 0; $i < ((sizeof($instructorTable))/3); $i++)
            {
                if($tempArray[0] == '')
                {
                    if(($instructorNumberOfClasses[$i] != '') && isset($instructorNumberOfClasses[$i]))
                    {
                        $query = "UPDATE ".$table." SET classSectionSize = '".$instructorNumberOfClasses[$i]."'WHERE id=".($i+2)."";
                        mysqli_query($link, $query);
                    }
                    if(($checkBoxDataArray[$i] != '') && isset($checkBoxDataArray[$i]))
                    {
                        $query = "UPDATE ".$table." SET numberOfStudents = '".$checkBoxDataArray[$i]."' WHERE id=".($i+2)."";
                        mysqli_query($link, $query);
                    }
                    if(($subSizeOfClass[$i] != '') && isset($subSizeOfClass[$i]))
                    {
                        $query = "UPDATE ".$table." SET numberOfStudentsInClass='".$subSizeOfClass[$i]."' WHERE id=".($i+2)."";
                        mysqli_query($link, $query);
                    }
                    
                }
                else
                {
                if(($returnArray[$i] != '') && isset($returnArray[$i]))
                {
                    $query = "UPDATE ".$table." SET availablePeriods = '".($returnArray[$i])."' WHERE id=".($i+2)."";
                    mysqli_query($link, $query);
                }
                if(($instructorNumberOfClasses[$i] != '') && isset($instructorNumberOfClasses[$i]))
                {
                    $query = "UPDATE ".$table." SET classSectionSize = '".$instructorNumberOfClasses[$i]."' WHERE id=".($i+2)."";
                    mysqli_query($link, $query);
                }
                 if(($checkBoxDataArray[$i] != '') && isset($checkBoxDataArray[$i]))   
                {
                    $query = "UPDATE ".$table." SET numberOfStudents = '".$checkBoxDataArray[$i]."' WHERE id=".($i+2)."";
                    mysqli_query($link, $query);
                }
                if(($subSizeOfClass[$i] != '') && isset($subSizeOfClass[$i]))
                {
                    $query = "UPDATE ".$table." SET numberOfStudentsInClass='".$subSizeOfClass[$i]."' WHERE id=".($i+2)."";
                    mysqli_query($link, $query);
                }
                }
            }
            //return sizeof($instructorTable);        
    
    $k = 2;
            for($i = 0; $i < sizeof($instructorTable); $i+= 3)
            {
                if(($instructorTable[$i] != '') && isset($instructorTable[$i]))
                {
                    $query = "UPDATE ".$table." SET teacherName = '".$instructorTable[$i]."' WHERE id = ".$k."";
                    mysqli_query($link, $query);
                }
                 if(($instructorTable[($i+1)] != '') && isset($instructorTable[($i+1)])) 
                {
                    $query = "UPDATE ".$table." SET teachMinClasses = '".$instructorTable[($i+1)]."' WHERE id = ".$k."";
                    mysqli_query($link, $query);
                }
                 if(($instructorTable[($i+2)] != '') && isset($instructorTable[($i+2)]))    
                {
                    $query = "UPDATE ".$table." SET teachMaxClasses  = '".$instructorTable[($i+2)]."' WHERE id = ".$k."";
                    mysqli_query($link, $query);
                }
                
                if (!mysqli_query($link, $query))
                {
                    return 2;
                }
                $k++;
            }
            
}


function deleteClass($i)
{
   global $link, $classTableName, $table;
   if(!is_numeric($i))
       {
        return "Delete value must be a number";
       }

       else
       {
           $query = "SELECT COUNT(*) FROM ".$classTableName."";
           $result = mysqli_query($link, $query);
           $row = mysqli_fetch_array($result);
           
           $goValue = $row[0] - $i;
           $numberOfClasses = $row[0];

           $query = "SELECT nameOfClass FROM ".$classTableName." WHERE id = '".$i."'";
           
        $result = mysqli_query($link, $query);
          
         $row = mysqli_fetch_array($result);
           
           
            $instuctorArray = array();
            $query = "SELECT * FROM ".$table."";
            $result = mysqli_query($link, $query);
            $a = 0;
            while($row = mysqli_fetch_array($result))
            {
                $returnString = '';
                $instuctorArray[$a] = $row;     
                $a++;
            }
           
           /*
            for($i = 0; $i < (sizeof($instuctorArray)-1); $i++)
            {
                for($k = 11; $k < ((sizeof($instuctorArray[$i]))/2)+11; $k++)
                {
                      if($instuctorArray[($i+2)][$k] == $row[0])
                      {
                        deleteInstructorClass(($i+1),($k-10));
                      }
                }
            }*/
           
        $query = "DELETE FROM ".$classTableName." WHERE id = '".$i."' LIMIT 1";
           mysqli_query($link, $query);
           
           
           $startQuerryNumber = $i;
           
           //return $goValue;
           $query = '';
           for($k = ($i+1); $k < ($numberOfClasses+1); $k++)
           {
               $query .= "UPDATE ".$classTableName." SET id='".($k-1)."' WHERE id=".($k)." ";
               //return $query;
               mysqli_query($link, $query);
               
           }
           return $query;
           /*
           for($i = 0; $i < $goValue; $i++)
           {
                $query = "UPDATE ".$classTableName." SET id = ".($startQuerryNumber)." WHERE id = '".($startQuerryNumber+1)."'";
              
            if(mysqli_query($link, $query))
            {
                //return "good";
            }
               else
               {
                   //return "bad";
               }
               
               $startQuerryNumber++;
           }
           */
           
           for($k = 0; $k < ($numberOfClasses-1); $k++)
           {
               $query = "SELECT studentsInOtherClasses FROM ".$classTableName." WHERE id=".($k+1)."";
               $result = mysqli_query($link, $query);
               $row = mysqli_fetch_array($result);
               $classArray = explode(',',$row[0]);
               $returnString = '';
               for($m = 0; $m < ($numberOfClasses-2); $m++)
               {
                       $returnString .= $classArray[$m];
                       if($m != ($numberOfClasses-3))
                       {
                           $returnString .= ',';
                       }
               }
               $query = "UPDATE ".$classTableName." SET studentsInOtherClasses=".$returnString." WHERE id=".($k+1)."";
               mysqli_query($link, $query);
           }
           
        }     
           
           
    } 

function is_decimal( $val )
{
    return is_numeric( $val ) && floor( $val ) != $val;
}

function deleteInstructor($i,$instructorArray)
{
    //return sizeof($instructorArray);
    global $link, $table, $availablePeriods;


    $i = $i+1;
    $goValue = (sizeof($instructorArray)/3)+2 - $i;
    //return $goValue;
    
    
    global $link, $table;
    $tempArray = explode('/',$availablePeriods);
    
    $query = "SELECT numberOfStudentsInClass FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);  
    $row = mysqli_fetch_array($result);
    $numberOfStudents = explode(',',$row[0]);
    
    $query = "SELECT COUNT(id) FROM ".$table."";
    $result = mysqli_query($link, $query);  
    $row = mysqli_fetch_array($result);
    $numberOfInstructors = ($row[0]-1);
    //return $numberOfInstructors;
    
   if(!is_numeric($i))
       {
        return "Delete value must be a number";
       }
    
    else if((1 > $i) || (($numberOfInstructors) < ($i-1)))
    {
        return "Delete value must be between 0 and ".($numberOfInstructors+1);
    }
   else if(is_float($i))
   {
       return "Delete value must be a whole number";
   }
       else
       {
         

    $returnString = '';
    for ($j = 0; $j < ($numberOfInstructors-1); $j++)
    {
        if ($j != ($i-2))
        {
            $returnString .= $tempArray[$j].'/';
        }
        
    }
           //return 'hi';
           //return $returnArray;
      $query = "UPDATE ".$table." SET availablePeriods = '".$returnString."' LIMIT 1";    
    mysqli_query($link, $query);  
          
        $returnString = '';
           $i = $i-1;
        for($j = 0; $j < ($numberOfInstructors); $j++)
        {
            if(($j+1) != $i)
            {
                $returnString .= $numberOfStudents[$j];
                if(($i == ($j+2)))
                {
                    if(($j != ($numberOfInstructors-1)) && ($j != ($numberOfInstructors-2)))
                    {
                        $returnString .= ',';
                    }
                }
                else
                {
                    if($j != ($numberOfInstructors-1))
                    {
                        $returnString .= ',';
                    }
                }
            }
        }
           $i = $i+1;
           $query = "UPDATE ".$table." SET numberOfStudentsInClass='".$returnString."' WHERE id=1";
           mysqli_query($link, $query);
           
        $query = "DELETE FROM ".$table." WHERE id = '".($i)."' LIMIT 1";
        mysqli_query($link, $query);
           
           
           $startQuerryNumber = $i;
           
           
           //return $goValue;
           for($j = 1; $j < $goValue; $j++)
           {
                $query = "UPDATE ".$table." SET id = ".($startQuerryNumber)." WHERE id = '".($startQuerryNumber+1)."'";
               //return $query;
            if(mysqli_query($link, $query))
            {
                //return "good";
            }
               else
               {
                   //return "bad";
               }
               $startQuerryNumber++;
           }

              
           }         
}


function checkForValidNumber($input, $superDataField, $subDataField, $fieldNumber)
{
    $returningError = '';
    $insert = '';
    if($fieldNumber != '')
    {
        $insert = "".$superDataField." ".$fieldNumber."'s ";
    }
    
if($input == '')
{
    $returningError .= "".$insert."".$subDataField." is empty<br>";
}
else
{
    if(!is_numeric($input))
    {
        $returningError .= "".$insert."".$subDataField." needs to be a number<br>"; 
    }
    else 
    {    
    if(is_decimal($input))
    {
        $returningError .= "".$insert."".$subDataField." needs to be a whole number<br>"; 
    }

    else if($input <= 0)
    {
        $returningError .= "".$insert."".$subDataField." needs to be a possitive number larger than zero<br>"; 
    }
    }
}
return  $returningError;   
}


function checkInstructorAvailability($minNumberOfPeriods, $truthValues)
{
    $subjectAvailabilityArrayTemp = explode('/',$truthValues);
    $subjectAvailabilityArray = array();

    foreach($subjectAvailabilityArrayTemp as $item)
    {
    $subjectAvailabilityArray[] = explode(',',$item);
    }
    
    $availableClasses = 0;
    for($i = 0; $i < sizeof(truthValueArray); $i++)
    {
        if($truthValueArray[0] == 'true')
        {
            $availableClasses++;
        }
    }
    if($minNumberOfPeriods > $availableClasses)
    {
        return true;
    }
}



function verifyForm()
{
    global $link, $table, $classTableName;
    
    $listOfErrorsClass = '';
    
    $listOfErrorsInstructor = '';
        
    $classTable = array();
    $instructorTable = array();
    
    $query = "SELECT * FROM ".$classTableName."";
    $result = mysqli_query($link, $query);
    $a = 0;
    while($row = mysqli_fetch_array($result))
    {
        $classTable[$a] = $row;     
        $a++;
    }
    
    $truthArray = array();
    $a = 0;
    $query = "SELECT * FROM ".$table."";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result))
    {
        $subjectAvailabilityArrayTemp = explode('/',$row[5]);
        $subjectAvailabilityArray = array();
        foreach($subjectAvailabilityArrayTemp as $item)
        {
        $subjectAvailabilityArray[] = explode(',',$item);
        }
        $truthArray[$a] = $subjectAvailabilityArray;
        
        $instructorTable[$a] = $row;
        if($a != 0)
        {
            $truthArray[0][($a-1)] = $row[3];
        }
        $a++;
    }
    
    $numberOfOpenSeats;
    for($i = 0; $i < sizeof($classTable); $i++)
    {
        $listOfErrorsClass .= checkForValidNumber($classTable[$i][3], "Subject", "Min Size Of Class", $i+1);
        $listOfErrorsClass .= checkForValidNumber($classTable[$i][4], "Subject", "Max Size Of Class", $i+1);
        
        $listOfErrorsClass .= checkForValidNumber($classTable[$i][5], "Subject", "Min Number of Sections", $i+1);
        $listOfErrorsClass .= checkForValidNumber($classTable[$i][6], "Subject", "Max Number of Sections", $i+1);
        
        $numberOfOpenSeats = $numberOfOpenSeats+($classTable[$i][4]*$classTable[$i][6]);
        if($classTable[$i][3] > $classTable[$i][4])
        {
            $listOfErrorsClass .= "Subject ".($i+1)." has a larger min size of classes value than max number of classes<br>";
        }
        if($classTable[$i][5] > $classTable[$i][6])
        {
            $listOfErrorsClass .= "Subject ".($i+1)." has a larger min number of sections value than max number of sections<br>";
        }
        for($j = ($i+1); $j < sizeof($classTable); $j++)
        {
            //return $classTable[$i][1];
            if($classTable[$i][1] ==  $classTable[$j][1])
            {
                $listOfErrorsClass .= "Subject ".($i+1)." and ".($j+1)." have the same names<br>";
            }
        }
    }
    if($instructorTable[0][3] > $numberOfOpenSeats)
   {
        $listOfErrorsClass .= "Size of expected class excedes number of available seats by ".($instructorTable[0][3]-$numberOfOpenSeats); 
   }
    
    

 for($i = 1; $i < (sizeof($instructorTable)); $i++)
    {
        $listOfErrorsInstructor .= checkForValidNumber($instructorTable[$i][6], "Instructor", "Min Number of Sections", $i);
        $listOfErrorsInstructor .= checkForValidNumber($instructorTable[$i][7], "Instructor", "Max Number of Sections", $i);
        if( ($instructorTable[$i][7] != '') && ($instructorTable[$i][6] != '') && ($instructorTable[$i][6] > $instructorTable[$i][7]))
        {
            $listOfErrorsInstructor .= "Instructor ".($i)." has a larger min size of classes value than max number of classes<br>";
        }
        //if($instructorClassSizeArray[$i-1])
$subjectAvailabilityArrayTemp = explode(',',$instructorTable[$i][9]);
    $subjectAvailabilityArray = array();
$hiddenVar = true;
        
        $checkArray = explode('/',$instructorTable[$i][5]);
        $checkArray2 = explode(',',$instructorTable[$i][3]);
        $checkArray3 = explode(',',$instructorTable[$i][9]);
        $checkArray4 = array();
        
        
        for($j = 0; $j < sizeof($checkArray); $j++)
        {

        }
        
        for($k = 0; $k < (sizeof($checkArray)); $k++)
        {
            $checkArray4 = explode('/',$checkArray3[$k]);
            
            
            if( ($checkArray4[0] == '') || ($checkArray4[1] == '') )
            {
                if($checkArray4[0] == '')
                {
                    $listOfErrorsInstructor .= "Instructor ".$i."'s class ".($k+1)." min number of sections to teach is empty<br>";
                }
                if($checkArray4[1] == '')
                {
                    $listOfErrorsInstructor .= "Instructor ".$i."'s class ".($k+1)." max number of sections to teach is empty<br>";
                }
            }
            else if($checkArray4[0] > $checkArray4[1])
            {
                $listOfErrorsInstructor .= "Instructor ".$i."'s class ".($k+1)." min number of sections to teach is larger than max number of sections to teach<br>";
            }

            
                    
            $subCheckArray = explode(',',$checkArray[$k]);
            for($l = 0; $l < sizeof($subCheckArray); $l++)
            {
                if(($subCheckArray[$l] == 'true') && ($checkArray2[$l] == 'false') )
                {
                    $listOfErrorsInstructor .= "Instructor ".($i)." is not available to teach on period ".($l+1)." for class ".($k+1)."<br>";
                }
            }
        }
        //return $listOfErrorsInstructor;
     
        
        
        
        
        if (checkInstructorAvailability($instructorTable[$i][6], $instructorTable[$i][5]))
        {
            $listOfErrorsClass .= "Instructor ".($i)." has does not have enough available periods to meet minimum amount of periods<br>";
        }
        if($classTable[$i][5] > $classTable[$i][6])
        {
            $listOfErrorsClass .= "Instructor ".($i)." has a larger min number of sections value than max number of sections<br>";
        }
        for($j = ($i+1); $j < sizeof($classTable); $j++)
        {
            if($instructorTable[$i][1] ==  $instructorTable[$j][1])
            {
                //$listOfErrorsClass .= "Class ".($i+1)." and ".($j+1)." have the same names<br>";
            }
        }
    }   
    
    return 'exit';
    header('createSchedule.php');
    
    return $listOfErrorsInstructor;

    return $listOfErrorsClass;
    
}


function getStudentData()
{
    global $link, $table, $classTableName;
    
    $classTable = array();
    $classDataTable = array();
    $studentsInClassArray = array();
    $returnString = '';
    
    $query = "SELECT nameOfClass, studentsInOtherClasses, studentsInClass FROM ".$classTableName."";
    $result = mysqli_query($link, $query);
    $a = 0;
    while($row = mysqli_fetch_array($result))
    {
        $classTable[$a] = $row[0];
        $classDataTable[$a] = $row[1];
        $studentsInClassArray[$a] = $row[2];
        
        $a++;
    }
    $returnString .= '<table>';
    $returnString .= "<tr><th>Name Of Class</th><th><table><td>Number or percent of students</td><tr><td>who want to take this class</tr></td></table></th><th>Number or percent of students who want to also take these classes</th>";
    for($i = 0; $i < sizeof($classTable); $i ++)
    {
        $returnString .= '<tr>';
        $returnString .= '<td>'.$classTable[$i].'</td>';
        
        $returnString .= "<td><input id='classDataSizeOfClass".($i+1)."' class='form-control scheduleInput' type='text' value='".$studentsInClassArray[$i]."' ></td><td><table><tr>";
        $k = 0;
        
        $dataArray = explode(',',$classDataTable[$i]);
        //return $classDataTable[$i];
        for($j = 0; $j < sizeof($classTable); $j++)
        {
            //(($i*((sizeof($classTable))-1))+$j+1)
            if($j != $i)
            {
                $returnString .= '<td>'.$classTable[$j]."</td><td><input id='classConnectionData".(($i * (sizeof($classTable)-1))+1+$k)."' class='form-control scheduleInput' type='text' value='".$dataArray[$k]."' ></td>";
                $k++;
            }
        }
        $returnString .= '</tr></table></td></tr>';
    }
    $returnString .= "<tr><td><button id='saveStudentData' type='submit' class='tempClass btn btn-primary addInstructorSubject ' onclick='saveStudentData()' >Save</button></tr></td>";
    
    $returnString .= '</table>';
    return $returnString;
}


function saveStudentDataSub($input, $input2)
{
    global $link, $table, $classTableName;
    
    $inputArray2 = explode(',',$input2);
    
    $query = "SELECT numberOfPeriods FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $numberOfPeriods = $row[0];
    
    $query = "SELECT COUNT(*) FROM ".$classTableName."";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $numberOfClasses = $row[0];
    
    $inputArray = explode(',',$input);
    
    for($i = 0; $i < $numberOfClasses; $i++)
    {
        $returnString = '';
        for($j = 0; $j < ($numberOfClasses-1); $j++)
        {
            $returnString .= $inputArray[($j+($i*($numberOfClasses-1)))];
            if($j != ($numberOfClasses-2))
            {
                $returnString .= ',';
            }
        }
        $query = "UPDATE ".$classTableName." SET studentsInOtherClasses='".$returnString."', studentsInClass='".$inputArray2[$i]."' WHERE id=".($i+1)."";
        mysqli_query($link, $query);
    }
}


    
if($_GET['action'] == 'showClass')
{
/*
    1:Number Of Sections
    2:Number Of Students In Each Class
*/
    //print_r(getClassDataFromTable());
    
    $classArray = getClassDataFromTable();
    
    $query = "SELECT teachMinClasses, openArea FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $settings = explode('/',$row[0]);
    
    print_r($settings);
    //a:minNumberOfSection, b:maxNumberOfSection, c:minSizeOfClass, d:maxSizeOfClass
    
    $superClassData = explode('/',$row[1]);
    
    if($settings[3] == 1)
    {
        echo '<hr class="numberOfSectionsForm"><h3 class="numberOfSectionsForm">General Class Data</h3><hr class="numberOfSectionsForm"><table><tr></tr><tr><th class="numberOfSectionsForm">Number Of Sections Per Class</th></tr><tr><td class="numberOfSectionsForm">Min Number Of Sections</td><td class="numberOfSectionsForm">  <fieldset class="form_group" ><input value="'.$superClassData[0].'" id="minNumberOfSection" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfSectionsForm">Max Number Of Sections</td><td class="numberOfSectionsForm">     <fieldset class="form_group" ><input value="'.$superClassData[1].'" id="maxNumberOfSection" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfSectionsForm"></td></tr></table><hr>';
    }
    
    if($settings[0] == 1)
    {
        if ($settings[3] != 1)
        {
            echo '<hr class="sizeOfClassForm"><h3 class="sizeOfClassForm">General Class Data</h3><hr class="sizeOfClassForm">';
        }
            
        echo '<table><tr><th class="sizeOfClassForm">Size Of Each Class</th></tr><tr><td class="sizeOfClassForm">Min Size Of Class</td><td class="sizeOfClassForm"><fieldset class="form_group" ><td class="sizeOfClassForm"><fieldset class="form_group" ><input value="'.$superClassData[2].'" id="minSizeOfClass" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="sizeOfClassForm">Max Size Of Class</td><td class="sizeOfClassForm"><fieldset class="form_group" ><input value="'.$superClassData[3].'" id="maxSizeOfClass" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td></tr></table><hr>';
    }
    
    echo "<h3>Specific Class Data</h3><hr>";
    
    for($i = 0; $i < sizeof(getClassDataFromTable()); $i++)
    {
        $classNumber = $i+1;
        
        //echo '<table><tr></tr><tr><th>Number Of Sections Per Class</th></tr><tr><td class="numberOfSectionsForm2">Min Number Of Sections</td><td class="numberOfSectionsForm2">  <fieldset class="form_group" ><input value="" id="minNumberOfSection" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfSectionsForm2">Max Number Of Sections</td><td class="numberOfSectionsForm2">     <fieldset class="form_group" ><input value="" id="maxNumberOfSection" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfSectionsForm2"></td></tr></table><hr><table><tr><th>Size Of Each Class</th></tr><tr><td class="sizeOfClassForm2">Min Size Of Class</td><td class="sizeOfClassForm2"><fieldset class="form_group" ><td class="sizeOfClassForm2"><fieldset class="form_group" ><input value="'.$classArray[$i][3].'" id="minSizeOfClass" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="sizeOfClassForm2">Max Size Of Class</td><td class="sizeOfClassForm2"><fieldset class="form_group" ><input value="'.$classArray[$i][4].'" id="maxSizeOfClass" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td></tr></table><hr>';
        //numberOfSemesters text, numberOfSemestersCheck text
        echo '<table><tr><th>Class '.($i+1).'</th></tr><td>Class Name</td><td><fieldset class="form_group" ><input value="'.$classArray[$i][1].'"  id="nameOfClass'.$classNumber.'" class="form-control scheduleInput" type="text" id="numberOfPeriods'.$classNumber.'  "></fieldset></td></tr>';
        
        echo '<tr><td>Number Of Semesters To Teach Each Class</td><td><fieldset class="form_group" ><input value="'.$classArray[$i]['numberOfSemesters'].'"  id="numberOfSemesterClass'.$classNumber.'" class="form-control scheduleInput" type="text" style="width:120px;"></fieldset></td><td>Have class taught during same period all semesters</td><td><input type="checkbox" id="numberOfSemesterClassCheckBox'.$classNumber.'" value="small"';
        
        if($classArray[$i]['numberOfSemestersCheck'] == 'true')
        {
            echo 'checked';
        }
        
        echo'/></td>';
        
        echo '</tr><tr><td class="numberOfStudForm">Min Size Of Class</td><td class="numberOfStudForm"><fieldset class="form_group" ><input value="'.$classArray[$i][3].'" id="minSizeOfClass'.$classNumber.'" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfStudForm">Max Size Of Class</td><td class="numberOfStudForm"><fieldset class="form_group" ><input value="'.$classArray[$i][4].'" id="maxSizeOfClass'.$classNumber.'" class="form-control scheduleInput" type="text"  style="width:120px;">	    </fieldset></td><tr> <td class="numberOfSections">Min Number Of Sections</td><td class="numberOfSections">  <fieldset class="form_group" ><input value="'.$classArray[$i][5].'" id="minNumberOfSection'.$classNumber.'" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfSections">Max Number Of Sections</td><td class="numberOfSections">     <fieldset class="form_group" ><input value="'.$classArray[$i][6].'" id="maxNumberOfSection'.$classNumber.'" class="form-control scheduleInput" type="text"  style="width:120px;"></fieldset></td> <td class="numberOfSections"></td> </tr></table><br><br>';
        
        //numberOfStudForm  numberOfSections
    } 
}
    
    
if($_GET['action'] == 'saveClass')
{
    //echo '1424';
    //echo ($_POST['a'].$_POST['b'].$_POST['c'].$_POST['d']);
    //print_r($_POST['e']);
    //print_r($_POST['f']);
    print_r(updateClassTable($_POST[classData], $_POST['a'],$_POST['b'],$_POST['c'],$_POST['d'],$_POST['e'],$_POST['f']));
}
    
    
if($_GET['action'] == 'deleteClass')
{
    
    print_r(deleteClass($_POST['deleteValue']));
}
    
    
if($_GET['action'] == 'numberOfPeriods')
{
    if(!is_numeric($_POST['numberOfPeriods']))
    {
        echo "Number of periods needs to be a number";
    }
    else if($_POST['numberOfPeriods'] < 0)
    {
        echo "Number of periods needs to be a positive number";
    }
    else if(is_decimal($_POST['numberOfPeriods']))
    {
        echo "Number of periods needs to be a whole number";
    }
    else
    {
        print_r(updateNumberOfPeriods($_POST['numberOfPeriods']));
    }
   
}




if($_GET['action'] == 'numOfStudents')
{
    //echo $_POST['numOfStudents'];
    
    if(!is_numeric($_POST['numOfStudents']))
    {
        echo "Number of students needs to be a number";
    }
    else if($_POST['numOfStudents'] < 0)
    {
        echo "Number of students needs to be a positive number";
    }
    else
    {
        echo updateNumberOfStudents($_POST['numOfStudents']);
    }
}






if($_GET['action'] == 'showInstructors')
{
    //echo returnInstructorsFunction();
    print_r(returnInstructorsFunction());
} 

if($_GET['action'] == 'saveInstructure')
{
    //print_r($_POST[checkBoxData]);
    //echo updateInstructorClassCheckBoxes($_POST['classCheckBoxData'],);
    //echo $_POST['numberOfPeriods'];
    //returnInstructorsFunction();
    //$arrayofmagic = $instructorSubClassArray;
    //print_r($arrayofmagic[0]);
    //print_r()
    
    
    //echo "sfsfds";
    
    //print_r($_POST[classData]);
       // echo "sdfds";
        
    
    //echo 'stupidcheck';
    //print_r($_POST['instructorSubjectCheck']);
    //echo 'check';
    //print_r($_POST['a'].$_POST['b'].$_POST['c'].$_POST['d']);
    //print_r($_POST['d']);
    
    //print_r($_POST['c']);
    
    //echo $_POST['d'].$_POST['e'];
    
    print_r(updateInstructorTable($_POST['classData'], $_POST['checkBoxData'], $_POST['classCheckBoxData'], $_POST['instructorSubjectCheck'], $_POST['instructorSubAvailability'], $_POST['instructorClassOpenings'], $_POST['superCheckBoxData'],$_POST['a'],$_POST['b'],$_POST['c'],$_POST['d'],$_POST['e']));
}  

    
if($_GET['action'] == 'deleteInstructor')
{    
    //echo $_POST['deleteValue']; 
    //print_r($_POST[classData]);
    echo deleteInstructor($_POST['deleteValue'], $_POST[classData]);    
}


    
    
if($_GET['action'] == 'addInstructor')
{
    echo addInstructor();
}
    
if($_GET['action'] == 'addInstructorClass')
{
    print_r(addClassToInstructor($_POST['instructorNum'], $_POST['classToAdd']));
}
    
if($_GET['action'] == 'deleteInstructorClass')
{
    //echo $_POST['first'].$_POST['second'];
    print_r(deleteInstructorClass($_POST['first'],$_POST['second']));
}
    
if($_GET['action'] == 'saveSchedulePassword')
{
    print_r(saveSchedPassword($_POST['schedPassword']));
}
    
if($_GET['action'] == 'verifyForm')
{
    print_r(verifyForm());
}  
    
if($_GET['action'] == 'getDefaults')
{
    $query = "SELECT teachMinClasses FROM ".$table." WHERE id=1";
    
    $result = mysqli_query($link, $query);
    
    $row = mysqli_fetch_array($result);
    echo $row[0];
}
    
if($_GET['action'] == 'saveSettings')
{
    $inputArray = explode('/', $_POST['settings']);
    
    $error = '';
    $error .= checkForValidNumber($inputArray[3], '', "Min Number Of Sections Per Class", '');
    $error .= checkForValidNumber($inputArray[4], '', "Max Number Of Sections Per Class", '');
    $error .= checkForValidNumber($inputArray[5], '', "Min Size Of Classes", '');
    $error .= checkForValidNumber($inputArray[6], '', "Max Size Of Classes", '');
    $error .= checkForValidNumber($inputArray[7], '', "Min Number Of Sections For Each Instructor", '');
    $error .= checkForValidNumber($inputArray[8], '', "Max Number Of Sections For Each Instructor", '');
    
    if($error != '')
    {
        echo $error;
    }
    
    else
    {
     
    $query = "UPDATE ".$table." SET teachMinClasses = '".$_POST['settings']."' WHERE id=1";
    
    if (mysqli_query($link, $query))
    {
        echo 'saved';
    }
    else
    {
        echo 'failure';
    }
        
    }
}
    
if($_GET['action'] == 'getNumberOfPeriods')
{
    $query = "SELECT numberOfPeriods FROM ".$table." WHERE id = '1'";
           
        $result = mysqli_query($link, $query);
          
         $row = mysqli_fetch_array($result);
    print_r($row[0]);
}  
    
if($_GET['action'] == 'showStudentData')
{
    print_r(getStudentData());
} 
    
if($_GET['action'] == 'saveStudentData')
{
    //echo $_POST['studentData1'].$_POST['studentData2'];
    print_r(saveStudentDataSub($_POST['studentData1'],$_POST['studentData2']));
}
    
if($_GET['action'] == 'getSettings')
{
    $query = "SELECT teachMinClasses FROM ".$table." WHERE id=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    //echo $_POST['studentData1'].$_POST['studentData2'];
    echo $row[0];
}
    
?>