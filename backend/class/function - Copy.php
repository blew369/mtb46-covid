<?php
    class DB_con{
        private $server = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "mtbcovid_covid";
        public $conn;

        public function __construct(){
            try {
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function signin($username, $password){
            $stmt = $this->conn->prepare("SELECT CONCAT_WS(' ',logintb.name,logintb.lname) AS fullname, logintb.loginid, logintb.username , logintb.role FROM logintb WHERE username = ? AND password = ? ");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;

        }
        //export-กลุ่มเสี่ยงสูงสุด
        public function Getdangerex($datef,$datel){
            $stmt = $this->conn->prepare("SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                                    covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                                    place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                                    tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                                    abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                                    patient_near.patientnear, abroad.abroadid, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                                    patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname,covid_risk.riskid
                                    FROM covidlist
                                    LEFT JOIN place ON covidlist.placeid = place.placeid
                                    LEFT JOIN province ON covidlist.provinceid = province.provinceid
                                    LEFT JOIN symptom ON covidlist.symid = symptom.symid
                                    LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                                    LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                                    LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                                    LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                                    LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                                    LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                                    LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                                    LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                                    LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                                    LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                                    WHERE covidlist.datecome BETWEEN ? AND ? ORDER BY covidlist.coid ASC");
            $stmt->bind_param("ss", $datef,$datel);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;

        }
        //export-กลุ่มเสี่ยงปานกลาง
        public function Getmiddleex($datef,$datel){
            $stmt = $this->cnn->prepare("SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                                        covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                                        place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                                        tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                                        abroad.abroadid, abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                                        patient_near.patientnear, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                                        patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname, covid_risk.riskid
                                        FROM covidlist 
                                        LEFT JOIN place ON covidlist.placeid = place.placeid
                                        LEFT JOIN province ON covidlist.provinceid = province.provinceid
                                        LEFT JOIN symptom ON covidlist.symid = symptom.symid
                                        LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                                        LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                                        LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                                        LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                                        LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                                        LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                                        LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                                        LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                                        LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                                        LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                                        WHERE covidlist.datecome between ? AND ? ORDER BY covidlist.time ASC;");
            $stmt->bind_param("ss", $datef, $datel);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        //export-กลุ่มเสี่ยงต่ำ
        public function Getlowerex($datef, $datel){
            $stmt = $this->conn->prepare("SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                                        covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                                        place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                                        tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                                        abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                                        patient_near.patientnear, abroad.abroadid, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                                        patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname,covid_risk.riskid
                                        FROM covidlist
                                        LEFT JOIN place ON covidlist.placeid = place.placeid
                                        LEFT JOIN province ON covidlist.provinceid = province.provinceid
                                        LEFT JOIN symptom ON covidlist.symid = symptom.symid
                                        LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                                        LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                                        LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                                        LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                                        LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                                        LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                                        LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                                        LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                                        LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                                        LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                                        WHERE covidlist.datecome between ? AND ? ORDER BY covidlist.coid ASC;");
            $stmt->bind_param("ss", $datef, $datel);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;

        }
        //export-กลุ่มไม่เสี่ยง
        public function Getnonex($datef, $datel){
            $stmt = $this->conn->prepare("SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                                        covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                                        place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                                        tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                                        abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                                        patient_near.patientnear, abroad.abroadid, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                                        patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname,covid_risk.riskid
                                        FROM covidlist
                                        LEFT JOIN place ON covidlist.placeid = place.placeid
                                        LEFT JOIN province ON covidlist.provinceid = province.provinceid
                                        LEFT JOIN symptom ON covidlist.symid = symptom.symid
                                        LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                                        LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                                        LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                                        LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                                        LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                                        LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                                        LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                                        LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                                        LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                                        LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                                        WHERE covidlist.time between ? AND ? ORDER BY covidlist.coid ASC;");
            $stmt->bind_param("ss", $datef, $datel);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;

        }
        //export-ทุกกลุ่ม
        public function Getallex($datef, $datel){
            $stmt = $this->conn->prepare("SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                                        covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                                        place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                                        tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                                        abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                                        patient_near.patientnear, abroad.abroadid, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                                        patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname,covid_risk.riskid
                                        FROM covidlist
                                        LEFT JOIN place ON covidlist.placeid = place.placeid
                                        LEFT JOIN province ON covidlist.provinceid = province.provinceid
                                        LEFT JOIN symptom ON covidlist.symid = symptom.symid
                                        LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                                        LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                                        LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                                        LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                                        LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                                        LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                                        LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                                        LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                                        LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                                        LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                                        WHERE covidlist.datecome between ? AND ? ORDER BY covidlist.coid ASC;");
            $stmt->bind_param("ss", $datef, $datel);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;

        }
        //เรียกดูข้อมูลจังหวัด
        public function Getallprovince(){
            $query = "SELECT * FROM province WHERE status=1";
            $result = $this->conn->query($query);
            return $result;

        }
        //เรียกดูข้อมูลจังหวัด-Update
        public function provinceFetch($proid){
            $query = "SELECT * FROM province WHERE proid = '$proid'";
            $result = $this->conn->query($query);
            return $result;


        }
        //Update-จังหวัด
        public function provinceUpdate($province, $provincedesc, $prowarningid , $proid){
            $update = $this->conn->prepare("UPDATE province SET province = ?, provincedesc = ?, prowarningid = ? WHERE proid =?");
            $update->bind_param("ssss", $province, $provincedesc, $prowarningid , $proid);
            $update->execute();
            return $update;

        }
        //เรียกดูรูปภาพ
        public function GetallImg(){
            $query = "SELECT * FROM imgform";
            $result = $this->conn->query($query);
            return $result;
        }
        //เรียกดูรูปภาพ-Update
        public function fetchformimg($id){
            $query = "SELECT * FROM imgform WHERE id = '$id'";
            $result = $this->conn->query($query);
            return  $result;

        }
        //Update รูปภาพ
        public function UpdateformImg($imgname , $id){
            $un = $this->conn->query("SELECT imgname FROM imgform WHERE id = '$id'");
            if($un->num_rows >0){
                $data = $un->fetch_assoc();
                $imgform = $data['imgname'];
                @unlink('../../images/'. $imgform);

            }

            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $imgname['name']);
            $fileActExt = strtolower(end($extension));
            $filenew = rand(). "." . $fileActExt;
            $filepath = '../../images/'. $filenew;

            if(in_array($fileActExt, $allow)){
                if($imgname['size'] <5000000 & $imgname['error'] ==0){
                    if(move_uploaded_file($imgname['tmp_name'], $filepath)){
                        $query = "UPDATE imgform SET imgname = '$filenew' WHERE id = '$id'";
                        $result = $this->conn->query($query);
                        return $result;
                    }
                }

            }
        }
        //เรียกดูสิทธิ์
        public function fetchrole(){
            $query = "SELECT * FROM role";
            $result = $this->conn->query($query);
            return $result;
        }
        //เรียกดูข้อมูล Userreq
        public function fetchalluser(){
            $query = "SELECT CONCAT_WS(' ',logintb.name,logintb.lname) AS fullname, logintb.loginid, logintb.role FROM logintb WHERE status =1 ORDER BY logintb.loginid ASC";
            $result = $this->conn->query($query);
            return $result;
        }
        //เพิ่ม Userreq
        public function adminInsert($name, $lname, $username, $password, $role){
            $checkuser = $this->conn->query("SELECT * FROM logintb WHERE username = '$username'");
            if($checkuser->num_rows >0){
                echo"<script>alert('Username ของท่านเชื่อมโยงกับบัญชีอื่นแล้ว')</script>  ";
            }else{
                $result = $this->conn->prepare("INSERT INTO logintb (name, lname, username, password, role)VALUES(?, ?, ?, ?, ?)");
                $result->bind_param("sssss", $name, $lname, $username, $password, $role);
                $result->execute();
                return $result;
            }
        }
        //Update Userreq
        public function adminUpdate($name, $lname, $username, $password, $role, $loginid){
            $update = $this->conn->prepare("UPDATE logintb SET name = ?, lname = ?, username = ?, password = ?, role = ? WHERE loginid = ?");
            $update->bind_param("ssssss", $name, $lname, $username, $password, $role, $loginid);
            $update->execute();
            return $update;

        }
        //Delete ข้อมูล Userreq
        public function adminDelete($loginid){
            $stmt = $this->conn->prepare("DELETE FROM logintb WHERE loginid = ?");
            $stmt->bind_param("s", $loginid);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        //เรียกดูข้อมูล Userreq-Update
        public function adminFetch($loginid){
            $query = "SELECT * FROM logintb WHERE loginid ='$loginid'";
            $result = $this->conn->query($query);
            return $result;
        }
        // Check Username
        public function checkuser($username){
            $stmt = $this->conn->prepare("SELECT * FROM logintb WHERE username =?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        //บุคคลที่มีความเสี่ยงสูงสุด-ทั้งหมด
        public function dangerRequest(){
            $query = "SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                    covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                    place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                    tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                    abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                    patient_near.patientnear, abroad.abroadid, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                    patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname,covid_risk.riskid
                    FROM covidlist
                    LEFT JOIN place ON covidlist.placeid = place.placeid
                    LEFT JOIN province ON covidlist.provinceid = province.provinceid
                    LEFT JOIN symptom ON covidlist.symid = symptom.symid
                    LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                    LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                    LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                    LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                    LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                    LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                    LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                    LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                    LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                    LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                    ORDER BY covidlist.coid ASC";
            $result = $this->conn->query($query);
            return $result;
        }
        //บุคคลที่มีความเสี่ยงสูงสุด-วันนี้
        public function DangerfetchToday(){
            $query = "SELECT covidlist.prenameid, covidlist.datecome, CONCAT_WS(' ',prename.prename, covidlist.name,covidlist.lname) AS fullname , covidlist.miaf, 
                    covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, covidlist.placeetc, 
                    place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                    tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                    abroad.abdesc, abroad.abname, patient_confirm.patientcf, patient_timeline.patienttime, 
                    patient_near.patientnear, abroad.abroadid, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                    patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck, covid_risk.riskname,covid_risk.riskid
                    FROM covidlist
                    LEFT JOIN place ON covidlist.placeid = place.placeid
                    LEFT JOIN province ON covidlist.provinceid = province.provinceid
                    LEFT JOIN symptom ON covidlist.symid = symptom.symid
                    LEFT JOIN temp ON covidlist.tmpid = temp.tmpid
                    LEFT JOIN placewarning ON place.plgroup = placewarning.plgroup
                    LEFT JOIN prowarning ON province.prowarningid = prowarning.prowarningid
                    LEFT JOIN tempwarning ON temp.tmpgroup = tempwarning.tmpgroup
                    LEFT JOIN abroad ON covidlist.abroadid = abroad.abroadid
                    LEFT JOIN prename ON covidlist.prenameid = prename.prenameid
                    LEFT JOIN patient_confirm ON covidlist.patientcfid = patient_confirm.patientcfid
                    LEFT JOIN patient_timeline ON covidlist.patienttimeid = patient_timeline.patienttimeid
                    LEFT JOIN patient_near ON covidlist.patientnearid = patient_near.patientnearid
                    LEFT JOIN covid_risk ON patient_confirm.riskid = covid_risk.riskid
                    WHERE covidlist.datecome = CURDATE()
                    ORDER BY covidlist.coid ASC";
            $result = $this->conn->query($query);
            return $result;
        }


        public function CountAllRequest(){
            $query = "SELECT * FROM covidlist ORDER BY covidlist.coid ASC";
            $result = $this->conn->query($query);
            return $result;
        }

       
    }


?>