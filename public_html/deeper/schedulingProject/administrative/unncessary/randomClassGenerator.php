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
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$classArray = array(
    array("ridge","painting","drawing","apart"),
    array("ellingford","jounalism","english10","apenglang"),
    array("wytiaz","secmath2","apcalbc","secmath3"),
    array("keyes","acapella","chorus","apmusictheory","chamberchoir")
);
 
    
    if($value < (sizeof($classArray[$index])))
        {
            //fwrite($myfile, $classArray[$index][$value]);
            //echo $classArray[$index][$value];
            //$studentClassArray = $classArray[$index][$value];
            $returnValue = $classArray[$index][$value];
            //fwrite($myfile, $returnValue);
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
    //fwrite($myfile,"!");
   // echo "!";
    
}

//echo "<br>";echo "<br>";echo "<br>";

//print_r($studentClassArray);
    return $studentClassArray;

//echo "<br>";echo "<br>";echo "<br>";
}


$myClass = generateClass();
//echo "<br>";echo "<br>";echo "<br>";
//echo "<br>";echo "<br>";echo "<br>";
//print_r($myClass);
for($i = 0; $i < sizeof($myClass); $i++)
{
    for($j = 0; $j < sizeof($myClass[$j]); $j++)
    {
        fwrite($myfile,$myClass[$i][$j]);
        //echo $myClass[$i][$j];
        fwrite($myfile,"%");
    }
    fwrite($myfile,"!");
}

?>





