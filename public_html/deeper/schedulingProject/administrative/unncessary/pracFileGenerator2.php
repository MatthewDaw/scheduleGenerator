<?php
error_reporting( E_ALL );

class classObject
{
    public $teachers = array();
    public $studentsInClass = array();  
    public $numOfStudentsInClass; 
    
    public $minNumberOfSections;
    public $maxNumberOfSections;
    
    public $actualNumOfSections;
    
    public $minClassSize;
    public $maxClassSize;
    
    public $actualClassSize;

    
  
    
public function __constructor($teachers,$studentsInClass,$numOfStudentsInClass,$minNumberOfSections,$maxNumberOfSections,$minClassSize,$maxClassSize)
{
    $this->teachers = $teachers;
    $this->studentsInClass = $studentsInClass;
    $this->numOfStudentsInClass = $numOfStudentsInClass;    
    
    $this->minNumberOfSections = $minNumberOfSections;
    $this->maxNumberOfSections = $maxNumberOfSections;
    
    $this->minClassSize = $minClassSize;
    $this->maxClassSize = $maxClassSize;
}
    
public function getTeachers(){
		return $this->teachers;
	}

	public function setTeachers($teachers){
		$this->teachers = $teachers;
	}

	public function getStudentsInClass(){
		return $this->studentsInClass;
	}

	public function setStudentsInClass($studentsInClass){
		$this->studentsInClass = $studentsInClass;
	}

	public function getNumOfStudentsInClass(){
		return $this->numOfStudentsInClass;
	}

	public function setNumOfStudentsInClass($numOfStudentsInClass){
		$this->numOfStudentsInClass = $numOfStudentsInClass;
	}

	public function getMinNumberOfSections(){
		return $this->minNumberOfSections;
	}

	public function setMinNumberOfSections($minNumberOfSections){
		$this->minNumberOfSections = $minNumberOfSections;
	}

	public function getMaxNumberOfSections(){
		return $this->maxNumberOfSections;
	}

	public function setMaxNumberOfSections($maxNumberOfSections){
		$this->maxNumberOfSections = $maxNumberOfSections;
	}

	public function getActualNumOfSections(){
		return $this->actualNumOfSections;
	}

	public function setActualNumOfSections($actualNumOfSections){
		$this->actualNumOfSections = $actualNumOfSections;
	}

	public function getMinClassSize(){
		return $this->minClassSize;
	}

	public function setMinClassSize($minClassSize){
		$this->minClassSize = $minClassSize;
	}

	public function getMaxClassSize(){
		return $this->maxClassSize;
	}

	public function setMaxClassSize($maxClassSize){
		$this->maxClassSize = $maxClassSize;
	}

	public function getActualClassSize(){
		return $this->actualClassSize;
	}

	public function setActualClassSize($actualClassSize){
		$this->actualClassSize = $actualClassSize;
	}
    
}



class teacher
{
    public $teacherNumber = 0;
    public $teacherClasses = array();
    
    public function __construct($teacherClasses,$teacherNumber)
    {
        $this->teacherClasses = $teacherClasses;
        $this->teacherNumber = $teacherNumber;
    }
    
    public function getTeacherNumber()
    {
        return $this->teacherNumber;
    }
}



class student
{
    public $studentNumber;
    public $studClasses = array();
    
    public function __construct($studentNumber,$studClasses)
    {
        $this->studentNumber = $studentNumber;
        $this->studClasses = $studClasses;
    }
    
    public function getStudNumber()
    {
        return $this->studentNumber;
    }
}

$studentObjectArray = array();
$teacherObjectArray = array();
$classObjectArray = array();

include "detailGenerator2.php";
$tempScheduleString = array();
$classCorrelationArray = array();
$classSizeArray = array();
$cutClassArray = array();
$sizeOfClassesArray = array();
$numberOfSections = array();
$maxClassSize = array();
$minClassSize = array();
$numberOfClassesConst = 8;
$teacherClassArray = array(
    array("ridge","painting","drawing","apart"),
    array("ellingford","jounalism","english10","apenglang"),
    array("wytiaz","secmath2","apcalbc","secmath3"),
    array("keyes","acapella","chorus","apmusictheory","chamberchoir")
);

$minClassSize = array(20,20,20,20,20,20,20,20,20,20,20,20,20);
$maxClassSize = array(30,30,30,30,30,30,30,30,30,30,30,30,30);
$minNumberOfSections = array(1,1,1,1,1,1,1,1,1,1,1,1,1);
$maxNumberOfSections = array(3,3,3,3,3,3,3,3,3,3,3,3,3);

$minClassOpeningsTeacher = array(
    array(1,1,1),
    array(1,1,1),
    array(1,1,1),
    array(1,1,1)
);
$maxClassOpeningsTeacher = array(
    array(2,2,2),
    array(2,2,2),
    array(2,2,2),
    array(2,2,2)
);



function tempFillSchedule()
{
    global $tempScheduleString,$teacherClassArray;
    for($i = 0; $i < 8; $i++)
    {
        for ($k = 0; $k < 4; $k++)
        {
            if ($teacherClassArray[$k][$i+1])
            {
                $tempScheduleString[$i][$k] = $teacherClassArray[$k][$i+1];
            }
            else
            {
                $tempScheduleString[$i][$k] ="free";
            }
        }
    }    
}
tempFillSchedule();

