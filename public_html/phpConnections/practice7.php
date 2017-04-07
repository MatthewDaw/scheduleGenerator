<?php
    
$iparr = split ("findNumber=", $_GET['source']); 
    
    if ($iparr[0] == "senate")
    {
        $i = $iparr[1] + 75;
    }
    else
    {
	$i = $iparr[0];
    }
    $i = 1;
    //echo $i;
     $personNames = file_get_contents("http://le.utah.gov/data/legislators.js");

	$pageArray = explode('fullName',$personNames);
       //name
        $tempName1 = explode('":"',$pageArray[$i]);

        $tempName2 = explode('","',$tempName1[1]);
        $nameArray[$i] = $tempName2[0];

        //echo $nameArray[$i];

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
        $imageURL[$i] = $tempName2[0];

        //serviceStart
        $tempName1 = explode('"serviceStart":"',$pageArray[$i]);
        $tempName2 = explode('","profession',$tempName1[1]);
        $serviceStart[$i] = $tempName2[0];

        //party
        $tempName1 = explode('"party":"',$pageArray[$i]);
        $tempName2 = explode('","district":',$tempName1[1]);
        $senNameArray[$i] = $tempName2[0];

        //district
        $tempName1 = explode('strict":"',$pageArray[$i]);
        $tempName2 = explode('","serviceS',$tempName1[1]);
        $senNameArray[$i] = $tempName2[0];
        echo $senNameArray[$i];


        //profession
        $tempName1 = explode('"profession":"',$pageArray[$i]);
        $tempName2 = explode('","professionalAf',$tempName1[1]);
        $profession[$i] = $tempName2[0];


        //education
        $tempName1 = explode(',"education":"',$pageArray[$i]);
        $tempName2 = explode('","recognitionsAndH',$tempName1[1]);
        $education[$i] = $tempName2[0];
//echo $education[$i];
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

    
        //COFI
        $tempName1 = explode('"CofI":[',$pageArray[$i]);
        
echo $tempName1[1];
echo"<br>";
echo"<br>";
echo"<br>";
        
        $tempcommitteitem = explode('"}',$tempName1[1]);

//for ($j = 0; $j < sizeof($tempcommitteitem); $j++)
//{
    
echo"<br>";
echo"<br>";
echo"<br>";
for ($j = 0; $j < (sizeof($tempcommitteitem)-2); $j++){
        $something = explode('{"url":"', $tempcommitteitem[$j]);
        echo $something[1];
echo"<br>";
echo"<br>";
echo"<br>";}
        $tempcommitteitem = explode(',{"',$tempcommitteitem[1]);
        //echo $tempcommitteitem[1];
//}
        $individualCommitteeArray;
        fwrite($myfile, "$");
	for ($j = 1; $j < (sizeof($tempName1)-1); $j++)
{
        
        $individualCommitteeArray[$j-1] = $tempcommitteitem[0];
        //echo $individualCommitteeArray[$j-1];
        fwrite($myfile, $tempcommitteitem[0]);
        fwrite($myfile, "*");
}
        fwrite($myfile, "$");
        fwrite($myfile, "%");


?>
