<?php
include_once('function.php');
$conDB = new Db_con();
$loginid = $_POST['id'];  

$sql = $conDB->adminDelete($loginid);
?>