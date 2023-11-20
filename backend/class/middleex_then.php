<?php
include_once('function.php');
$condb = new DB_con();
$strExcelFileName="covid-RiskMiddleGroup-export.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

if($_POST['datef'] != '' && $_POST['datel'] != '' ){
    $datef = $_POST['datef'];
    $datel = $_POST['datel'];

    $export = $condb->Getmiddleex($datef, $datel);
}else{
    header("location: ../pages/middleex");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<center><h2>ความเสี่ยงปานกลาง(อ้างอิงตามมาตรการล่าสุด)</h2></center>
<?php $date = date("d-m-Y");?>
<br>
<h5 align="right">วันที่ออกรายงาน : <?=$date;?></h5>
<br>
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
<tr>
<td width="94" height="30" align="center" valign="middle" ><strong>วันที่</strong></td>
<td width="94" height="30" align="center" valign="middle" ><strong>เวลา</strong></td>
<td width="200" height="30" align="center" valign="middle" ><strong>ชื่อ-สกุล</strong></td>
<td width="200" align="center" valign="middle" ><strong>สังกัด</strong></td>
<td width="181" align="center" valign="middle" ><strong>เบอร์โทร</strong></td>
<td width="181" align="center" valign="middle" ><strong>อาการ</strong></td>
<td width="181" align="center" valign="middle" ><strong>อุณหภูมิ</strong></td>
<td width="185" align="center" valign="middle" ><strong>จังหวัดที่ไป</strong></td>
<td width="250" align="center" valign="middle" ><strong>สถานที่เสี่ยงที่เดินทางไป</strong></td>
<td width="280" align="center" valign="middle" ><strong>สถานที่อื่น ๆ </strong></td>
<td width="185" align="center" valign="middle" ><strong>เดินทางไปยังต่างประเทศ</strong></td>
<td width="185" align="center" valign="middle" ><strong>สัมผัสใกล้ชิดผู้ป่วยยืนยัน</strong></td>
<td width="185" align="center" valign="middle" ><strong>Timelineตรงกับผู้ป่วยยืนยัน</strong></td>
<td width="220" align="center" valign="middle" ><strong>ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน</strong></td>
<td width="185" align="center" valign="middle" ><strong>สถานะ</strong></td>
</tr>
<?php
    while ($row = $export->fetch_assoc()) {
        $date=$row['time'];
        $pro=$row['prowarningid'];
        $ab=$row['abroadid'];
        $pt=$row['patientcfid'];
        $pi=$row['patienttimeid'];
        $pn=$row['patientnearid'];
        $date1=substr($date,0,10);
        list($y,$m,$d)=explode('-',$date1);
        $time=substr($date,11,8);
?>
<?php
    if($pro=='1' and $ab=='0' and $pt=='0' and $pi=='0' and $pn=='0'){
?>
<tr>
<td height="25" align="center" valign="middle" ><?php echo$d.'/'.$m.'/'.$y;?></td>
<td height="25" align="center" valign="middle" ><?php echo$time;?></td>
<td align="center" valign="middle"><?php echo $row['fullname'];?></td>
<td align="center" valign="middle"><?php echo $row['miaf'];?></td>
<td align="center" valign="middle"><?php echo $row['tel'];?></td>
<td align="center" valign="middle"><?php echo $row['symptom'];?></td>
<td align="center" valign="middle"><?php echo $row['tempc'];?></td>
<td align="center" valign="middle"><?php echo $row['province'];?></td>
<td align="center" valign="middle"><?php echo $row['place'];?></td>
<td align="center" valign="middle"><?php echo $row['placeetc'];?></td>
<td align="center" valign="middle"><?php echo $row['abname'];?></td>
<td align="center" valign="middle"><?php echo $row['pcfcheck'];?></td>
<td align="center" valign="middle"><?php echo $row['pticheck'];?></td>
<td align="center" valign="middle"><?php echo $row['ptncheck'];?></td>
<td bgcolor="orange" align="center" valign="middle">เสี่ยงปานกลาง</td>
</tr>
<?php
}
    }
?>
</table>

<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>