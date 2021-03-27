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
            <div class="col-md-2 background">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10 background1">
                <h1 class="background2">Sửa thông tin đơn đặt hàng</h1>
                <?php 
                $ma_dhh = $_GET['ma_dhh'];

                include_once(__DIR__.'/../../../dbconect.php');
                $sql = <<<EOT
                    SELECT *FROM khachhang kh
                    join dathanghoa dhh on dhh.ma_kh= kh.ma_kh
                    where ma_dhh = $ma_dhh
EOT;
               $result = mysqli_query($conn,$sql);
               $ds_kh = [];
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                   $ds_kh [] = array(
                       'ma_kh' => $row['ma_kh'],
                       'ten_kh' => $row['ten_kh'],
                       'diachi_kh' => $row['diachi_kh']
                   );
                }

               

                $sql1 = <<<EOT
                    SELECT *FROM khuyenmai
EOT;
               $result1 = mysqli_query($conn,$sql1);
               $ds_km = [];
               while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                   $ds_km [] = array(
                    'ma_km'=>$row['ma_km'],
                    'noidung_km'=>$row['noidung_km'],
                    'ngaybatdau_km'=>DATE('d/m/Y',strtotime($row['ngaybatdau_km'])),
                    'ngayketthuc_km'=>DATE('d/m/Y',strtotime($row['ngayketthuc_km'])),
                    'phantram'=>$row['phantram'],
                    'apdung'=>$row['apdung']
                   );
                }

                
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" enctype="multipart/form-data">
               
<div class="form-group">
                <label for="">Khách hàng</label>
                    <?php foreach($ds_kh as $kh): ?>
                        <b> : <?=$kh['ten_kh']?>-<?=$kh['diachi_kh']?></b>
                    <?php endforeach;?>
                    

                </div>
                <div class="form-group">
                    <label for="ngaydathang">Ngày đặt hàng</label>
                    <input type="date" id="ngaydathang" name="ngaydathang" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ngaygiaohang">Ngày giao hàng</label>
                    <input type="date" id="ngaygiaohang" name="ngaygiaohang" class="form-control">
                </div>
                <div class="form-group">
                    <label for="diachi_dhh">Điạ chỉ giao hàng</label>
                    <input type="text" id="diachi_dhh" name="diachi_dhh" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Khuyến mãi</label>

                    <select name="ma_km" id="ma_km">
                    <option value="">Vui lòng chọn khuyến mãi</option>
                    <?php foreach($ds_km as $km): ?>
                        <option value="<?=$km['ma_km']?>" ><?=$km['noidung_km']?>-<?=$km['phantram']?>-<?=$km['apdung']?></option>
                    <?php endforeach;?>
                    </select>

                </div>
                <div class="form-group">
                    <label>Trạng thái thanh toán</label><br />
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="trangthai" id="trangthai-1" class="custom-control-input" value="0" checked>
                            <label class="custom-control-label" for="trangthai-1">Chưa thanh toán</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="trangthai" id="trangthai-2" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="trangthai-2">Đã thanh toán</label>
                        </div>
                </div>
                <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Sửa" class="btn btn-primary">
               </div>
               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                        $ngaydathang = $_POST['ngaydathang'];
                        $ngaygiaohang = $_POST['ngaygiaohang'];
                        $diachi_dhh = $_POST['diachi_dhh'];
                        $ma_km = $_POST['ma_km'];
                        $trangthai = $_POST['trangthai'];

                        $sql4 = <<<EOT
                        UPDATE dathanghoa
                        SET
                            ngaydathang='$ngaydathang',
                            ngaygiaohang='$ngaygiaohang',
                            diachi_dhh='$diachi_dhh',
                            ma_km='$ma_km',
                            trangthai='$trangthai'
                        WHERE ma_dhh='$ma_dhh'
EOT;
                        $result4=mysqli_query($conn,$sql4);

                        if($result4){
                            echo'<script>
                            alert("Sửa thành công...");
                            </script>';
                            echo '<script>location.href = "index.php";</script>';
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