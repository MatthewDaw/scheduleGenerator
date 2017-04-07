

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
    //return $truthArray;
    //return $instructorTable;
    
    
    //return $instructorTable[0][3];
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
                    $listOfErrorsInstructor .= "Instructor ".$i."'s class ".($k+1)." min number of classes to teach is empty<br>";
                }
                if($checkArray4[1] == '')
                {
                    $listOfErrorsInstructor .= "Instructor ".$i."'s class ".($k+1)." max number of classes to teach is empty<br>";
                }
            }
            else if($checkArray4[0] > $checkArray4[1])
            {
                $listOfErrorsInstructor .= "Instructor ".$i."'s class ".($k+1)." min number of classes to teach is larger than max number of classes to teach<br>";
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
    //header('createSchedule.php');
    
    return $listOfErrorsInstructor;

    return $listOfErrorsClass;
    
}

