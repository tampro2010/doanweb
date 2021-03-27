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
                <h1 class="background3">Thêm đơn đặt hàng</h1>
                <?php 
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);


                include_once(__DIR__.'/../../../dbconect.php');
                $sql = <<<EOT
                    SELECT *FROM khachhang
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

                $sql2 = <<<EOT
                SELECT * FROM hanghoa
EOT;
               $result2 = mysqli_query($conn,$sql2);
               $ds_sp = [];
               while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                   $ds_sp [] = array(
                       'ma_hh' => $row['ma_hh'],
                       'ten_dt' => $row['ten_dt'],
                       'giamoi_dt' => $row['giamoi_dt']
                   );
               }
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" enctype="multipart/form-data">
               <h3>Thông tin đơn hàng</h3>
                <div class="form-group">
                <label for="">Khách hàng</label>
                    <select name="ma_kh" id="ma_kh" class="form-control">
                    <option value="">Vui lòng chọn khách hàng</option>
                    <?php foreach($ds_kh as $kh): ?>
                        <option value="<?=$kh['ma_kh']?>" ><?=$kh['ten_kh']?>-<?=$kh['diachi_kh']?></option>
                    <?php endforeach;?>
                    </select>

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
                    <label for="diachi_dhh">Đại chỉ giao hàng</label>
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
                <h3>Chi tiết đơn hàng</h3>
                
            <div class="row">
                <div class="col">
                <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <select name="ma_hh" id="ma_hh" class="form-control">
                        <option value="">Vui lòng chọn sản phẩm</option>
                        <?php foreach($ds_sp as $sp): ?>
                            <option value="<?=$sp['ma_hh']?>" giasanpham="<?=$sp['giamoi_dt']?>"><?=$sp['ten_dt']?></option>
                        <?php endforeach;?>
                        </select>
                </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" name="soluong_dt" id="soluong_dt" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Nút</label>
                        <input type="button" name="save1" id="save1" class="form-control btn btn-primary" value="Thêm sản phẩm">
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="col">
                    <table id="tablechitiet" border="1px" width="80%" class="table table-dark">
                        <thead>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Giá mua</td>
                            <td>Thành tiền</td>
                            <td>Hành động</td>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Thêm" class="btn btn-primary">
               </div>
            </div>
               </form>
               <?php
                    if(isset($_POST['save'])){
                            $ma_kh = $_POST['ma_kh'];
                            $ma_hh = $_POST['ma_hh'];
                            $ngaydathang = $_POST['ngaydathang'];
                            $ngaygiaohang = $_POST['ngaygiaohang'];
                            $diachi_dhh = $_POST['diachi_dhh'];
                            $ma_km = $_POST['ma_km'];
                            $trangthai = $_POST['trangthai'];
                            //lay mang

                            $arr_ma_hh = $_POST['ma_hh'];                   // mảng array do đặt tên name="hoa_ma[]"
                            $arr_soluong_mua = $_POST['soluong_mua'];   // mảng array do đặt tên name="hoa_dh_soluong[]"
                            $arr_gia_mua = $_POST['gia_mua'];
                            // $arr_ma_hh = $_POST['ma_hh'];                   
                            // $arr_soluong_mua = $_POST['soluong_mua'];   
                            // $arr_gia_mua = $_POST['gia_mua']; 
                            // var_dump($arr_soluong_mua);
                            // die;
                            $sqlInsert = <<<EOT
                            INSERT INTO dathanghoa
                            (ma_kh, ma_km, ngaydathang, ngaygiaohang, diachi_dhh, trangthai)
                            VALUES ($ma_kh, $ma_km, '$ngaydathang', '$ngaygiaohang', '$diachi_dhh', $trangthai)
EOT;
                            $result3 = mysqli_query($conn, $sqlInsert);
                    
                            //lay id
                            $ma_dhh = $conn->insert_id;
                            for($i = 0; $i < count($arr_ma_hh); $i++) {
                                // 4.1. Chuẩn bị dữ liệu cho câu lệnh INSERT vào table `sanpham_dondathang`
                                $sp_ma_hh = $arr_ma_hh[$i];
                                $soluong_mua = $arr_soluong_mua[$i];
                                $gia_mua = $arr_gia_mua[$i];
                    
                                // 4.2. Câu lệnh INSERT
                                $sqlInsertSanPhamDonDatHang = <<<EOT
                                INSERT INTO chitiet_dathanghoa
                                (ma_hh, ma_dhh, soluong_mua, gia_mua)
                                VALUES ( '$sp_ma_hh', '$ma_dhh', '$soluong_mua', '$gia_mua')
EOT;
                                // 4.3. Thực thi INSERT
                                mysqli_query($conn, $sqlInsertSanPhamDonDatHang);
                                echo '<script>location.href = "index.php";</script>';
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
    $(function(){
        $('#save1').click(function(){
            // debugger;    
            var ma_hh = $('#ma_hh').val();
            var ten_dt = $('#ma_hh option:selected').text();
            var gia_mua = $('#ma_hh option:selected').attr('giasanpham');
            // var gia_mua = $('#ma_hh option:selected').data('giasanpham');
            var soluong_mua = $('#soluong_dt').val();
            var thanhtien = (soluong_mua * gia_mua);
            //tao bang
            var htmlTR = '<tr>';
            htmlTR += '<td>'+ ten_dt +'<input type="hidden" name="ma_hh[]" value="'+ ma_hh+'" />'+'</td>';
            htmlTR += '<td>'+ soluong_mua +'<input type="hidden" name="arr_soluong_mua[]" value="'+ soluong_mua +'" />'+'</td>';
            htmlTR += '<td>'+ gia_mua +'<input type="hidden" name="arr_gia_mua[]" value="'+ gia_mua +'" />'+'</td>';
            htmlTR += '<td>' + thanhtien + '</td>';
            htmlTR += '<td><input type="submit" value="Xóa" class="btn btn-danger btnxoadong"</td>';
            htmlTR += '<tr>';

            // them vao table
            $('#tablechitiet tbody').append(htmlTR);

            $('#ma_hh').val('');
            $('#soluong_mua').val('');

        });
        $('#tablechitiet').on('click','.btnxoadong', function(e){
            $(this).parent().parent().remove();
        });
    });
</script>
    
</body>
</html>