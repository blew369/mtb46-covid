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

        public function getPrename(){
            $query = "SELECT * FROM prename WHERE status =1";
            $result = $this->conn->query($query);
            return $result;
        }

        public function getSymptom(){
            $query = "SELECT * FROM symptom WHERE status =1";
            $result = $this->conn->query($query);
            return $result;
        }

        public function getTemp(){
            $query = "SELECT * FROM temp WHERE status =1";
            $result = $this->conn->query($query);
            return $result;
        }

        public function getProvince(){
            $query = "SELECT * FROM province WHERE status =1";
            $result = $this->conn->query($query);
            return $result;
        }

        public function getPlace(){
            $query = "SELECT * FROM place WHERE status =1";
            $result =$this->conn->query($query);
            return $result;
        }

        public function InsertCovidReq($prename, $name, $lname, $miaf, $tel, $symp, $temp, $province, $place, $placeetc, $abroadid, $patientcfid, $patienttimeid, $patientnearid){
            $result = $this->conn->prepare("INSERT INTO covidlist (prenameid, name, lname, miaf, tel, symid, tmpid, provinceid, placeid, placeetc, abroadid, patientcfid, patienttimeid, patientnearid)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $result->bind_param("ssssssssssssss", $prename, $name, $lname, $miaf, $tel, $symp, $temp, $province, $place, $placeetc, $abroadid, $patientcfid, $patienttimeid, $patientnearid);
            $result->execute();
            $lastid = $this->conn->insert_id;
            $_SESSION['lastid'] = $lastid;

            if($result){
                echo header("location:report?req=$lastid");
            }
            return $result;

        }

        public function GetlastRequest($lastid){
            $stmt = $this->conn->prepare("SELECT covidlist.prenameid, covidlist.datecome, covidlist.name, covidlist.lname, covidlist.miaf, 
                                                covidlist.tel, symptom.symptom, temp.tempc, temp.tempdesc, province.province, place.place, 
                                                place.placedesc, province.provincedesc, covidlist.coid,placewarning.plname, prowarning.prowaringdesc, 
                                                tempwarning.tmpname, covidlist.time, province.prowarningid, temp.tmpgroup, symptom.sympgroup, 
                                                abroad.abroadid, abroad.abdesc, abroad.abname, prename.prename, patient_confirm.patientcf, patient_timeline.patienttime, 
                                                patient_near.patientnear, patient_confirm.patientcfid, patient_timeline.patienttimeid, patient_near.patientnearid, 
                                                patient_confirm.pcfcheck, patient_timeline.pticheck, patient_near.ptncheck
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
                                                WHERE covidlist.coid= ? limit 1");
            $stmt->bind_param("s", $lastid);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;                                    

        }
        public function GetallImg(){
            $query = "SELECT * FROM imgform";
            $result = $this->conn->query($query);
            return $result;
        }
    }

    


?>