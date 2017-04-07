
<?php

include("functions.php");


displayTweetBox();

echo "<br><br>";

openClassData();
       

?>


<button id="postTweetButton" class="btn btn-primary">Post Tweet</button>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>




<script>


    
    $("#postTweetButton").click(function() {
       
        $.ajax({
            type: "POST",
            url: "functions.php?action=postTweet",
            data: "tweetContent=" + $("#tweetContent").val(),
            success: function(result) {
                
                alert(result);
            }
            
        })
        
    })
    
</script>