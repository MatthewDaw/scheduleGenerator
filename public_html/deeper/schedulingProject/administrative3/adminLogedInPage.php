<?php 
session_start();
//include("adminLogedInHeader.php");

//session_start();

include("../connection.php");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
echo $_SESSION['id'];
$i = 1;
$continue = true;
$scheduleArray = array();
$_SESSION['error'] = "";
//$_POST['schedOpen'] = '';
//$_POST['schedClose'] = '';
$_POST['schedClose'] = $_POST['schedClose'];

while($continue)
{
    $query = "SELECT `sched".$i."` FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";

    if($result = mysqli_query($link, $query))
    {
            $row = mysqli_fetch_array($result);
            if(($row[0] != NULL)||($row[0] != ''))
            {
            array_push($scheduleArray, $row[0]);
            
            }
        $i = $i + 1;
    }
    else
    {
        $continue = false;
    }
}

print_r($scheduleArray);
?>


<div id="error"><?php //if($_SESSION['error'] != "")
{
   // echo '<div class="alert alert-danger" role="alert">'.print_r($result).'</div>';
}
    
    
 if($_POST['schedOpen'])
 {
     
    $_SESSION['workingScheduleName'] = $_POST['schedOpen'];
     
    $query = "SELECT `username` FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $enterUserName = str_replace(' ', '*', $row[0]);
    $enterNameOfSchedule = str_replace(' ', '', $_POST[nameOfSchedule]);
    $_SESSION['workingScheduleTable'] = mysqli_real_escape_string($link,$enterUserName).$_SESSION['id'].mysqli_real_escape_string($link, $_POST['schedOpen']);
     
      
     header("location: adminCreateSchedule.php");
     echo "open";
     //echo $_POST['schedOpen'];
 }
    
 if(($_POST['schedClose'] != ''))
 {
       
     
echo "<br>"; echo "<br>"; echo "<br>";
     
    $query = "SELECT `username` FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $enterUserName = str_replace(' ', '*', $row[0]);
    $enterNameOfSchedule = str_replace(' ', '', $_POST[nameOfSchedule]);
    $tableName = mysqli_real_escape_string($link,$enterUserName).$_SESSION['id'].mysqli_real_escape_string($link, $_POST['schedOpen']);     
    echo  "myTable  ".$tableName.$_POST['schedClose'];
     $query = "DROP TABLE ".$tableName.$_POST['schedClose'].""; 
     
     
     
    if( mysqli_query($link, $query))
    {
        echo "success12345";
        
    
     
    //$query = "DELETE FROM table_name WHERE some_column=some_value;";
     echo $_POST['schedClose'];
    $query = "SELECT * FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
     print_r($row);
     print_r(array_keys($row));
     //echo key($row[2]);

     
     
     $returnValue = array();
     $j = 0;
     $i = 0;
    foreach($row as $key => $value)
    {
        if($row[$key] == $_POST['schedClose'])
        {
        $returnValue[$i] = $key;
            echo "key".$key;
            $i++;
        $mykey = $key;
        }
    }
     $deleteValue = $returnValue[1];
     $i = 0;
    foreach($row as $key => $value)
    {
                $returnValue[$i] = $key;
            echo "key".$key;
            $i++;
        $mykey = $key;
        if($row[$key] == $_POST['schedClose'])
        {

        }
    }
     /*
     $i = 0;
    foreach($row as $key => $value)
    {
        $mykey = $key;
        $returnValue[$i] = $key;
        if($row[$key] == $_POST['schedClose'])
        {
        
            //echo "key".$key;
            
        
        }
        $i = $i++;
    }*/
     $possibleDeletions = array();
     $j = 0;
     echo "<br>"; echo "<br>"; echo "<br>"."start";
     print_r($returnValue);
     echo "<br>"; echo "<br>"; echo "<br>"."start";
     
     
     
     for ($i = 13 ; $i < sizeof($returnValue); $i+=2)
     {
         $possibleDeletions[$j] = $returnValue[$i];
         $j++;
     }
     
     $returnValue = 0;
     
     for ($i = 0 ; $i < sizeof($possibleDeletions); $i++)
     {
         if($possibleDeletions[$i] == $deleteValue)
         {
             $returnValue = ($i);
             $i = sizeof($possibleDeletions);
         }
     }
     
     echo $returnValue;
     
     echo $deleteValue;echo "<br>";
     print_r($possibleDeletions);echo "<br>";
     
     for($i = $returnValue; $i < (sizeof($possibleDeletions)-1); $i++)
     {echo "<br>";
         //echo $possibleDeletions[$i];
         //echo "<br>";
         $query = "SELECT ".$possibleDeletions[$i+1]." FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
         $result = mysqli_query($link, $query);
         $row = mysqli_fetch_array($result);
         //echo $row[0];
      
         $query = "UPDATE `adminData` SET ".$possibleDeletions[$i]."='".$row[0]."' WHERE`id` = '".$_SESSION['id']."'";  
         mysqli_query($link, $query);
         
         
            //$query = "UPDATE `adminData` SET ".$returnValue[1]."='' WHERE`id` = '".$_SESSION['id']."'";         
            //mysqli_query($link, $query);
     }
     echo "<br>"; echo "<br>"; echo "<br>"."start";
     echo end($possibleDeletions);
     
            $query = "UPDATE `adminData` SET ".end($possibleDeletions)."='' WHERE`id` = '".$_SESSION['id']."'";         
            mysqli_query($link, $query);
     //header("Refresh:0");
     
     //echo $returnValue[1];
     //$query = "DELETE FROM `adminData` WHERE ".$returnValue[1]."='".$_POST['schedClose']."' ";
     //$query = "UPDATE `adminData` SET ".$returnValue[1]."='' WHERE`id` = '".$_SESSION['id']."'";
         
     //mysqli_query($link, $query);
    
     
     //$query = "SELECT * FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
     
     //unset($_POST);
     //unset($_POST);
     $_POST['schedClose'] = '';
     echo "postarray: ".$_POST['schedClose'];
     
    $rest_json = '';
    $_POST = json_decode($rest_json, true);
     
     //header('location: adminLogedInPage.php');
     header("Refresh:0");
        
    }
    else
    {
        echo "fail12345";
    }
        
 
 }
    
 
    
