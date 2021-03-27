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
                <h1 style="text-align: center;">Thêm Chi tiết hàng hóa</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-6">
                         <h2>Thêm Chi tiết điện thoại</h2>
                         <div class="form-group">
                              <label for="loai_chitiet">Ký hiệu</label>
                              <input type="text" id="loai_chitiet" name="loai_chitiet" class="form-control"placeholder="DT">
                         </div>
                         <div class="form-group">
                              <label for="manhinh">Màn hình</label>
                              <input type="text" id="manhinh" name="manhinh" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="camerasau">Camera sau</label>
                              <input type="text" id="camerasau" name="camerasau" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="cameraselfile">Camera trước</label>
                              <input type="text" id="cameraselfile" name="cameraselfile" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="ram">RAM</label>
                              <input type="text" id="ram" name="ram" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="bonhotrong">Bộ nhớ trong</label>
                              <input type="text" id="bonhotrong" name="bonhotrong" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="chip">Chip CPU</label>
                              <input type="text" id="chip" name="chip" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="GPU">GPU</label>
                              <input type="text" id="GPU" name="GPU" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="pin">PIN</label>
                              <input type="text" id="pin" name="pin" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="sms">SIM</label>
                              <input type="text" id="sms" name="sms" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="hedieuhanh">Hệ điều hành</label>
                              <input type="text" id="hedieuhanh" name="hedieuhanh" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="xuatxu">Xuất xứ</label>
                              <input type="text" id="xuatxu" name="xuatxu" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="namsx">Năm sản xuất</label>
                              <input type="text" id="namsx" name="namsx" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-6">
                         <h2>Thêm chi tiết Laptop</h2>
                         <div class="form-group">
                              <label for="loai_chitiet1">Ký hiệu</label>
                              <input type="text" id="loai_chitiet1" name="loai_chitiet1" class="form-control"placeholder="LT">
                         </div>
                         <div class="form-group">
                              <label for="manhinh1">Màn hình</label>
                              <input type="text" id="manhinh1" name="manhinh1" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="ram1">RAM</label>
                              <input type="text" id="ram1" name="ram1" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="chip1">Chip CPU</label>
                              <input type="text" id="chip1" name="chip1" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="hedieuhanh1">Hệ điều hành</label>
                              <input type="text" id="hedieuhanh1" name="hedieuhanh1" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="xuatxu1">Xuất xứ</label>
                              <input type="text" id="xuatxu1" name="xuatxu1" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="namsx1">Năm sản xuất</label>
                              <input type="text" id="namsx1" name="namsx1" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="dohoa_lt">Đồ họa</label>
                              <input type="text" id="dohoa_lt" name="dohoa_lt" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="ocung_lt">Ổ cứng</label>
                              <input type="text" id="ocung_lt" name="ocung_lt" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="trongluong_lt">Trọng lượng</label>
                              <input type="text" id="trongluong_lt" name="trongluong_lt" class="form-control">
                         </div>
                         <div class="form-group">
                              <label for="kichthuoc_lt">Kích thước</label>
                              <input type="text" id="kichthuoc_lt" name="kichthuoc_lt" class="form-control">
                         </div>
                    </div>
               </div>
               
               
               <div class="form-group" style="text-align: center;" >
                    <span ><input type="submit" id="save" name="save" value="Thêm hàng hóa" class="btn btn-primary"></span>
                    <!-- <span style="margin-left: 430px;"><input type="submit" id="save1" name="save1" value="Thêm Laptop" class="btn btn-primary"></span> -->
               </div>


               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                         //ĐIỆN THOẠI
                        $loai_chitiet = $_POST['loai_chitiet'];
                        $manhinh = $_POST['manhinh'];
                        $camerasau = $_POST['camerasau'];
                        $cameraselfile = $_POST['cameraselfile'];
                        $ram = $_POST['ram'];
                        $bonhotrong = $_POST['bonhotrong'];
                        $chip = $_POST['chip'];
                        $GPU = $_POST['GPU'];
                        $pin = $_POST['pin'];
                        $sms = $_POST['sms'];
                        $hedieuhanh = $_POST['hedieuhanh'];
                        $xuatxu = $_POST['xuatxu'];
                        $namsx = $_POST['namsx'];

                         //LAPTOP
                        $loai_chitiet1 = $_POST['loai_chitiet1'];
                        $manhinh1 = $_POST['manhinh1'];
                        $ram1 = $_POST['ram1'];
                        $chip1 = $_POST['chip1'];
                        $hedieuhanh1 = $_POST['hedieuhanh1'];
                        $xuatxu1 = $_POST['xuatxu1'];
                        $namsx1 = $_POST['namsx1'];
                        $dohoa_lt = $_POST['dohoa_lt'];
                        $ocung_lt = $_POST['ocung_lt'];
                        $trongluong_lt = $_POST['trongluong_lt'];
                        $kichthuoc_lt = $_POST['kichthuoc_lt'];

                        $sql4 = <<<EOT
                        INSERT INTO chitiethanghoa
                        (loai_chitiet, manhinh, camerasau, cameraselfile, ram, bonhotrong, chip, GPU, pin, sms, hedieuhanh, xuatxu, namsx)
                        VALUES ('$loai_chitiet', '$manhinh', '$camerasau', '$cameraselfile', '$ram', '$bonhotrong', '$chip', '$GPU', '$pin', '$sms', '$hedieuhanh', '$xuatxu', '$namsx')
EOT;
                        $result4=mysqli_query($conn,$sql4);
                        $sql5 = <<<EOT
                        INSERT INTO chitiethanghoa
                        (loai_chitiet, manhinh, ram, chip, hedieuhanh, xuatxu, namsx, dohoa_lt, ocung_lt, trongluong_lt, kichthuoc_lt)
                        VALUES ('$loai_chitiet1', '$manhinh1', '$ram1', '$chip1', '$hedieuhanh1', '$xuatxu1', '$namsx1', '$dohoa_lt', '$ocung_lt', '$trongluong_lt', '$kichthuoc_lt')
EOT;
                        $result5=mysqli_query($conn,$sql5);
                         
                        if($result4 || $result5){
                            echo'<script>
                            alert("Thêm thành công...");
                            </script>';
                        }else{
                            echo'<script>
                            alert("Thêm không thành công...");
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
    
</body>
</html>