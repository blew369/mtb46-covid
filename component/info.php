<div class="card-header text-center bg-cyan text-white">
    <h5><b>รายงานผลการกรอกแบบฟอร์ม</b></h5>
    <h5><b>โรงพยาบาลค่ายอิงคยุทธบริหาร</b></h5>
</div>
<div class="card-body">
    <h6>ชื่อ&nbsp:&nbsp&nbsp<?php echo $data['prename']; ?><?php echo $data['name']; ?>&nbsp&nbsp<?php echo $data['lname']; ?></h6>
    <h6>สังกัด&nbsp:&nbsp<?php echo $data['miaf']; ?></h6>
    <h6>เบอร์ติดต่อ&nbsp:&nbsp<?php echo $data['tel']; ?></h6>
    <h6>อาการ&nbsp:&nbsp<b><?php echo $data['symptom']; ?></b></h6>
    <h6>จังหวัดที่ไป&nbsp:&nbsp<?php echo $data['province']; ?></h6>
    <h6>หมายเหตุ&nbsp:&nbsp <b><?php echo $data['provincedesc']; ?></b></h6>
    <h6>มีประวัติเดินทางไปยังต่างประเทศ :&nbsp<b><?php echo $data['abname'] ?></b></h6>
    <h6>สัมผัสใกล้ชิดผู้ป่วยยืนยัน COVID-19 :&nbsp<b><?php echo $data['pcfcheck'] ?></b></h6>
    <h6>Timelineตรงกับผู้ป่วยยืนยัน COVID-19 :&nbsp<b><?php echo $data['pticheck'] ?></b></h6>
    <h6>ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน COVID-19 :&nbsp<b><?php echo $data['ptncheck'] ?></b></h6>
    <h6>วัดไข้&nbsp:&nbsp<?php echo $data['tempc']; ?>&nbspองศา</h6>
    <h6>หมายเหตุ&nbsp:&nbsp<b><?php echo $data['tmpname']; ?></b></h6>
    <h6>วันที่ทำรายการ&nbsp:&nbsp<b><?php echo $d . '/' . $m . '/' . $y; ?></b></h6>
    <h6>เวลา : <b><?php echo $time; ?></b></h6>
    <div class="alert alert-info" role="alert">
        <center>
            <dl style="font-size:1.0rem;">
                <dt>คุณอยู่ในกลุ่มเสี่ยงปานกลาง ต้องกักกันตนเอง 14 วัน นับตั้งแต่วันที่ออกจากพื้นที่เสี่ยงหรือ ปฏิบัติตามคำแนะนำของ จนท.เวชกรรม หากมีอาการผิดปกติให้รีบติดต่อรักษาที่ รพ.ใกล้บ้านทันที</dt>
            </dl>
        </center>
    </div>
</div>