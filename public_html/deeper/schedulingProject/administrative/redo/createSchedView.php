<nav class="navbar navbar-light bg-faded navbar-fixed-top" id="logginHeader">
    <!--<a class="navbar-brand" href="%"><span id="pLogginHeader"></span>Administration Schedule Generator Page</a>-->

    <a class="navbar-brand" href="%"> 

<?php if($_SESSION['workingUser'] == "")
{
    echo "Administration Schedule Generator Page";
}
else
{
	echo $_SESSION['workingUser']."'s Schedule Generator Page";
}



 ?>

</a>
    
    <div class="pull-xs-right">
    
        <a href='http://79.170.40.172/matthewbradleydaw.com/deeper/schedulingProject/administrative/redo/settings.php'><button class="btn btn-success-outline" type="submit">Settings</button></a>
        <a href='http://79.170.40.172/matthewbradleydaw.com/deeper/schedulingProject/administrative/adminLogedInPage.php'><button class="btn btn-success-outline" type="submit">Return To Home</button></a>
        <a href='http://79.170.40.172/matthewbradleydaw.com/deeper/schedulingProject/administrative/adminLoginPage.php? logout=1'><button class="btn btn-success-outline" type="submit">Logout</button></a>
    
    </div>
</nav>

<div id='output'>
hi

</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
    
    var something = 2;
            $.ajax({
            type: "POST",
            url: "createSchedActions.php?action=initialOutput",
            data: "numOfStudents=" + something,
            success: function(result) {
                
                alert('howdyhey');
                 $("#output").html(result);
            }
        })


</script>