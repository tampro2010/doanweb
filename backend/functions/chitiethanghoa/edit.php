<!-- xác định tên và tiêu đề -->
<?php include_once(__DIR__.'/../../layouts/config.php'); ?>
<!DOCTYPE html>
<head>
    <!-- datatables -->
    <link href="/hoc_back-end/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <!-- nhúng file head -->
    <?php include_once(__DIR__.'/../../layouts/head.php'); ?>
</head>
<body>
    <!-- header -->
    <?php include_once(__DIR__.'/../../layouts/partials/header.php'); ?>
    <!-- content -->
    <div class="container-fluit">
        <div class="row">
            <div class="col-md-3">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-9">
                <h1>Sửa nhân viên</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" enctype="multipart/form-data">
               
<div class="form-group">
                    <label for="sdt_nv">Số điện thoại</label>
                    <input type="text" id="sdt_nv" name="sdt_nv" class="form-control">
               </div>
               <div class="form-group">
                    <label for="ten_nv">Tên Nhân viên</label>
                    <input type="text" id="ten_nv" name="ten_nv" class="form-control">
               </div>
               <div class="form-group">
                    <label for="gioitinh1_nv" style="margin-right: 20px;">Giới tính</label>
                    <input type="radio" id="gioitinh1_nv" name="gioitinh_nv" checked value="1"><label for="gioitinh1_nv">Nam</label>
                    <input type="radio" id="gioitinh2_nv" name="gioitinh_nv" value="0"><label for="gioitinh2_nv">Nữ</label>
               </div>
               <div class="form-group">
                    <label for="email_nv">Email</label>
                    <input type="email" id="email_nv" name="email_nv" class="form-control">
               </div>
               <div class="form-group">
                    <label for="diachi_nv">Địa chỉ</label>
                    <textarea name="diachi_nv" id="diachi_nv" cols="60" rows="4"  class="form-control"></textarea>
               </div>
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Sửa" class="btn btn-primary">
               </div>
               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                        
                        $ma_nv = $_GET['ma_nv'];
                        $sdt_nv = $_POST['sdt_nv'];
                        $ten_nv = $_POST['ten_nv'];
                        $gioitinh_nv = $_POST['gioitinh_nv'];
                        $email_nv = $_POST['email_nv'];
                        $diachi_nv = $_POST['diachi_nv'];

                        $sql4 = <<<EOT
                        UPDATE nhanvien
                        SET
                            sdt_nv='$sdt_nv',
                            ten_nv='$ten_nv',
                            gioitinh_nv='$gioitinh_nv',
                            email_nv='$email_nv',
                            diachi_nv='$diachi_nv'
                        WHERE ma_nv='$ma_nv'
EOT;
                        $result4=mysqli_query($conn,$sql4);

                        if($result4){
                            echo'<script>
                            alert("Sửa thành công...");
                            </script>';
                        }else{
                            echo'<script>
                            alert("Sửa không thành công...");
                            </script>';
                            }
                    }
               ?>
        </div>
    </div>
    <!-- footer -->
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php'); ?>

    <!-- nhúng script -->
    <?php include_once(__DIR__.'/../../layouts/script.php'); ?>
     <!-- DataTable JS -->
     <script src="/hoc_back-end/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script>
   
    // $('#tblDanhsach').DataTable({
    //         dom: 'Blfrtip',
    //         buttons: [
    //             'copy', 'excel', 'pdf'
    //         ]
    //     });
    </script>

    <script>
        function xoa(){
            confirm("Xóa thành công");
        }
    </script>
    
</body>
</html>