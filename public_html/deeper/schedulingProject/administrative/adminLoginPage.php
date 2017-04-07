<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
    $error = ""; 
    $_SESSION['currentPage'] = "adminLogInPage";

    if (array_key_exists("logout", $_GET)) {

        $_SESSION['id'] = "";
        
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
    } else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
        
        header("Location: adminLogedInPage.php");
        
    }

    if (array_key_exists("submit", $_POST)) {
        
        include("../connection.php");      
        
        
        
        include("../checkIfFormIsValid.php");
        
        checkIfValid();
        
        $error = $checkValue;
        
        if ($error != "") {
            $loginFail = true;
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            $loginFail = false;
            
            if ($_POST['signUp'] == '1') {
            
                $query = "SELECT id FROM `adminData` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That username address is taken.";

                } else {

                    $query = "INSERT INTO `adminData` (`username`, `password`,`state`,`district`,`school`) VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."', '".mysqli_real_escape_string($link, $_POST['state'])."', '".mysqli_real_escape_string($link, $_POST['district'])."', '".mysqli_real_escape_string($link, $_POST['schoolName'])."')";
                    
  
                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `adminData` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);

                       goToLoggedInPage();

                 

                    }

                } 
                
            } else {
                    //jump point
                goToLoggedInPage();             

                    
                }
            
        }
        
        
    }


    function goToLoggedInPage()
    {
        global $link;
                    $query = "SELECT * FROM `adminData` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
                
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
                            header("Location: adminLogedInPage.php");
        
                       
                            


                                
                        }
                        
                        
                        
                        else {
                            
                            $error = "That username/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That username/password combination could not be found.";
                        
                    }

    }


?>



  
      
<?php include("../logInHeader.php");?>
    



<div id="error"><?php if($error != "")
{
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
}
    ?>

</div>




<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="studLoginHeader">
    <a class="navbar-brand" href="%">My School Schedul Generator</a>
    
    <div class="pull-xs-right">
    
	<a href='../student/studLogInPage.php'><button class="btn btn-success-outline" type="submit" >Student Login/Sign Up</button></a>
        
    
    </div>
</nav>

    <div id="content">      

        

    
<div id="frontPageHead">
<form method="post" id = "signUp">

            
        <h1>Administration Sign Up Page</h1>


    <div class="center">

    <fieldset class="form_group">
    <input class="form-control" type="username" name="username" placeholder="Username">
    </fieldset>
     
    <fieldset class="form_group">
    <input class="form-control" type="password" name="password" placeholder="Password">
    </fieldset>
        
    <fieldset class="form_group">
    <input class="form-control" type="password" name="password2" placeholder="Verify Password">
    </fieldset>
        
        
    <fieldset class="form_group">
    <input class="form-control" type="text" name="state" placeholder="State">
    </fieldset>
        
    <fieldset class="form_group">
    <input class="form-control" type="text" name="district" placeholder="District">
    </fieldset>
        
    <fieldset class="form_group">
    <input class="form-control" type="text" name="schoolName" placeholder="School Name">
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

</form></div>

 <div id="frontPageHead">
<form method="post" id="logIn">


            
        <h1>Administration Log In Page</h1>

    <div class="center">

    <fieldset class="form_group">
    <input class="form-control" type="username" name="username" placeholder="Username">
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
        
</form></div>
    

<?php include("../logInFooter.php");?>





