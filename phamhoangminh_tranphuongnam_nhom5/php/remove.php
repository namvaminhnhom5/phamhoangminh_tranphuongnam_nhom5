<?php 
require_once './db.php';
$id = $_GET['id'];

$sql = "delete from users where id = $id";

executeQuery($sql);
header('location: index.php');
 ?>