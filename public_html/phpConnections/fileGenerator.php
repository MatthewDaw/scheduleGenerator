<?php

echo "something";
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

//$iparr = split ("findNumber=", $_GET['source']); 
    
    
	
     $personNames = file_get_contents("http://le.utah.gov/data/legislators.js");

	$pageArray = explode('fullName',$personNames);
    //fwrite($myfile,$pageArray[2]);
$iparr = split ("findNumber=", $_GET['source']); 
    
    
	fwrite($myfile, "sdfsfd");

     $personNames = file_get_contents("http://le.utah.gov/data/legislators.js");

	$pageArray = explode('fullName',$personNames);
       //name

    for ($i = 1; $i < sizeof($pageArray); $i ++)
    {
        $tempName1 = explode('":"',$pageArray[$i]);

        $tempName2 = explode('","',$tempName1[1]);
        $nameArray[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
    
        //formatName
        $tempName1 = explode('"formatName":"',$pageArray[$i]);
        $tempName2 = explode('","id',$tempName1[1]);
        //$formatName[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        //idTag
        $tempName1 = explode('"id":"',$pageArray[$i]);
        $tempName2 = explode('","ima',$tempName1[1]);
        //$idTag[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        //imageURL
        $tempName1 = explode(',"image":"',$pageArray[$i]);
        $tempName2 = explode('","hou',$tempName1[1]);
        //$imageURL[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        

        
        //serviceStart
        $tempName1 = explode('"serviceStart":"',$pageArray[$i]);
        $tempName2 = explode('","profession',$tempName1[1]);
        //$serviceStart[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        //house
        $tempName1 = explode('"house":"',$pageArray[$i]);
        $tempName2 = explode('","par',$tempName1[1]);
        //$serviceStart[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        
        //party
        $tempName1 = explode('"party":"',$pageArray[$i]);
        $tempName2 = explode('","district":',$tempName1[1]);
        //$senNameArray[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
  


        
        //profession
        $tempName1 = explode('professionalAffiliations":"',$pageArray[$i]);
        $tempName2 = explode('","educat',$tempName1[1]);
        //$profession[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        
        //professional affiliation
        $tempName1 = explode('"profession":"',$pageArray[$i]);
        $tempName2 = explode('","professionalAf',$tempName1[1]);
        //$profession[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        
        //education
        $tempName1 = explode(',"education":"',$pageArray[$i]);
        $tempName2 = explode('","recognitionsAndH',$tempName1[1]);
        //$education[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        //committees
        $tempName1 = explode('{"committee":"',$pageArray[$i]);
        $individualCommitteeArray;
        fwrite($myfile, "$");
	for ($j = 1; $j < (sizeof($tempName1)-1); $j++)
{
        $tempcommitteitem = explode('"}',$tempName1[$j]);
        $individualCommitteeArray[$j-1] = $tempcommitteitem[0];
        fwrite($myfile, $tempcommitteitem[0]);
        fwrite($myfile, "*");
}
        fwrite($myfile, "$");
        fwrite($myfile, "%");



        //$tempName2 = explode('"}',$tempName1[1]);
	//for ($j = 0; $j < sizeof($tempName2); $j++){$committees[$j] = $tempName2[$j];}
        

//legislationLink
        $tempName1 = explode('"legislation":"',$pageArray[$i]);
        $tempName2 = explode('","dem',$tempName1[1]);
        //$senNameArray[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        //demographics
        $tempName1 = explode('demographic":"',$pageArray[$i]);
        $tempName2 = explode('","Co',$tempName1[1]);
        //$senNameArray[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        
        //COFI
        $tempName1 = explode('"CofI":[',$pageArray[$i]);
        
//echo $tempName1[1];
        
        $tempcommitteitem = explode('"}',$tempName1[1]);

for ($j = 0; $j < (sizeof($tempcommitteitem)-2); $j++){
        $something = explode('{"url":"', $tempcommitteitem[$j]);
        fwrite($myfile,$something[1]);
    fwrite($myfile, "*");
}
        
        fwrite($myfile, "%");
        
        
    //finantial Report URL
        $tempName1 = explode('"FinanceReport":[{"url":"',$pageArray[$i]);
        $tempName2 = explode('"}]',$tempName1[1]);
        //$senNameArray[$i] = $tempName2[0];
        fwrite($myfile, $tempName2[0]);
        fwrite($myfile, "%");
        



$commiteeArray[$i] = $individualCommitteeArray;
        
        fwrite($myfile,"!");
    }






fclose($myfile);



?>
