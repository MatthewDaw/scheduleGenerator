<?php
error_reporting( E_ALL );
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

$classSizeArray = array();
$classArray = array(
    array("ridge","painting","drawing","apart"),
    array("ellingford","jounalism","english10","apenglang"),
    array("wytiaz","secmath2","apcalbc","secmath3"),
    array("keyes","acapella","chorus","apmusictheory","chamberchoir")
);

function getClass($value)
{
    return getClassDerived(0,$value);
}

function getClassDerived($index,$value)
{
$classArray = array(
    array("ridge","painting","drawing","apart"),
    array("ellingford","jounalism","english10","apenglang"),
    array("wytiaz","secmath2","apcalbc","secmath3"),
    array("keyes","acapella","chorus","apmusictheory","chamberchoir")
);
 
    
    if($value < (sizeof($classArray[$index])))
        {
            //echo $classArray[$index][$value];
            //$studentClassArray = $classArray[$index][$value];
            $returnValue = $classArray[$index][$value];
            return $returnValue;
        }
    else
    {
        return getClassDerived($index+1, $value-(sizeof($classArray[$index])-1));      
    }
    
}


function generateClass()
{

global $classArray;
    
$numberOfClasses = sizeof($classArray[1]);

$numOfClasses = 0;

for($i = 0 ; $i < sizeof($classArray); $i++)
{
    
    $numOfClasses = $numOfClasses + sizeof($classArray[$i]) - 1;
}

$studentClassArray = array();

    


for($j = 0 ; $j < 2; $j++) 
{  
    

for($i = 0 ; $i < 8; $i++)
{
    $randNumber = rand(1,$numOfClasses);    
    //echo "<br>".$i;    
    $studentClassArray[$j][$i] = getClass($randNumber);
    //echo "%";
}
    
    //echo "!";
    
}

//echo "<br>";echo "<br>";echo "<br>";

//print_r($studentClassArray);
    return $studentClassArray;

//echo "<br>";echo "<br>";echo "<br>";
}

$myClass = generateClass();
//echo "<br>";echo "<br>";echo "<br>";

function getSizeOfArray($array)
{
    $returnValue = 0;
    for($i= 0; $i < sizeof($array); $i++)
    {
        $returnValue = $returnValue + sizeof($array[$i]);
    }
    
    return $returnValue;
}

function findNumberOfClassesDerived($className)
{
    global $myClass;
    $returnValue = 0;
    
    for($j = 0 ; $j < sizeof($myClass); $j++) 
    {  

        for($i = 0 ; $i < sizeof($myClass[$j]); $i++)
        {
            //echo "<br>";
            //echo $myClass[$j][$i];
            if($className == $myClass[$j][$i])
            {
                $returnValue++;   
            }            
        }        

    }
    //echo "<br>";echo "<br>";
    //echo $returnValue;
    return $returnValue;
    
}

function findNumberOfClasses()
{
    global $myClass,$classArray,$classSizeArray;
    for($i = 1; $i < ((getSizeOfArray($classArray))-(sizeof($classArray))+1);$i++)
    {
        $classSizeArray[$i] = findNumberOfClassesDerived(getClass($i));
        echo getClass($i);
        echo "<br>";
        //echo "<br>";
    }
}

//echo ((getSizeOfArray($classArray))-(sizeof($classArray)));
getSizeOfArray($classArray);
findNumberOfClasses();

//echo getClass(1);

//echo "<br>";echo "<br>";echo "<br>";

echo "<br>";
echo "<br>";

echo "getClass check";
echo "<br>";
//echo getClass(15);

echo "<br>";
echo "<br>";

print_r($myClass);

echo "<br>";
echo "<br>";

//echo findNumberOfClassesDerived("painting");
print_r($classSizeArray);

echo "<br>";
echo "<br>";

//findNumberOfClassesDerived("chamberchoir");

?>





