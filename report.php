<?php
session_start();
$lastid = $_GET['req'];
include_once('class/function.php');
$condb = new Db_con();

$req = $condb->GetlastRequest($lastid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>สรุปผลการกรอกแบบฟอร์ม</title>
    <style>
        .blink-text {
            text-decoration: blink
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <i class="fa fa-building"> &nbsp; </i>MTB46-CHANA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
                <ul class="navbar-nav align-items-end">
                    <li class="nav-item">
                        <a class="nav-link" href="form">ทำแบบฟอร์อม</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container col-lg-6 col-md-8 col-xs-auto mt-3">
        <div class="card">
            <?php
            while ($data = $req->fetch_assoc()) {
                $date = $data['time'];
                $date1 = substr($date, 0, 10);
                list($y, $m, $d) = explode('-', $date1);
                $time = substr($date, 11, 8);
                $day = "วันที่";
                $pro = $data['prowarningid'];
                $tmp = $data['tmpgroup'];
                $sym = $data['sympgroup'];
                $abroad = $data['abroadid'];
                $ptcf = $data['patientcfid'];
                $pttime = $data['patienttimeid'];
                $ptnear = $data['patientnearid'];
            ?>
                <?php
                /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                if ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 02 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 03 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 04 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 05 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 06 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 07 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 08 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 09 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 10 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 11 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 12 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 13 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 14 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 15 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>
                    <!-- มีไข้ อยู่จังหวัดเสี่ยง มีอาการ ไปต่างประเทศหรือสัมผัสกับผู้ป่วยcovid-19 อย่างใดอย่างหนึ่ง -->
                    <!-------------------------------- END --------------------------------------->
                    <!-------------------------------- BEGIN จังหวัดไม่เสี่ยงแต่ มีไข้ มีอาการ ใกล้ชิดโควิด-19 --------------------------------------->

                <?php
                    /// 16 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 17 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 18 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 19 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 20 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 21 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 22 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 23 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 24 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 25 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 26 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 27 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 28 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 29 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 30 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                    <!----------------------------------------END---------------------------------------->
                    <!--------------------------------------Begin อยู่ในจังหวัดเสี่ยง แต่ไม่มีไข้ มีอาการ ใกล้ชิดโควิด-19 --------------------------------------->
                <?php
                    /// 31 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 32 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 33 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 34 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 35 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 36 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 37 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 38 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 39 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 40 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 41 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 42 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 43 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 44 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 45 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 46 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 47 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 48 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 49 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 50 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 51 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 52 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 53 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 54 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 55 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 56 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 57 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 58 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 59 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 60 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                    <!---------------------------- END ---------------------->

                    <!---------------------------- BEGIN ไม่อยู่ในจังหวัดเสี่ยง ไม่มีไข้ ไม่มีอาการ -------------->
                <?php
                    /// 61 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 62 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0001
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, เดินทางไปต่างประเทศ, สัมผัสใกล้ชิดกับผู้ป่วย, มีTimeline ตรงกับผู้ป่วยยืนยัน, อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0010
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 0เดินทางไปต่างประเทศ, 0สัมผัสใกล้ชิดกับผู้ป่วย, 0มีTimelineตรงกับผู้ป่วยยืนยัน, 1อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0011
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0100
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0101
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0110
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 0111
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '1' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1000
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1001
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1010
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1011
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '0' and $pttime == '1' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1100
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1101
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '0' and $ptnear == '1') {
                ?>
                    <?php require('component/red.php'); ?>
                <?php
                    /// 01 เงื่อนไข 1.1 อยู่ใน9จังหวัดเสี่ยงสูงสุด, มีอาการ, มีไข้, 1เดินทางไปต่างประเทศ, 1สัมผัสใกล้ชิดกับผู้ป่วย, 1มีTimelineตรงกับผู้ป่วยยืนยัน, 0อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน 1110
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '1' and $ptcf == '1' and $pttime == '1' and $ptnear == '0') {
                ?>
                    <?php require('component/red.php'); ?>

                <?php
                } elseif ($pro == '1' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/orange.php'); ?>

                <?php
                } elseif ($pro == '1' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/orange.php'); ?>

                <?php
                } elseif ($pro == '1' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/orange.php'); ?>

                <?php
                } elseif ($pro == '1' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/orange.php'); ?>

                <?php
                } elseif ($pro == '0' and $tmp == '1' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/yellow.php'); ?>
                <?php
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/yellow.php'); ?>
                <?php
                } elseif ($pro == '0' and $tmp == '1' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/yellow.php'); ?>

                <?php
                } elseif ($pro == '0' and $tmp == '0' and $sym == '1' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/yellow.php'); ?>
                <?php
                } elseif ($pro == '0' and $tmp == '0' and $sym == '0' and $abroad == '0' and $ptcf == '0' and $pttime == '0' and $ptnear == '0') {
                ?>
                    <?php require('component/green.php'); ?>

            <?php  }else if ($lastid == 0){
                echo "มีบางอย่างผิดพลาดโปรดกรอกแบบฟอร์มใหม่อีกครั้ง";
            }

            } 
            ?>



        </div>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-12 mb-0 text-muted">© MTB46-CHANA, โรงพยาบาลค่ายอิงคยุทธบริหาร มณฑลทหารบกที่46</p>
        </footer>
    </div>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
</body>

</html>