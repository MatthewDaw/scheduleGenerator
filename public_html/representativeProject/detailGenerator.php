<?php
/*
$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
$myOtherFile = fread($myfile,filesize("newfile.txt"));
echo $myOtherFile;
fclose($myfile);*/
include 'fileGenerator.php';

    $file="newfile.txt";

    $fopen = fopen($file, r);

    $fread = fread($fopen,filesize($file));

    fclose($fopen);

    $remove = "!";

    $split = explode($remove, $fread);

    $array[] = null;
    $tab = "%";

    foreach ($split as $string)
    {
        $row = explode($tab, $string);
        array_push($array,$row);
    }
    echo "<pre>";
    print_r($array);
    echo "</pre>";


    // echo $array[1][1];
?>