<?php
$db = new mysqli("localhost", "root", "", "devriX");
$result = $db -> query("INSERT INTO jobs (title, description, company, salary) VALUES ('$_POST[title]', '$_POST[description]', '$_POST[company]', '$_POST[salary]')");
header('Location:index.php');