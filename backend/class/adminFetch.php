<?php
$loginid = $_POST['id'];
include_once('function.php');
$conDB = new Db_con();
$sql = $conDB->adminFetch($loginid);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>