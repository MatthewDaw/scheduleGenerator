<?php 
    $php_array = array("hi","yo","yoyo");
    //print_r($_GET);
    $number = $_GET['name'];
    echo $number;
    $number = $number + 1;
    echo $number;
    ?>   


<button type="button" id="button">Click Me!</button>





<script>
document.getElementById("button").onclick = function()

{
    
  var javascriptVariable = "123";
  window.location.href = "http://79.170.40.172/matthewbradleydaw.com/phpConnections/practice3.php?name=" + javascriptVariable; 
    
}
    
</script>

<script type="text/javascript">
//var jvalue = 2;


    var tempArray = <?php echo json_encode($php_array); ?>;
    //document.write(tempArray[1]);
    
    


</script>
