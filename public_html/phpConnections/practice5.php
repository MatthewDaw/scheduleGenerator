<!--<button type="button" id="button">Click Me!</button>
<script>


document.getElementById("button").onclick = function()

{
    
  var javascriptVariable = "house";
  var findValue = "1";
  window.location.href = "http://79.170.40.172/matthewbradleydaw.com/phpConnections/practice5.php?source=" + javascriptVariable + "findNumber=" + findValue; 
    
}
</script>-->

<?php
echo "something";
$iparr = split ("findNumber=", $_GET['source']); 
	//$i = $iparr[1];
        $i = 5;
     $personNames = file_get_contents("http://le.utah.gov/data/legislators.js");

	$pageArray = explode('fullName',$personNames);

    echo $pageArray[$i];
       //name
        $tempName1 = explode('":"',$pageArray[$i]);

        $tempName2 = explode('","',$tempName1[1]);
        $nameArray[$i] = $tempName2[0];

        //formatName
        $tempName1 = explode('"formatName":"',$pageArray[$i]);
        $tempName2 = explode('","id',$tempName1[1]);
        $formatName[$i] = $tempName2[0];

        //idTag
        $tempName1 = explode('"id":"',$pageArray[$i]);
        $tempName2 = explode('","ima',$tempName1[1]);
        $idTag[$i] = $tempName2[0];

        //imageURL
        $tempName1 = explode(',"image":"',$pageArray[$i]);
        $tempName2 = explode('","hou',$tempName1[1]);
        $formatName[$i] = $tempName2[0];

        //serviceStart
        $tempName1 = explode('"serviceStart":"',$pageArray[$i]);
        $tempName2 = explode('","profession',$tempName1[1]);
        $serviceStart[$i] = $tempName2[0];

        //party
        $tempName1 = explode('"party":"',$pageArray[$i]);
        $tempName2 = explode('","district":',$tempName1[1]);
        $senNameArray[$i] = $tempName2[0];

echo "<br>";
echo "<br>";
        //profession
        $tempName1 = explode('"profession":"',$pageArray[$i]);
        $tempName2 = explode('","professionalAf',$tempName1[1]);
        $profession[$i] = $tempName2[0];
        echo $profession[$i];

        //education
        $tempName1 = explode(',"education":"',$pageArray[$i]);
        $tempName2 = explode('","recognitionsAndH',$tempName1[1]);
        $senNameArray[$i] = $tempName2[0];

        

        //counties
        $tempName1 = explode('counties":"',$pageArray[$i]);
        $tempName2 = explode('","com',$tempName1[1]);
        $counties[$i] = $tempName2[0];
echo "<br>";
echo "<br>";
echo "<br>";
    echo $counties[$i];

        //committees
        $tempName1 = explode('{"committee":"',$pageArray[$i]);
        $individualCommitteeArray;
	for ($j = 1; $j < (sizeof($tempName1)-1); $j++)
{
        $tempcommitteitem = explode('"}',$tempName1[$j]);
        $individualCommitteeArray[$j-1] = $tempcommitteitem[0];
}

$commiteeArray[$i] = $individualCommitteeArray;

        //$tempName2 = explode('"}',$tempName1[1]);
	//for ($j = 0; $j < sizeof($tempName2); $j++){$committees[$j] = $tempName2[$j];}
        

//legislationLink
        $tempName1 = explode('"legislation":"',$pageArray[$i]);
        $tempName2 = explode('","dem',$tempName1[1]);
        $senNameArray[$i] = $tempName2[0];


        //
        $tempName1 = explode('{"committee":"',$pageArray[$i]);
        $individualCommitteeArray;
	for ($j = 1; $j < (sizeof($tempName1)); $j++)
{
        $tempcommitteitem = explode('"}',$tempName1[$j]);
        $individualCommitteeArray[$j-1] = $tempcommitteitem[0];
}

$commiteeArray[$i] = $individualCommitteeArray;



?>


