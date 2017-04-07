

<?php

    //server name (IP address or localhost if on same server), database username, password 
    $link = mysqli_connect("localhost","cl17-users-ws1","y^MU^J!Xj","cl17-users-ws1");

    if(mysqli_connect_error())//error check shower
    {
        die("There was an error");
        
    }

    //$query = "INSERT INTO users(`email`,`password`) VALUES('tss@email','sdfjsddddgs')";
    $query = "UPDATE `users` SET email = 'newEmail@email.com' WHERE id = 5 LIMIT 1";
    mysqli_query($link,$query);




    $query = "SELECT * FROM users WHERE email='anotheremail@email'"; //can use LIKE instead of = to get part of string. use %p% to find everyint with P can use < or > instead of =
                                                                     // can use &    use \ to read character literally for php  use mysqli_real_escape_string($link,$name) to read
                                                                     // literally in sql 

    if ($result = mysqli_query($link,$query))
    {
        //$row = mysqli_fetch_array($result);
        
        //echo $row[0]; //can use $row['email'];
        
        
    while($row = mysqli_fetch_array($result))
    {
        print_r($row);
    }
        

    }
    else
    {
        echo "failure";
    }
    


?>