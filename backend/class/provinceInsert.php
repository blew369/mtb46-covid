<?php
include_once('function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$proid = $_POST['proid'];


$province = $_POST['province'];
$provincedesc = $_POST['provincedesc'];
$prowarningid = $_POST['prowarningid'];


if($proid !=''){
    echo "Success Fully";
    $sql = $conDB->provinceUpdate($province, $provincedesc, $prowarningid , $proid);
} else{
    echo "Error";
}

?>