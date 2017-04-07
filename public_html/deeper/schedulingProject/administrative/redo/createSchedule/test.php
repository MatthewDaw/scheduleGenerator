something

<?php

function quick_sort($array)
{
	// find array size
	$length = count($array);
	
	// base case test, if array of length 0 then just return array to caller
	if($length <= 1){
		return $array;
	}
	else{
	
		// select an item to act as our pivot point, since list is unsorted first position is easiest
		$pivot = $array[0];
		
		// declare our two arrays to act as partitions
		$left = $right = array();
		
		// loop and compare each item in the array to the pivot value, place item in appropriate partition
		for($i = 1; $i < count($array); $i++)
		{
			if($array[$i] < $pivot){
				$left[] = $array[$i];
			}
			else{
				$right[] = $array[$i];
			}
		}
		
		// use recursion to now sort the left and right lists
		return array_merge(quick_sort($left), array($pivot), quick_sort($right));
	}
}

class genericScheduleRequirements
{
	public $minNumberOfSectionsClasses = array();
	public $maxNumberOfSectionsClasses = array();
	public $classesProcessed = array();
	
	public $minNumberOfSectionsInstructor = array();
	public $maxNumberOfSectionsInstructor = array();
	public $instructorsProcessed = array();
	
	public function __construct()
	{}


	public function insertIntoNumberOfSectionsClasses($classNumber, $min, $max)
	{
		$continueValue = true;
		for($i = 0; $i < sizeof($this->classesProcessed); $i++)
		{
			if($this->classesProcessed[$i] == $classNumber)
			{
				$continueValue = false;
			}
		}
		
		if($continueValue)
		{
			$lastIndex = sizeof($this->classesProcessed);
			$this->classesProcessed[$lastIndex] = $classNumber;
			$this->minNumberOfSectionsClasses[($lastIndex)] = $min;
			$this->maxNumberOfSectionsClasses[($lastIndex)] = $max;
		}
	}

	
	public function insertIntoNumberOfSectionsInstructor($instructorNumber, $min, $max)
	{
		$continueValue = true;
		for($i = 0; $i < sizeof($this->instructorsProcessed); $i++)
		{
			if($this->instructorsProcessed[$i] == $instructorNumber)
			{
				$continueValue = false;
			}
		}
		
		if($continueValue)
		{
			$lastIndex = sizeof($this->instructorsProcessed);
			$this->instructorsProcessed[$lastIndex] = $instructorNumber;
			$this->minNumberOfSectionsInstructor[($lastIndex)] = $min;
			$this->maxNumberOfSectionsInstructor[($lastIndex)] = $max;
		}
	}
	
    private function findIndex($array, $valueAtIndex)
    {
        $i = 0;
        while($array[$i] != $valueAtIndex)
        {
            $i++;
            if($i > sizeof($array))
            {
                return;
            }
        }
        return $i;
    }
	
		private function subOrganizeArrays($numberedArray, $minArray, $maxArray)
	{
		//return 'suborganize';
		//return 'sdfsdf';
		//return $maxArray;
		$organizedArray = quick_sort($numberedArray);
		//return $organizedArray;
		
        $returnMin = array();
        $returnMax = array();
		
		
		//return $this->findIndex($numberedArray, 2);
		
        for($i = 0; $i < sizeof($numberedArray); $i++)
        {
			//return $numberedArray[$i];
        $returnIndex = $this->findIndex($numberedArray, $organizedArray[$i]);
        $returnMin[$i] = $minArray[$returnIndex];
        $returnMax[$i] = $maxArray[$returnIndex];
        } 
		$finalReturn = array();
		$finalReturn[0] = $organizedArray;
		$finalReturn[1] = $returnMin;
		$finalReturn[2] = $returnMax;
		return $finalReturn;
	}
	

    public function orgainizeArrays()
    {	
        $tempValue = $this->subOrganizeArrays($this->classesProcessed, $this->maxNumberOfSectionsClasses, $this->maxNumberOfSectionsClasses);
        
		$this->classesProcessed = $tempValue[0];
		$this->minNumberOfSectionsClasses = $tempValue[1];
		$this->maxNumberOfSectionsClasses = $tempValue[2];
		
		$tempValue = $this->subOrganizeArrays($this->instructorsProcessed, $this->minNumberOfSectionsInstructor, $this->maxNumberOfSectionsInstructor);
		
		$this->instructorsProcessed = $tempValue[0];
		$this->minNumberOfSectionsInstructor = $tempValue[1];
		$this->maxNumberOfSectionsInstructor = $tempValue[2];
		return 'sdfsd';
    }
	

    

    
    public function getMinNumberOfSectionsClasses()
    {
        return $this->minNumberOfSectionsClasses;
    }
    
    public function getMaxNumberOfSectionsClasses()
    {
        return $this->maxNumberOfSectionsClasses;
    }
    
    public function getClassesProcessed()
    {
        return $this->classesProcessed;
    }
    
    public function getMinNumberOfSectionsInstructor()
    {
        return $this->minNumberOfSectionsInstructor;
    }
    
    public function getMaxNumberOfSectionsInstructor()
    {
        return $this->maxNumberOfSectionsInstructor;
    }
    
    public function getInstructorsProcessed()
    {
        return $this->instructorsProcessed;
    }
}

$genericClass = new genericScheduleRequirements();

$emptyArray11 = array(8,6,5,4,3,7,2,1);
$emptyArray12 = array(8,6,5,4,3,7,2,1);
$emptyArray13 = array(8,6,5,4,3,7,2,1);

$emptyArray21 = array(9,3,5,4,2,1,7,6);
$emptyArray22 = array(9,3,5,4,23432,1,7,6);
$emptyArray23 = array(9,3,5,4,2,1,7,6);

for($i = 0; $i < sizeof($emptyArray11); $i++)
{
    $genericClass->insertIntoNumberOfSectionsClasses($emptyArray11[$i], $emptyArray12[$i], $emptyArray13[$i]);
    $genericClass->insertIntoNumberOfSectionsInstructor($emptyArray21[$i], $emptyArray22[$i], $emptyArray23[$i]);
}

echo "<br>";
print_r($genericClass->getMinNumberOfSectionsClasses());
echo "<br>";
echo "<br>";
print_r($genericClass->getMaxNumberOfSectionsClasses());
echo "<br>";
echo "<br>";
print_r($genericClass->getClassesProcessed());
echo "<br>";
echo "<br>";
print_r($genericClass->getMinNumberOfSectionsInstructor());
echo "<br>";
echo "<br>";
print_r($genericClass->getMaxNumberOfSectionsInstructor());
echo "<br>";
echo "<br>";
print_r($genericClass->getInstructorsProcessed());
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$temp = ($genericClass->orgainizeArrays());

print_r($temp);


print_r($genericClass->getMinNumberOfSectionsClasses());
echo "<br>";
echo "<br>";
print_r($genericClass->getMaxNumberOfSectionsClasses());
echo "<br>";
echo "<br>";
print_r($genericClass->getClassesProcessed());
echo "<br>";
echo "<br>";
print_r($genericClass->getMinNumberOfSectionsInstructor());
echo "<br>";
echo "<br>";
print_r($genericClass->getMaxNumberOfSectionsInstructor());
echo "<br>";
echo "<br>";
print_r($genericClass->getInstructorsProcessed());


/*

public $minNumberOfSectionsClasses = array();
	public $maxNumberOfSectionsClasses = array();
	public $classesProcessed = array();
	
	public $minNumberOfSectionsInstructor = array();
	public $maxNumberOfSectionsInstructor = array();
	public $instructorsProcessed = array();
*/

?>