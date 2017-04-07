<div class="container mainContainer">

    <div class="row">
    
    <div class="col-md-8">
        
        <?php if($_GET['userid']) { ?> 

        <?php displayTweets($_GET['userid']); ?>
        
        <?php } else { ?>
        
        
        <h2>Action Users</h2>
        
        <?php displayUsers(); ?>
        
        
        <?php } ?>
        
 
        
        <?php //displayTweets('public');  ?>
        
    </div>
    
    <div class="col=md=4"></div>
        
        <?php
        displaySearch();
        echo "<hr>";
        //displayTweetBox();
        ?>
    
    </div>



</div>