<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <link rel="stylesheet" href="http://79.170.40.172/matthewbradleydaw.com/deeper/twitterProject/styles.css">
  </head>
  <body>
      
      <nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="http://79.170.40.172/matthewbradleydaw.com/deeper/twitterProject/">Matthew Daw's Twitter Clone</a>
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="?page=timeline">Home Page</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=yourtweets">Your Tweets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
    </li>
  </ul>
  <div class="form-inline pull-xs-right">
      
      <?php if($_SESSION['id']) { ?>
           <a class="btn btn-success-outline" href = "?function=logout">Logout</a>
    <?php    } else { ?>
          <button class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">Login/Signup</button>
     
      <?php } ?>

    
      
  
  </div>
</nav>