<?php 
$db = new mysqli("localhost", "root", "", "devriX");
$result = $db -> query("UPDATE jobs SET title = '$_POST[title]', description = '$_POST[description]', company = '$_POST[company]', salary = '$_POST[salary]' WHERE id = '$_POST[id]'");
header('Location:admin.php');