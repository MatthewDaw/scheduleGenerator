
<?php
    //echo "something";
    //echo "something";
    $senNameArray = array();
    $senPersonPageArray = array();
    $senImageURL = array();
    //$houseArray = array();

    //$partyArray = array();
    $senDistrictArray = array();
    //$serviceStartURL = array();
    //$professionArray = array();

    //$professionAffiliationsArray = array();
    //$educationArray = array();
    $countieArray = array();
    //$senCommitteeArray = array();

    //$legislationURLArray = array();

    //$i = 76;

	




    $personNames = file_get_contents("http://le.utah.gov/data/legislators.js");
    //echo $personNames;


    $pageArray = explode('fullName',$personNames);

	$j = 79;

	//for($i = 0; $i < 29; $i++)
//{


    //echo $pageArray[3];


        //name
        $tempName1 = explode('":"',$pageArray[$j]);
        //echo $tempName1[1];
        $tempName2 = explode('","formatName',$tempName1[1]);
        $senNameArray[$i] = $tempName2[0];

        echo $senNameArray[$i];

      /*  echo $senNameArray[$i];
        echo "<br>";
        echo "<br>";
        echo "<br>";
*/


        //id
        $tempName1 = explode('"id":"',$pageArray[$j]);
        //echo $tempName1[1];
        $tempName2 = explode('","image"',$tempName1[1]);

        $senPersonPageArray[$i] = $tempName2[0];


     /*   echo $senPersonPageArray[$i];
        echo "<br>";
        echo "<br>";
        echo "<br>";
*/


        //senImageURL
        $tempName1 = explode(',"image":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","house":',$tempName1[1]);

        $senImageURL[$i] = $tempName2[0];

  /*      echo $senImageURL[$i];
        echo "<br>";
        echo "<br>";
        echo "<br>";*/
/*
        //house
        $tempName1 = explode('"house":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","party":"',$tempName1[1]);
    
        $houseArray[$i] = $tempName2[0];

        echo $houseArray[$i];
        echo "<br>";
        echo "<br>";
        echo "<br>";


        //party
        $tempName1 = explode(',"party":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","district":"',$tempName1[1]);

        $partyArray[$i] = $tempName2[0];
        echo "<br>";
        echo "<br>";
        echo "<br>";

        //district
        $tempName1 = explode(',"district":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","serviceStart"',$tempName1[1]);

        $senDistrictArray[$i] = $tempName2[0];

        


        //serviceStart
        $tempName1 = explode('","serviceStart":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","profession"',$tempName1[1]);
    
        $serviceStartURL[$i] = $tempName2[0];


        //profession
        $tempName1 = explode('","profession":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","professionalAffiliations":"',$tempName1[1]);

        $projessionArray[$i] = $tempName2[0];


        //profession afiliations
        $tempName1 = explode('","professionalAffiliations":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","education":"',$tempName1[1]);

        $professionAffiliationsArray[$i] = $tempName2[0];

        //education
        $tempName1 = explode('","education":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","recognitionsAndHonors":"","',$tempName1[1]);

        $educationArray[$i] = $tempName2[0];
*/
        //counties
        $tempName1 = explode('"counties":"',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('","',$tempName1[1]);
    
        $countieArray[$i] = $tempName2[0];


/*
        //commities
        $tempName1 = explode('","committees":[',$tempName1[1]);
        //echo $tempName1[1];
        $tempName2 = explode('],"legislation":"',$tempName1[1]);
    
        $senCommitteeArray[$i] = $tempName2[0];

        //legisation
        $tempName1 = explode('],"legislation":"',$tempName1[1]);
        $legislationURLArray[$i] = $tempName1[1];*/
$j = $j + 1;


//}
    
?>

