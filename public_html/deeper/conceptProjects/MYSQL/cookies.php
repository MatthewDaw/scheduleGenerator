<?php

    //setcookie("customerID","1234",time() + 60 * 60 * 24);  //variable, value, experation time (in seconds)

    setcookie("customerID","",time() - 60 * 60 * 24);  //update time of cookie

    //update cookie: $_COOKIE["customerID"] = "test";
        
    echo $_COOKIE["customerID"];

?>