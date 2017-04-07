<?php

    session_start();

    if (array_key_exists("id",$_COOKIE)) //turn cookie into session
    {
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if(array_key_exists("id",$_SESSION))
    {
        echo "<p>Logged In <a href='loginPage.php? logout=1'>Log Out </a></p>";
    }
    else
    {
        header("Location: studentSignInPage.php?");
    }

?>