if($_POST[nameOfSchedule])
{
    

	if(!$_POST[nameOfSchedule])
	{
		$_SESSION['error'] .= "Name of schedule is required<br>";
	}
    
    for($i = 0; $i < sizeof($scheduleArray); $i++)
    {
        if($_POST[nameOfSchedule] == $scheduleArray[$i])
        {
            $_SESSION['error'] .= "Table Name is Already In Use<br>";
        }
    }

if($_SESSION['error'] == '')
{
    
            $query = "SELECT `username` FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            $enterUserName = str_replace(' ', '*', $row[0]);
            $enterNameOfSchedule = str_replace(' ', '', $_POST[nameOfSchedule]);
            $tableName = mysqli_real_escape_string($link,$enterUserName).$_SESSION['id'].mysqli_real_escape_string($link, $enterNameOfSchedule);

	echo "codecheck5252";
	echo $_SESSION['id'];

	$continue = true;
	$i = 1;
    
	while($continue) 
	{
		$query = "SELECT `sched".$i."` FROM `adminData` WHERE `id` = '".$_SESSION['id']."'";
		if($result = mysqli_query($link, $query))
		{
			echo "success";
			$row = mysqli_fetch_array($result);
			echo $row[0];
			if($row[0] == '')
			{
				$query = "UPDATE `adminData` SET sched".$i." = '".mysqli_real_escape_string($link, $_POST[nameOfSchedule])."' WHERE `id` = '".mysqli_real_escape_string($link, $_SESSION['id'])."'";
				//$query = "UPDATE `adminData` SET sched".$i." = '".mysqli_real_escape_string($link, $_POST[nameOfSchedule])."' WHERE id = '".$_SESSION['id']."' LIMIT 1";
				//$query = "UPDATE `adminData` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
				$continue = false;
            mysqli_query($link, $query); 
            $query = "CREATE TABLE ".$tableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP)"; 
            mysqli_query($link, $query); 
                
                header("Refresh:0");
                
 

				
			}
			else
			{
				echo "notemtpy";
                $i = $i+1;
			}
		}
		else
		{
			
			$query = "ALTER TABLE `adminData` ADD sched".$i." text";
				if(mysqli_query($link, $query))
				{
                    //$i = $i +1;
				$query = "UPDATE `adminData` SET sched".$i." = '".mysqli_real_escape_string($link, $_POST[nameOfSchedule])."' WHERE `id` = '".mysqli_real_escape_string($link, $_SESSION['id'])."'";
				//$query = "UPDATE `adminData` SET sched".$i." = '".mysqli_real_escape_string($link, $_POST[nameOfSchedule])."' WHERE id = '".$_SESSION['id']."' LIMIT 1";
				//$query = "UPDATE `adminData` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
				$continue = false;
            mysqli_query($link, $query);        
            $query = "CREATE TABLE ".$tableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP)"; 
            mysqli_query($link, $query); 
                    
            //$query = "CREATE TABLE ".$tableName." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,reg_date TIMESTAMP)"; 
            //mysqli_query($link, $query);  
                    
                header("Refresh:0");

                    
				}
				else
				{
					echo "fail3";
				}
                
		}
	}


}
}    
?>


<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="logginHeader">
    <a class="navbar-brand" href="%"> 

<?php if($userName == "")
{
    echo "Administration Schedule Home Page";
}
else
{
	echo $userName."'s Schedule Home Page";
}
 ?>

</a>
    
    <div class="pull-xs-right">
    
        <a href='adminLoginPage.php? logout=1'><button class="btn btn-success-outline" type="submit">Logout</button></a>
    
    </div>
</nav>
    
    
<div id="error"><?php if($_SESSION['error'] != "")
{
    echo '<div class="alert alert-danger" role="alert">There were error(s) in your form:<br>'.$_SESSION['error'].'</div>';
}
    ?>

<div id="loggedInContent">
    
    <table id="createNewScheduleTable" >
    <tr>
    <th>Create New Schedule</th>    
    </tr>
        
        <form method="post">
    <tr style="width:400px;">
        
    <td>Name Of Schedule: </td> <td>     
    <fieldset class="form_group">
    <input class="form-control scheduleInput" type="text" name="nameOfSchedule">
    </fieldset>
    </td>    

	
<td>
  <button type="submit" class="btn btn-primary">Submit</button></td>
        
        </tr>
</form>
       </table>
    <table id="scheduleDisplayTable">

        <tr><td><hr></td></tr>
        
        <tr><th>Edit Old Schedule</th></tr>
        <tr id="scheduleArray"></tr>
    
        </table>

    
</div>



<?php include("adminScheduleFooter.php"); ?>

