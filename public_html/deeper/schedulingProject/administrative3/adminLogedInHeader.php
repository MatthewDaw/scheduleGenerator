


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      
            <style>




.form-control
{
    width: 500px;
    padding:20px;
    margin-top:10px;
    margin-bottom:10px;
    text-align:center;
          width: 500px ;
  margin-left: auto ;
  margin-right: auto ;
}

h1
{
    font-size:40px;
}

#journal
{
    height:1000px;
    width:100%;
    text-align:left;
}

#content
{
    margin-top:100px;
    text-align:center;
}

html { 
  background: url(../logInImage.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body
{
    background:none;
    margin:0px;
    padding:0px;  
}

#signUp
{
    display:none;
}

.toggleStyle
{
    background-color:white;
        width:200px;
    height:20p;
    margin:10px;
    border-radius:5px;
      margin-left: auto ;
  margin-right: auto ;    
}

.adminToggleForms
{
    background-color:white;
        width:200px;
    height:20p;
    margin:10px;
    border-radius:5px;
      margin-left: auto ;
  margin-right: auto ;    
}

p
{
    font-weight:bold;
}

#logginHeader
{
    
}
      

      #frontPageHead
{
    background-color:white;
    width:700px;
      margin-left: auto ;
  margin-right: auto ;
    border-radius:10px; 
}
                
#adminSignInPage
{
	display:none;
}

#error
{
	position:relative;
	top:25px;
}
                
#loggedInContent
{
    height:500px;
    width: 80%;
    background-color:white;
    margin-left: auto;
    margin-right: auto;
    border-radius:20px;
    padding-top:20px;


}
                
table, th, td {
    text-align:left;
    border: 1px solid black;
}
  
.addButton
{
    
}
                
.th
{
    text-decoration: underline;
    text-align:center;
}
                
#createNewScheduleTable
{
    text-align:left;
    width:75%;
    height:50px;
   
    margin-right: auto;
    text-decoration: underline;
}
                
#scheduleDisplayTable              
{
    text-align:left;
    width:100%;
    height:50px;
   
    margin-right: auto;
    text-decoration: underline;

}

#scheduleDataEntryTable
{
    text-align:left;

    
    margin-right: auto;
}
                
.btn-success-outline
{
    margin-left:10px;
}
                
                
#scheduleGeneratorContent
{
    height: 1000px;
    width: 85%;
    margin-left: auto;
    margin-right: auto;
    background-color:white;
    position:relative;
    top: 50px;
    border-radius:20px;
    padding:20px;
}
                
                
.scheduleInput
{
    height:10px;
    margin:10px;
}

     
.scheduleLinks
{
    text-decoration: none;
    float:left;
}
.scheduleLinkDiv
{
    height:200px;
    width:150px;
    border-radius:20px;
    padding:10px;
    border-style:solid;
    text-align:center;
    border-width:1px;
        
    
}
                
.scheduleDivHead
{
    text-decoration: underline;
    font-weight:bold;
}
                
.innerScheduleDivTable
{
    height:100%;
    width:100%;
  
    margin-left: auto;
    margin-right: auto;
      text-align:center;
}

      
      </style>
      
  </head>
    <body>
        
<?php
        
    $pageHead = '';

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

    }
    else
    {
        header("Location: adminLoginPage.php?");
    }





//include("adminLogedInHeader.php");
?>
        


