
                      
<?php
 echo 'hi';                     
function compareArray($emptyArray, $numberArray)
{
				for($i = 0; $i < sizeof($numberArray); $i++)
				{
								if($emptyArray[$i] != $numberArray[$i])
								{
												return true;
								}
				}
				return false;
}
		
function checkForOverFlow($emptyArray, $numberArray)
{
				$returnArray = array();
				$emptyArray[0] = ($emptyArray[0]+1);
				for($i = 0; $i < (sizeof($emptyArray)-1); $i++)
				{
								if($emptyArray[$i] > $numberArray[$i])
								{
												$emptyArray[$i] = 0;
												$emptyArray[($i+1)] = ($emptyArray[($i+1)]+1);
								}
				}
				return $emptyArray;
}

function getCombinations($numberArray)
{

$emptyArray = array();
for($i = 0; $i < sizeof($numberArray); $i++)
{
    $emptyArray[$i] = 0;
}                      

	$k = 0;
																			
while(compareArray($emptyArray, $numberArray))
{
    $retunArray[$k] = $emptyArray;
					$k++;
				$emptyArray = checkForOverFlow($emptyArray, $numberArray);
}
$retunArray[$k] = $numberArray;

	return $retunArray;
}


$retunArray = array();
                      
$numberArray = array();
for($i = 0; $i < 3; $i++)
{
    $numberArray[$i] = 2;
}

$passingArray = array();
$passingArray[0] = 2;

$checkArray = (getCombinations($passingArray));


for($i = 0; $i < sizeof($checkArray); $i++)
{
				print_r($checkArray[$i]);
				echo "<br>";
}

echo 'soup';


?>