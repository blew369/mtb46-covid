<?php
$proid = $_POST['id'];
include_once('function.php');

$conDB = new Db_con();
$sql = $conDB->provinceFetch($proid);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>