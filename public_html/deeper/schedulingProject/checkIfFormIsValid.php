<?php


$checkValue = '';

function checkIfValid()
{
    
    global $checkValue;
    //echo $_POST["submit"];
    
    if (!$_POST['username']) {
            
            $checkValue = "An username address is required<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $checkValue .= "A password is required<br>";
            
        } 
    

        
        if($_POST['signUp'] == '1')
        {
            
                    if(!$_POST['password2'])
            {
                $checkValue .= "Password varifaction is required<br>";
            }
    
                if($_POST['password'] != $_POST['password2'])
            {
                $checkValue .= "Passwords do not match<br>";
            }
            
            if (!$_POST['state']) {

                $checkValue .= "A state is required<br>";

            } 

            if (!$_POST['district']) {

                $checkValue .= "A district is required<br>";

            } 
            
            if (!$_POST['schoolName']) {

                $checkValue .= "A school Name is required<br>";

            }
            
    if($_SESSION['currentPage'] == "studLogInPage")
    {
        if(!$_POST['grade'])
        {
            $checkValue .= "A grade is required<br>";
        }
        else if(!is_numeric($_POST['grade']))
        {
            $checkValue .= "Grade must be a value between 0 and 13<br>";
        }
        else
        {
            if(!($_POST['grade'] < 13))
            {
                $checkValue .= "Grade must be less than 13<br>";
            }
            if(!($_POST['grade'] > 0))
            {
                  $checkValue .= "Grade must be more than 0<br>";  
            }
               
        }
    }
            

            
        }
    

    

}



?>