<?php
$id = $_POST['id'];
include_once('function.php');

$conDB = new Db_con();
$sql = $conDB->fetchformimg($id);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>