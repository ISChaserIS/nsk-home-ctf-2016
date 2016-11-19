<?php
    if(isset($_GET['name']) && isset($_GET['pass'])){
        if($_GET['name'] == 'root' && $_GET['pass'] == 'toor'){
            include("Admin.php");
	
        }
    }

?>

