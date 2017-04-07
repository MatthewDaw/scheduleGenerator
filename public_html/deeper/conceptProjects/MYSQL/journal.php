<?php

    if(array_key_exists("submit",$_POST))
    {
        $link = mysqli_connect("localhost","cl17-journal","emsx/C^7U","cl17-journal");
        
        if (mysqli_connect_error())
        {
            die("Connection Error");
        }
        
        $error = "";
        
        if(!$_POST['email'])
        {
            $error .= "An email address is required";
        }
        
        if(!$_POST['password'])
        {
            $password .= "A password is required";
        }
        
   if ($error != "")
        {
            $error = "<p>There were error(s) in your form: </p>".$error;
        }
        else
        {
            $query = "SELECT id FROM `users` WHERE email ='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link,$query);
            
            if (mysqli_num_rows($result) > 0)
            {
                $error = "That email address is taken.";
            }
            else
            {
                $query = "INSERT INTO `users` (`email`,`password`) VALUES (
                '".mysqli_real_escape_string($link,$_POST['email'])."'
                '".mysqli_real_escape_string($link,$_POST['password'])."'
                )";
                
                if (!mysqli_query($link,$query))
                {
                    $error = "<p>Could not sign you up - please try again later</p>";
                }
                else
                {
                    echo "sign up successful";
                }
            }
        }
    }

?>


<div id="error"><?php echo $error; ?></div>


<form method="post">

    <input type="email" name="email" placeholder="Your Email">
    
    <input type="password" name="password" placeholder="Password">
         
    <input type="checkbox" name="stayLoggedIn" value=1>
        
    <input type="submit" name="submit" value="Sign Up">

</form>
