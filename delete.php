<?php
$id = $_GET["id"];
if(!$id) {
    echo "You need to specify ID!";
}else {
    $db = new mysqli("localhost", "root", "", "devriX");
    $result = $db->query("DELETE FROM jobs WHERE id = {$id}");
    header('Location:admin.php');
}

