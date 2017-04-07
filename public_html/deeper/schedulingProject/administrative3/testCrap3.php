  <?php

if($_POST['aValue'])
{
    echo $_POST['aValue'];
}

?>

<form method="POST" id="DeleteUserForm">
<input type="hidden" name="aValue" value="10" />
</form>

<form method="POST" id="emptyPostVariable">
<input type="hidden" name="aValue" value="" />
</form>

<button id='something'></button>

<button id='something2'></button>

<script>
    
document.getElementById('something').onclick = function()
{
    document.getElementById("DeleteUserForm").submit();
}

   
document.getElementById('something2').onclick = function()
{
    document.getElementById("emptyPostVariable").submit();
}



</script>
testcrap 3