function stripTeacherNames()
{
    global $teacherClassArray,$cutClassArray;
    $iterator = 0;
    for($j = 0 ; $j < sizeof($teacherClassArray); $j++) 
    {  

        for($i = 1 ; $i < sizeof($teacherClassArray[$j]); $i++)
        {
            $cutClassArray[$iterator] = $teacherClassArray[$j][$i];
             $iterator++;
            if($className == $myClass[$j][$i])
            {
                $returnValue++;   
            }            
        }        

    }
    
}
stripTeacherNames();

function getSizeOfArray($array)
{
    $returnValue = 0;
    for($i= 0; $i < sizeof($array); $i++)
    {
        $returnValue = $returnValue + sizeof($array[$i]);
    }
    
    return $returnValue;
}


function getClassNumberFromString($classNamePass)
{
    global $cutClassArray;
    for($i = 0; $i < sizeof($cutClassArray); $i++)
    {
        if ($cutClassArray[$i] == $classNamePass)
        {
            return $i;
        }
    }
}

function findNumberOfClassesDerived($className)
{
    global $myClass,$classCorrelationArray,$cutClassArray;
    $returnValue = 0;
    $tempNumber1;
    $tempNumber2;
    
    for($j = 0 ; $j < sizeof($myClass); $j++) 
    {  

        for($i = 0 ; $i < sizeof($myClass[$j]); $i++)
        {
            if($className == $myClass[$j][$i])
            {
                $returnValue++;
                for($k = 0; $k < sizeof($myClass[$j]); $k++)
                {
                    if($myClass[$j][$k] != $className)                    
                    {
                        $tempNumber1 = getClassNumberFromString($myClass[$j][$k]);
                        $tempNumber2 = getClassNumberFromString($className);
                        $classCorrelationArray[$tempNumber1][$tempNumber2]++;
                    }
                }
                
            }            
        }        

    }
    return $returnValue;
}

function findNumberOfClasses()
{
    global $myClass,$teacherClassArray,$classSizeArray,$cutClassArray;
    for($i = 0; $i < (sizeof($cutClassArray));$i++)
    {
        $classSizeArray[$i] = findNumberOfClassesDerived($cutClassArray[$i]);      
    }
}


function getTeacherFromClass($className)
{
    global $teacherClassArray;
    
    $returnArray;
    $iterator;
    
     for($i = 0; $i < sizeof($teacherClassArray); $i++)
    {
        for($j = 0; $j < sizeof($teacherClassArray[$i]); $j++)
        {
            if($teacherClassArray[$i][$j] == $className)
            {
                $returnArray[$iterator] = $teacherClassArray[$i][0];
                $iterator++;
                $j = sizeof($teacherClassArray[$i]);
            }
        }
    }
    return $returnArray;
}


function generateClassObjects()
{
    global $cutClassArray,$minClassSize,$maxClassSize,$classCorrelationArray;
    
    $teacherArray;
    
    for($i = 0; $i < sizeof($cutClassArray); $i++)
    {
        $teacherArrays = getTeacherFromClass($cutClassArray[$i]);

        $studentsInClass = $classCorrelationArray[$i];
        
            echo "student in class array"."<br>"."<br>";
            print_r($studentsInClass);
            echo "<br>"."<br>";
        
        $numberOfStudentsInClass = findNumberOfClassesDerived($cutClassArray[$i]); 
        
        //echo "<br>";
        //echo $numberOfStudentsInClass;
        //echo "<br>";
        
        $minNumberOfSections = $minNumberOfSections[$i];
        $maxNumberOfSections = $maxNumberOfSections[$i];
                
        $minClassSize = $minClassSize[$i];
        $maxClassSize = $maxClassSize[$i];        
        
        
        $classObject = new classObject($teacherArray,$studentsInClass,$numOfStudentsInClass,$minNumberOfSections,$maxNumberOfSections,$minClassSize,$maxClassSize);
        
        $classObjectArray[$i] = $classObject;
    }
    echo "classArray"."<br>"."<br>";
    print_r($classObjectArray);
    echo "<br>";echo "<br>";echo "<br>";
    
    //TODO: 
    
}
generateClassObjects();


function generateStudentObjects()
{
    global $studentObjectArray,$myClass;
    for($i = 0; $i < sizeof($myClass); $i++)
    {
        $student = new student($i,$myClass[$i]);

        $studentObjectArray[$i] = $student;
    }
}
generateStudentObjects();

function generateTeacherObjects()
{
    $teacherClassList;
    global $teacherObjectArray,$teacherClassArray;
    for($i = 0; $i < sizeof($teacherClassArray); $i++)
    {
        for($j = 1; $j < sizeof($teacherClassArray[$i]); $j++)
        {
            $teacherClassList[$j] = $teacherClassArray[$i][$j];
        }
        $teacher = new teacher($teacherClassList,$i);

        
     $teacherObjectArray[$i] = $teacher;
    }
    print_r($teacherObjectArray);
}
generateTeacherObjects();


getSizeOfArray($teacherClassArray);
findNumberOfClasses();

echo "<br>";echo "<br>";echo "<br>";
print_r($myClass);



    echo "<br>";echo "<br>";echo "<br>";
    $value = $classCorrelationArray[0][1];
    echo $value;echo "<br>";echo "<br>";echo "<br>";

 print_r($tempScheduleString);   

echo "<br>";echo "<br>";echo "<br>";
echo "something";
//print_r($studentObjectArray);
//$studentkay = new teacher(2,$myClass[1]);
$something = $studentObjectArray[2];
//        $me = new Person('boring', '12345', 12345);
        
        // Printing out, what the greet method returns
        echo $studentObjectArray[1]->getStudNumber();
        echo $teacherObjectArray[1]->getTeacherNumber();
        echo $classObjectArray[1]->getNumOfStudentsInClass();
echo "something";

    
?>





