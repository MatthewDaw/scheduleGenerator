<?php

    session_start();

    $diaryContent = '';

    echo $_SESSION['id'];

    if (array_key_exists("id",$_COOKIE) AND $_COOKIE['id']) //turn cookie into session
    {
       $_SESSION['id'] = $_COOKIE['id'];
    }
    echo ($_POST['id']);

    if(array_key_exists("id",$_SESSION) AND $_SESSION['id'])
    {
        echo "<p>Logged In <a href='studLogInPage.php? logout=1'>Log Out </a></p>";
        
        include("connection.php"); 
        
        $query = "SELECT `journalContent` FROM `journal` WHERE id = ".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
            
        $row = mysqli_fetch_array(mysqli_query($link,$query));
                                  
        $diaryContent = $row['journalContent'];
    }
    else
    {
        header("Location: studLogInPage.php?");
    }


include("studLogedInHead.php");
include("studLoginAction.php");


?>

<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="logginHeader">
    <a class="navbar-brand" href="%">Student Schedule Input Page</a>
    
    <div class="pull-xs-right">
    
        <a href='studLogInPage.php? logout=1'><button class="btn btn-success-outline" type="submit">Logout</button></a>
    
    </div>


</nav>


<div class="container-fluid" id="containerLoggedInPage">

    <div id="loggedInContent">sdfs</div>

</div>



<h1>Schedules</h1>
 <hr>   

<div id='availableSchedules'>  

    
</div>



<?php 
//include("../logInFooter.php"); 
include("studLogedInFoot.php");
?>
