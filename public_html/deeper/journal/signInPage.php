<?php

    session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $error = "";    

    if (array_key_exists("logout", $_GET)) {

        $_SESSION['id'] = "";
        
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
    } else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
        
        header("Location: logedinPage.php");
        
    }

    if (array_key_exists("submit", $_POST)) {
        
        include("connection.php");      
        
        
        
        
        if (!$_POST['username']) {
            
            $error .= "An username address is required<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        } 
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            if ($_POST['signUp'] == '1') {
            
                $query = "SELECT id FROM `journal` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That username address is taken.";

                } else {

                    $query = "INSERT INTO `journal` (`username`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `journal` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);
                        echo "codeCheck1";
                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);

                        } 
$_POST['id'] = $row['id'];
                        header("Location: logedinPage.php");

                    }

                } 
                
            } else {
                    
                    $query = "SELECT * FROM `journal` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['id']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                           
                            $_SESSION['id'] = $row['id'];
                            $_POST['id'] = $row['id'];
                            
                            //echo $_SESSION['id'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                setcookie("id", $row['id'], time() + 60*60*24*365);

                            } 
                           //echo $_SESSION['id'];
                            header("Location: logedinPage.php");
                                
                        } else {
                            
                            $error = "That username/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That username/password combination could not be found.";
                        
                    }
                    
                }
            
        }
        
        
    }


?>



  
      
<?php include("header.php");?>
      
      
<div id="error"><?php if($error != "")
{
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
}
    ?>

</div>




    <div id="content"> 
        
            <div id="frontPageHead">
        <h1>MY ONLINE JOURNAL</h1></div>
        
        <p class="subText" ><strong style="background-color:white">Store your thoughts</strong></p>
<form method="post" id = "signUp">
    <p class="subText"><strong style="background-color:white">Enter Username and Password to Make Account</strong></p>
    <div class="center">

    <fieldset class="form_group">
    <input class="form-control" type="username" name="username" placeholder="Your username">
    </fieldset>
     
    <fieldset class="form_group">
    <input class="form-control" type="password" name="password" placeholder="Password">
    </fieldset>
    
    <div class="checkbox">
    <label>
        
    <div class="toggleStyle"><input type="checkbox" name="stayLoggedIn" value=1>
        Stay Signed In</div>
        
    </label>
    </div>
    
    <fieldset class="form_group">
    <input type="hidden" name="signUp" value="1">
    <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
    </fieldset>
    </div>
    
    <p><a class="toggleForms"><div class="toggleStyle">Go To Login Page</div></a></p>

</form>

 
<form method="post" id="logIn">

    <p class="subText" class="subText"><strong style="background-color:white">Log in with your username and password</strong></p>
    <div class="center">

    <fieldset class="form_group">
    <input class="form-control" type="username" name="username" placeholder="Your username">
    </fieldset>
        
    <fieldset class="form_group">
    <input class="form-control" type="password" name="password" placeholder="Password">
    </fieldset>
        
    <div class="checkbox">
    <label>
        <div class="toggleStyle">
    <input type="checkbox" name="stayLoggedIn" value=1>
        Stay Signed In</div>
    </label>
    </div>
        
    <fieldset class="form_group">
    <input type="hidden" name="signUp" value="0">
    <input class="btn btn-success" type="submit" name="submit" value="Log In!">
    </fieldset>
    </div>
    
    <p><a class="toggleForms"><div class="toggleStyle"><strong style="background-color:white">Go To Sign Up Page</strong></div></a></p>
        
</form>
      
    

<?php include("footer.php");?>





