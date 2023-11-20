<?php
include_once('../class/function.php');
session_start();
$condb = new DB_con();
if($_SESSION['username'] ==""){
    header("location:signin");
}else{

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

    <title>Img-Update</title>

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
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
                if($_SESSION['role'] == "admin"){
                
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname'];?></span>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">แก้ไขรูปภาพหน้าฟอร์ม</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">รูปภาพ</th>
                                            <th width="1%">แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $condb->GetallImg();
                                        while($row = $sql->fetch_assoc()){
                                        $path = "../../images/";
                                        ?>
                                        <tr>
                                            <td width="5%" ><img src="<?php echo $path.$row['imgname'];?>" class="img-thumbnail" alt=""></td>
                                            <td width="1%"><button type="button" name="edit" value="edit" class="btn btn-warning btn-sm edit_data" id="<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> แก้ไข</button></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- add -->
            <div id="addModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h4 class="modal-title">แก้ไขรูปภาพหน้าฟอร์ม</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="image" class="form-label">เลือกรูปภาพ</label>
                                    <input type="file" accept="image/*" id="imgInput" name="imgname" class="form-control form-control-lg">
                                    <img id="previewImg" class="img-fluid roounded">
                                </div>
                                <input type="hidden" name="id" id="id">
                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert-->
    <script src="../assets/js/sweetalert2.js"></script>

    <script>
        $(document).ready(function() {
            imgInput.onchange = evt => {
                const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file);
                }
            }
            //insert content
            $('#add').click(function() {
                $('#addModal').modal('show');
                $('#insert_form')[0].reset();
                $('.modal-title').text("Add Img");
                $('#image_id').val('');
                $('#insert').val("Insert");
            });
            $('#insert_form').submit(function(e) {
                e.preventDefault();
                var image_name = $('#imgInput').val();
                if (image_name == '') {
                    alert("Please Select Image");
                    return false;
                } else {
                    var extension = $('#imgInput').val().split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert("Invalid Image File");
                        $('#imgInput').val('');
                        return false;
                    } else {
                        $.ajax({
                            url: "../class/imgforminsert.php",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'successfully',
                                    timer : 3000,
                                    buttons: [
                                        'NO',
                                        'YES'
                                    ],
                                }).then(function(isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    } else {

                                    }
                                });
                                $('#insert_form')[0].reset();
                                $('#addModal').modal('hide');
                            }
                        });
                    }
                }
            });


            //edit
            $('.edit_data').click(function() {
                var id = $(this).attr("id");
                $.ajax({
                    url: "../class/imgformfetch.php",
                    method: "post",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#imgname').val(data.imgname);
                        $('#insert').val("Update");
                        $('#action').val("update");
                        $('.modal-title').text("แก้ไขรูปภาพหน้าฟอร์ม");
                        $('#addModal').modal('show');
                    }
                });

            });

        });
    </script>

</body>

</html>