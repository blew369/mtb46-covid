<?php
include_once('function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$id = $_POST['id'];
    $imgname = $_FILES['imgname'];
if($id !=''){
    $sql = $conDB->UpdateformImg($imgname , $id);
    echo "Success Fully";
} else{
    echo "Error";
}

?>