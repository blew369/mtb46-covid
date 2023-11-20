<?php
include_once('../class/function.php');
session_start();
$condb = new DB_con();
if ($_SESSION['username'] == "") {
    header("location:signin");
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DashBoard</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-clinic-medical"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MTB46 <sup>CHANA</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index">
                    <i class="fas fa-home"></i>
                    <span>หน้าแรก</span></a>
            </li>
            <?php
            if ($_SESSION['role'] == "admin") {

            ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    เมนูจัดการ
                </div>
                <!-- Nav Item - Utilities Collapse Menu -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>เครื่องมือจัดการ</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">รายการ</h6>
                            <a class="collapse-item" href="pvmanage"><i class="fas fa-edit"></i> จัดการข้อมูลจังหวัด</a>
                            <a class="collapse-item" href="formimg"><i class="fas fa-edit"></i> จัดการรูปภาพหน้าForm</a>
                            <a class="collapse-item" href="usermanage"><i class="fas fa-edit"></i> USER-MANAGE</a>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Export-Excel
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>รายการEXPORT</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">รายการ</h6>
                        <a class="collapse-item" href="dangerex"><i class="fas fa-file-alt"></i> กลุ่มเสี่ยงสูงสุด</a>
                        <a class="collapse-item" href="middleex"><i class="fas fa-file-alt"></i> กลุ่มเสี่ยงปานกลาง</a>
                        <a class="collapse-item" href="lowerex"><i class="fas fa-file-alt"></i> กลุ่มเสี่ยงต่ำ</a>
                        <a class="collapse-item" href="nonex"><i class="fas fa-file-alt"></i> กลุ่มไม่เสี่ยง</a>
                        <a class="collapse-item" href="allex"><i class="fas fa-file-alt"></i> ทุกกลุ่ม</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>&nbsp;
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname']; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- All Request -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                จำนวน Request ทั้งหมด</div>
                                            <?php
                                            $countAll = $condb->CountAllRequest();
                                            $numrows = $countAll->num_rows;
                                            ?>    
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numrows; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AllDanger -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">จำนวนบุคคลที่มีความเสี่ยงสูงสุดทั้งหมด
                                            </div>
                                            <?php
                                            //แสดงจำนวน-บุคคลที่มีความเสี่ยงสูงสุด-ทั้งหมด
                                            $sql = $condb->dangerRequest();
                                            $countdanger =0;
                                            while ($data = $sql->fetch_assoc()) {
                                            $pro = $data['prowarningid'];
                                            $tmp = $data['tmpgroup'];
                                            $sym = $data['sympgroup'];
                                            $abroad = $data['abroadid'];
                                            $ptcf = $data['patientcfid'];
                                            $pttime = $data['patienttimeid'];
                                            $ptnear = $data['patientnearid'];
                                            $date=$data['time'];
                                            $ab=$data['abroadid'];
                                            $pt=$data['patientcfid'];
                                            $pi=$data['patienttimeid'];
                                            $pn=$data['patientnearid'];
                                            if ($abroad == '1' or $ptcf == '1' or $pttime == '1' or $ptnear == '1'){
                                                $countdanger++;
                                                }
                                            }
                                            ?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $countdanger; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <div align="right" class="mt-2">
                                        <a href="#modalalert" data-toggle="modal">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <!-- Danger Today -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">จำนวนบุคคลที่มีความเสี่ยงสูงสุดวันนี้
                                            </div>
                                            <?php
                                            //แสดงจำนนวน-บุคคลที่มีความเสี่ยงสูงสุด-วันนี้
                                            $countdanger = $condb->DangerfetchToday();
                                            $countrow =0;
                                            while ($data = $countdanger->fetch_assoc()) {
                                            $pro = $data['prowarningid'];
                                            $tmp = $data['tmpgroup'];
                                            $sym = $data['sympgroup'];
                                            $abroad = $data['abroadid'];
                                            $ptcf = $data['patientcfid'];
                                            $pttime = $data['patienttimeid'];
                                            $ptnear = $data['patientnearid'];
                                            $date=$data['time'];
                                            $ab=$data['abroadid'];
                                            $pt=$data['patientcfid'];
                                            $pi=$data['patienttimeid'];
                                            $pn=$data['patientnearid'];
                                            if ($abroad == '1' or $ptcf == '1' or $pttime == '1' or $ptnear == '1'){
                                                $countrow++;
                                                }
                                            }
                                            ?>
                                             <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $countrow;?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <div align="right" class="mt-2">
                                        <a href="#modalalerttoday" data-toggle="modal">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                    </div>
                    <!-- Color System -->
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>© MTB46-CHANA, โรงพยาบาลค่ายอิงคยุทธบริหาร มณฑลทหารบกที่46</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- #modal-dialog -->
    <div class="modal fade" id="modalalert">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ผู้ป่วยที่มีความเสี่ยง</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table class="table table-bordered">
                        <?php
                            //บุคคลที่มีความเสี่ยงสูงสุด-ทั้งหมด
                            $sql = $condb->dangerRequest();
                            $rows1 = 0;
                            while ($data = $sql->fetch_assoc()) {
                                $pro = $data['prowarningid'];
                                $tmp = $data['tmpgroup'];
                                $sym = $data['sympgroup'];
                                $abroad = $data['abroadid'];
                                $ptcf = $data['patientcfid'];
                                $pttime = $data['patienttimeid'];
                                $ptnear = $data['patientnearid'];
                                $date=$data['time'];
                                $ab=$data['abroadid'];
                                $pt=$data['patientcfid'];
                                $pi=$data['patienttimeid'];
                                $pn=$data['patientnearid'];
                                $date1=substr($date,0,10);
                                list($y,$m,$d)=explode('-',$date1);
                                $time=substr($date,11,8);
                                if ($abroad == '1' or $ptcf == '1' or $pttime == '1' or $ptnear == '1') {
                                    $rows1++;
                            ?>  
                                    <tr>
                                    <td width="5%" class="text-nowrap">ลำดับที่</td>
                                    <td width="15%"><?php echo $rows1; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="5%" class="text-nowrap">ชื่อ-สกุล</td>
                                    <td width="15%"><?php echo $data['fullname']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="5%" class="text-nowrap">สังกัด</td>
                                    <td width="10%"><?php echo $data['miaf']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="5%" class="text-nowrap">เบอร์ติดต่อ</td>
                                    <td width="10%"><?php echo $data['tel']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน</td>
                                    <td width="10%"><?php echo $data['ptncheck']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">Timelineตรงกับผู้ป่วยยืนยัน</td>
                                    <td width="10%"><?php echo $data['pticheck']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">สัมผัสใกล้ชิดผู้ป่วยยืนยัน</td>
                                    <td width="10%"><?php echo $data['pcfcheck']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">มีประวัติเดินทางไปยังต่างประเทศ</td>
                                    <td width="10%"><?php echo $data['abname']; ?></td>
                                    </tr>
                                    <td width="10%" class="text-nowrap">วันที่ทำรายการ</td>
                                    <td width="10%"><?php echo$d.'/'.$m.'/'.$y;?></td>
                                    </tr>
                                    <td width="10%" class="text-nowrap">เวลาที่ทำรายการ</td>
                                    <td width="10%"><?php echo $time; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">หมายเหตุ</td>
                                    <td class="bg-danger text-white">กลุ่มเสี่ยงสูงสุด</td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap"></td>
                                    <td class="text-nowrap"></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- #modal-dialog Today -->
     <div class="modal fade" id="modalalerttoday">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ผู้ป่วยที่มีความเสี่ยง</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table class="table table-bordered">
                        <?php
                            //บุคคลที่มีความเสี่ยงสูงสุด-วันนี้
                            $sql = $condb->DangerfetchToday();
                            $rows2 = 0;
                            while ($data = $sql->fetch_assoc()) {
                                $pro = $data['prowarningid'];
                                $tmp = $data['tmpgroup'];
                                $sym = $data['sympgroup'];
                                $abroad = $data['abroadid'];
                                $ptcf = $data['patientcfid'];
                                $pttime = $data['patienttimeid'];
                                $ptnear = $data['patientnearid'];
                                $date=$data['time'];
                                $ab=$data['abroadid'];
                                $pt=$data['patientcfid'];
                                $pi=$data['patienttimeid'];
                                $pn=$data['patientnearid'];
                                $date1=substr($date,0,10);
                                list($y,$m,$d)=explode('-',$date1);
                                $time=substr($date,11,8);
                                if ($abroad == '1' or $ptcf == '1' or $pttime == '1' or $ptnear == '1') {
                                    $rows2++;
                            ?>
                                    <tr>
                                    <td width="5%" class="text-nowrap">ลำดับที่</td>
                                    <td width="15%"><?php echo $rows2; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="5%" class="text-nowrap">ชื่อ-สกุล</td>
                                    <td width="15%"><?php echo $data['fullname']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="5%" class="text-nowrap">สังกัด</td>
                                    <td width="10%"><?php echo $data['miaf']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="5%" class="text-nowrap">เบอร์ติดต่อ</td>
                                    <td width="10%"><?php echo $data['tel']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน</td>
                                    <td width="10%"><?php echo $data['ptncheck']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">Timelineตรงกับผู้ป่วยยืนยัน</td>
                                    <td width="10%"><?php echo $data['pticheck']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">สัมผัสใกล้ชิดผู้ป่วยยืนยัน</td>
                                    <td width="10%"><?php echo $data['pcfcheck']; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">มีประวัติเดินทางไปยังต่างประเทศ</td>
                                    <td width="10%"><?php echo $data['abname']; ?></td>
                                    </tr>
                                    <td width="10%" class="text-nowrap">วันที่ทำรายการ</td>
                                    <td width="10%"><?php echo$d.'/'.$m.'/'.$y;?></td>
                                    </tr>
                                    <td width="10%" class="text-nowrap">เวลาที่ทำรายการ</td>
                                    <td width="10%"><?php echo $time; ?></td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap">หมายเหตุ</td>
                                    <td class="bg-danger text-white">กลุ่มเสี่ยงสูงสุด</td>
                                    </tr>
                                    <tr>
                                    <td width="10%" class="text-nowrap"></td>
                                    <td class="text-nowrap"></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">ออกจากระบบ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">คุณต้องการออกจากระบบใช่หรือไม่? ถ้าใช่กด Logout</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert-->
    <script src="../assets/js/sweetalert2.js"></script>

</body>

</html>