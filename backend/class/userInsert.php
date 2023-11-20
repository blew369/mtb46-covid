<?php
include_once('function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$loginid = $_POST['loginid'];  
$username =  $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$lname = $_POST['lname'];
$role = $_POST['role'];

  if($loginid !=''){
    $sql = $conDB->adminUpdate($name, $lname, $username, $password, $role, $loginid);
  }else{
    $sql = $conDB->adminInsert($name, $lname, $username, $password, $role);
  }
  

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>