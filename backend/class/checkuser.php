<?php
include_once('function.php');

$usernamecheck = new DB_con();
// Get post value

$username = $_POST['username'];

$sql= $usernamecheck->checkuser($username);

$numrows = $sql->num_rows;

if($numrows > 0){
    echo "<span style='color: red;'>ชื่อผู้ใช้นี้ นี้ถูกเชื่อมโยงกับบัญชีอื่นแล้ว.</span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    echo "<span style='color: green;'>ชื่อผู้ใช้นี้ สามารถใช้ลงทะเบียนได้.</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>