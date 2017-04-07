<?php

    $link = mysqli_connect("localhost", "cl17-sched", "WqC7n^sxc", "cl17-sched");

    if (mysqli_connect_error()) {

        die ("There was an error connecting to the database");

    } 
        if ($_POST['username'] == '') {
            
            echo "<p>username address is required.</p>";
            
        } else if ($_POST['password'] == '') {
            
            echo "<p>Password is required.</p>";
            
        } else {
            
            $query = "SELECT `id` FROM `students` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p>That username address has already been taken.</p>";
                
            } else {
                
                $query = "INSERT INTO `students` (`username`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<p>You have been signed up!";
                    
                } else {
                    
                    echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                }
                
            }
            
        }
        
        
    

    


?>

<form method = "post">

    <input name="username" type="text" placeholder="username address">
    
    <input name="password" type="password" placeholder="Password">
    
    <input type="submit" value = "Sign up">

</form>