<div class="container mainContainer">

    <div class="row">
    
    <div class="col-md-8">
        
        <h2>Recent Tweets</h2>
        
        <?php displayTweets('yourtweets');  ?>
        
    </div>
    
    <div class="col=md=4"></div>
        
        <?php
        displaySearch();
        echo "<hr>";
        displayTweetBox();
        ?>
    
    </div>



</div>