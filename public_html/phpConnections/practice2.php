
<?php

$texStuff = "A string is here";

    $nameArray = array();
    $infoURLArray = array();
    $pictureURLArray = array();
    $countyArray = array();
    $partyArray = array();

    
    //echo "php file 2";
    $personNames = file_get_contents("http://le.utah.gov/house2/representatives.jsp");
    //echo $personNames;


    $pageArray = explode('<td><a href="detail.jsp?i=',$personNames);


    //echo "<br>";

    for($i = 1; $i < sizeof($pageArray); $i++)
    {

    $secondPageArray = explode('">',$pageArray[$i]);
        
    $tempNameArray = explode('</a></td>',$secondPageArray[1]);
        
        
    $tempDistrictArray1 = explode('<td>',$pageArray[$i]);
        
    $tempDistrict = $tempDistrictArray1[2];

    $tempDistrictArray2 = split("<td>",$tempDistrict);
        
    $tempDistrictArray3 = split("</td>",$tempDistrict);
        
        
    //$tempPartyArray1 = split("</a></td>",$pageArray[$i]);
        
    //$tempPartyArray2 = explode("</td>",$tempDistrictArray1[1];);
        
    
        

        
    
/*
    echo $pageArray[$i];
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
    //echo $tempPartyArra2[0];
    echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
    echo $tempNameArray[0];
    echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
        echo $tempDistrictArray1[1];
    echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
     */   

        
    $b = $i - 1;
    $infoURLArray[$b] = "http://le.utah.gov/house2/detail.jsp?i=".$secondPageArray[0];
    $pictureURLArray[$b] = "http://le.utah.gov/images/legislator/".$secondPageArray[0].".jpg";
    $nameArray[$b] = $tempNameArray[0];
    //$partyArray[$b] = $tempDistrictArray1[1];
    $countyArray[$b] = $tempDistrictArray3[0];
    
    }
   
?>



<script>

    var tempArray = <?php echo json_encode($infoURLArray); ?>;
    document.write(tempArray[1]);
    document.write("<br>");
    
    var tempArray = <?php echo json_encode($pictureURLArray); ?>;
    document.write(tempArray[1]);
    document.write("<br>");
    
    var tempArray = <?php echo json_encode($nameArray); ?>;
    document.write(tempArray[1]);
    document.write("<br>");
    
    var tempArray = <?php echo json_encode($countyArray); ?>;
    document.write(tempArray[1]);

</script>
