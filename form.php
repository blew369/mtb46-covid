<?php
session_start();
include_once('class/function.php');
$condb = new Db_con();
if (isset($_POST['submit'])) {

    $prename = $_POST['prenameid'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $miaf = $_POST['miaf'];
    $tel = $_POST['tel'];
    $symp = $_POST['symid'];
    $temp = $_POST['tmpid'];
    $province = $_POST['provinceid'];
    $place = $_POST['placeid'];
    $placeetc = $_POST['placeetc'];
    $abroadid = $_POST['abroadid'];
    $patientcfid = $_POST['patientcfid'];
    $patienttimeid = $_POST['patienttimeid'];
    $patientnearid = $_POST['patientnearid'];

    $insertreq = $condb->InsertCovidReq($prename, $name, $lname, $miaf, $tel, $symp, $temp, $province, $place, $placeetc, $abroadid, $patientcfid, $patienttimeid, $patientnearid);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มคัดกรองโควิด19</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="formasset/css/bootstrap.css">
    <script src="formasset/js/jquery-3.3.1.slim.min.js"></script>
    <script src="formasset/js/popper.min.js"></script>
    <script src="formasset/js/bootstrap.min.js"></script>

    <!-- Search Select -->
    <link rel="stylesheet" href="formasset/dist/css/bootstrap-select.css">
    <script src="formasset/dist/js/bootstrap-select.js"></script>
    <link rel="stylesheet" href="assets/fonts/font.css">

    <!-- Icon -->
    <link href="formasset/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="form">
                <i class="fa fa-building"> &nbsp; </i>MTB46-CHANA</a>
        </div>
    </nav>

    <div class="container col-lg-9 col-md-12 col-xs-auto mt-5">
        <div class="card">
            <div class="card-header text-center text-white bg-melon">
                แบบฟอร์มคัดกรองCovid19 MTB46-ชนะ
            </div>
            <?php
            $sql = $condb->GetallImg();
            while($row = $sql->fetch_assoc()){
            $path = "images/";
            ?>
            <img src="<?php echo $path.$row['imgname'];?>"  class="card-img-top" alt="">
            <?php 
            }
            ?>
            <div class="card-body">
                <form  method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Pname">ยศฯ - คำนำหน้า</label> <br>
                            <select id="prenameid" name="prenameid" class="selectpicker" data-live-search="true" required>
                                <?php
                                $prename = $condb->getPrename();
                                ?>
                                <option value="">เลือก</option>
                                <?php
                                while ($row = $prename->fetch_assoc()) { ?>
                                    <option value="<?= $row['prenameid']; ?>"><?php echo $row['prename']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fname">ชื่อ</label>
                            <input type="text" class="form-control" id="name" name="name" step="0.01" placeholder="ชื่อ" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lname">นามสกุล</label>
                            <input type="text" class="form-control" id="lname" name="lname" step="0.01" placeholder="นามสกุล" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Subname">สังกัด <font color="red">*กรณีไม่มีสังกัดทางราชการ ให้กรอก"พลเรือน"</font></label>
                            <input type="text" class="form-control" id="miaf" name="miaf" step="0.01" placeholder="สังกัด" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tel">เบอร์ติดต่อ</label>
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="เบอร์โทร" required onkeypress="check_key_number();">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Symptom">อาการผิดปกติ</label><br>
                            <select id="symid" name="symid" class="selectpicker" required>
                                <?php
                                $symptom = $condb->getSymptom();
                                ?>
                                <option value="">เลือก</option>
                                <?php
                                while ($row = $symptom->fetch_assoc()) { ?>
                                    <option value="<?= $row['symid']; ?>"><?php echo $row['symptom']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Temp">อุณหภูมิวัดไข้</label><br>
                            <select id="tmpid" name="tmpid" class="selectpicker" required>
                                <?php
                                $temp = $condb->getTemp();
                                ?>
                                <option value="">เลือก</option>
                                <?php
                                while ($row = $temp->fetch_assoc()) { ?>
                                    <option value="<?= $row['tmpid']; ?>"><?php echo $row['tempc']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Other"> ในช่วง 14 วันที่ผ่านมาท่านได้เดินทางผ่านจังหวัดเสี่ยงใด?</label>
                            <label for="Other">
                                <font color="red">หากมี</font> "กรุณาเลือกจังหวัดที่เสี่ยงที่สุด"
                            </label>
                            <label for="Other">
                                <font color="red">*หากไม่ได้เดินทางออกนอกจังหวัดกรุณาระบุ “ไม่ได้เดินทาง”</font>
                            </label>
                            <label for="Other">
                                <font color="red">หมายเหตุ* งดการเดินทาง เข้า-ออก จังหวัด</font>
                            </label>
                            <label for="Other">
                                <font color="red">นับตั้งแต่ วันที่ 28 เมษายน 2564</font>
                            </label><br>
                            <select id="provinceid" name="provinceid" class="selectpicker" data-live-search="true" required>
                                <?php
                                $province = $condb->getProvince();
                                ?>
                                <option value="">เลือก</option>
                                <?php
                                while ($row = $province->fetch_assoc()) { ?>
                                    <option value="<?= $row['provinceid']; ?>"><?php echo $row['province']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="Other">สถานที่เสี่ยงต่อการแพร่ระบาดที่คุณได้เดินทางไปในช่วง14วันที่ผ่านมา </label>
                            <label for="Other">
                                <font color="red">หากมี</font> กรุณาเลือกสถานที่ที่เสี่ยงที่สุด
                            </label>
                            <label for="Other">
                                <font color="red">*ยกตัวอย่าง เช่น บ่อนการพนัน, สนามมวย, สถานบันเทิง, ตลาดสด </font>
                            </label>
                            <select id="placeid" name="placeid" class="selectpicker" required>
                                <?php
                                $place = $condb->getPlace();
                                ?>
                                <option value="">เลือก</option>
                                <?php
                                while ($row = $place->fetch_assoc()) { ?>
                                    <option value="<?= $row['plid']; ?>"><?php echo $row['place']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                    
                            <label class='checkbox-inline'>
                                <input type='checkbox' name='placeid' id='visto' value='3'>
                                <font color="red"> *หากมีรายละเอียดเพิ่มเติม โปรดระบุ"</font>
                            </label>
                            <input type="text" class="form-control" id="save" name="placeetc" step="0.01" placeholder="รายละเอียดเพิ่มเติม" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Other">ในช่วง14วันที่ผ่านมา</label>
                            <label for="Other">คุณมีประวัติเดินทางไปยังต่างประเทศ ใช่หรือไม่?</label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='abroadid' id='abroadid' value='1' required>&nbsp<font color="black" >ใช่</font>&nbsp
                            </label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='abroadid' id='abroadid' value='0' required>&nbsp<font color="black" >ไม่</font>&nbsp
                            </label>
                        </div>
                        <!-- Patient Confirm -->
                        <div class="form-group col-md-4">
                            <label for="Other">ในช่วง14วันที่ผ่านมา คุณสัมผัสใกล้ชิดผู้ป่วยยืนยัน COVID-19 ใช่หรือไม่?</label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='patientcfid' id='patientcfid' value='1' required>&nbsp<font color="black" >ใช่</font>&nbsp
                            </label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='patientcfid' id='patientcfid' value='0' required>&nbsp<font color="black" >ไม่</font>&nbsp
                            </label>
                        </div>
                        <!-- Patient Timeline -->
                        <div class="form-group col-md-4">
                            <label for="Other">ในช่วง14วันที่ผ่านมา คุณมี Timeline ตรงกับผู้ป่วยยืนยัน COVID-19 ใช่หรือไม่?</label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='patienttimeid' id='patienttimeid' value='1' required>&nbsp<font color="black" >ใช่</font>&nbsp
                            </label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='patienttimeid' id='patienttimeid' value='0' required>&nbsp<font color="black" >ไม่</font>&nbsp
                            </label>
                        </div>
                    </div>
                    <!-- Patient Near -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Other">ในช่วง14วันที่ผ่านมา คุณอยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน COVID-19 ใช่หรือไม่?</label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='patientnearid' id='patientnearid' value='1' required>&nbsp<font color="black" >ใช่</font>&nbsp
                            </label><br>
                            <label class='checkbox-inline'>
                                <input type='radio' name='patientnearid' id='patientnearid' value='0' required>&nbsp<font color="black" >ไม่</font>&nbsp
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary">บันทึก <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <p style="font-size:18px;">กรุณากรอกข้อมูลตามความเป็นจริงเพื่อประโยชน์ของท่าน </p>
            </div>
        </div>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-12 mb-0 text-muted">© MTB46-CHANA, โรงพยาบาลค่ายอิงคยุทธบริหาร มณฑลทหารบกที่46</p>
        </footer>
    </div>
    <script>
        $(document).ready(function() {
            $('#save').prop('disabled', true);

            $('#visto').click(function() {
                if ($(this).is(':checked')) {
                    $('#save').prop('disabled', false);
                } else {
                    $('#save').prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#symsave').prop('disabled', true);

            $('#symetcNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#symsave').prop('disabled', false);
                } else {
                    $('#symsave').prop('disabled', true);
                }
            });
        });
    </script>

    <script language="JavaScript" type="text/JavaScript">
        function check_key_number() {
    use_key=event.keyCode
    if (use_key != 13 && (use_key < 48) || (use_key > 57)) {
    event.returnValue = false;
    }
    }
  </script>

  
</body>

</html>