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
                <h1 class="background2">Sửa sản phẩm</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT *
                    FROM 
                    chitiethanghoa
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_sp = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_sp[]=array(
                            'ma_cthh'=>$row['ma_cthh'],
                            'loai_chitiet'=>$row['loai_chitiet']
                        );
                    }
                ?>

                <?php
                
                $sql1 = <<<EOT
                select *
                FROM nhomhanghoa
EOT;
                $result1 = mysqli_query($conn,$sql1);
                $ds_nhh = [];
                while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                    $ds_nhh[]=array(
                        'ma_nhh'=>$row['ma_nhh'],
                        'ten_nhh'=>$row['ten_nhh']
                    );
                }

                $ma_hh = $_GET['ma_hh'];
                $sqlSelected = <<<EOT
                    SELECT * FROM hanghoa where ma_hh = '$ma_hh'
EOT;
                $resultSelected = mysqli_query($conn,$sqlSelected);
                $rowSelected = mysqli_fetch_array($resultSelected, MYSQLI_ASSOC);
                
                
                ?>
                <?php
                $sql2 = <<<EOT
                    SELECT *
                    FROM khuyenmai
EOT;
                $result2 = mysqli_query($conn,$sql2);
                $ds_km = [];
                while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                    $ds_km[]=array(
                        'ma_km'=>$row['ma_km'],
                        'noidung_km'=>$row['noidung_km'],
                        'apdung'=>$row['apdung']
                    );
                }
                ?>
                <?php
                
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" novalidate="true" onsubmit="return test()" enctype="multipart/form-data">
               <div class="form-group">
                    <label for="ma_nhh">Nhóm hàng hóa</label>
                    <select name="ma_nhh" id="ma_nhh" class="form-control">
                        <?php foreach($ds_nhh as $ds_nsp) : ?>
                        <?php if($rowSelected['ma_nhh'] == $ds_nsp['ma_nhh']):?>
                        <option value="<?=$ds_nsp['ma_nhh']?>" selected><?=$ds_nsp['ten_nhh']?></option>
                        <?php else: ?>
                        <option value="<?=$ds_nsp['ma_nhh']?>"><?=$ds_nsp['ten_nhh']?></option>
                        <?php endif ?>
                        <?php endforeach ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="ma_cthh">Loại chi tiết hàng hóa</label>
                    <select name="ma_cthh" id="ma_cthh" class="form-control">
                        <?php foreach($ds_sp as $ds_ctsp) : ?>
                        <?php if($rowSelected['ma_cthh'] == $ds_nsp['ma_cthh']):?>
                        <option value="<?=$ds_ctsp['ma_cthh']?>" selected><?=$ds_ctsp['loai_chitiet']?>-<?=$ds_ctsp['ma_cthh']?></option>
                        <?php else: ?>
                        <option value="<?=$ds_ctsp['ma_cthh']?>"><?=$ds_ctsp['loai_chitiet']?>-<?=$ds_ctsp['ma_cthh']?></option>
                        <?php endif ?>
                        <?php endforeach ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="ma_km">Khuyến mãi</label>
                    <select name="ma_km" id="ma_km" class="form-control">
                        <?php foreach($ds_km as $ds_kmsp) : ?>
                        <?php if($rowSelected['ma_km'] == $ds_kmsp['ma_km']):?>
                        <option value="<?=$ds_kmsp['ma_km']?>" selected><?=$ds_kmsp['noidung_km']?>, Áp dụng: <?=$ds_kmsp['apdung']?></option>
                        <?php else: ?>
                        <option value="<?=$ds_kmsp['ma_km']?>"><?=$ds_kmsp['noidung_km']?>, Áp dụng: <?=$ds_kmsp['apdung']?></option>
                        <?php endif ?>
                        <?php endforeach ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="ten_dt">Tên điện thoại</label>
                    <input type="text" id="ten_dt" name="ten_dt" class="form-control">
                    <small id="loi1" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="giacu_dt">Giá cũ</label>
                    <input type="text" id="giacu_dt" name="giacu_dt" class="form-control">
                    <small id="loi2" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="giamoi_dt">Giá mới</label>
                    <input type="text" id="giamoi_dt" name="giamoi_dt" class="form-control">
                    <small id="loi3" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="soluong_dt">Số lượng</label>
                    <input type="text" id="soluong_dt" name="soluong_dt" class="form-control">
                    <small id="loi4" class="form-text" style="color: red!important;"></small>
               </div>
              
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Sửa" class="btn btn-primary">
               </div>
               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                        
                        $ma_nhh = $_POST['ma_nhh'];
                        $ma_cthh = $_POST['ma_cthh'];
                        $ma_km = $_POST['ma_km'];
                        $ten_dt = $_POST['ten_dt'];
                        $giacu_dt = $_POST['giacu_dt'];
                        $giamoi_dt = $_POST['giamoi_dt'];
                        $soluong_dt = $_POST['soluong_dt'];
                
                        $sql4 = <<<EOT
                        UPDATE hanghoa
                        SET
                            ma_nhh=$ma_nhh,
                            ma_cthh=$ma_cthh,
                            ma_km=$ma_km,
                            ten_dt='$ten_dt',
                            giacu_dt='$giacu_dt',
                            giamoi_dt='$giamoi_dt',
                            soluong_dt='$soluong_dt'
                        WHERE ma_hh=$ma_hh
EOT;
                        $result4=mysqli_query($conn,$sql4);
                        // if($result4){
                        //     echo'
                        //     <script>
                        //         alert("Cập nhật thông tin thành công");
                        //     </script>';
                        // }else{
                        //     echo'<script>
                        //         alert("Cập nhật thông tin thất bại");
                        //     </script>';
                        
                        // }
                        echo '<script>location.href = "index.php";</script>';
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
<script>
function test(){
    var check =true;
    
    if(document.getElementById("ten_dt").value ==""){
        document.getElementById("loi1").innerHTML="Vui lòng nhập tên điện thoại!";
        check=false;
    }else if(document.getElementById("ten_dt").length < 2){
        document.getElementById("loi1").innerHTML="Vui lòng nhập tên điện thoại ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi1").innerHTML="";
    }
    
    if(document.getElementById("giacu_dt").value ==""){
        document.getElementById("loi2").innerHTML="Vui lòng nhập giá cũ điện thoại!";
        check=false;
    }else {
        document.getElementById("loi2").innerHTML="";
    }
    
    if(document.getElementById("giamoi_dt").value ==""){
        document.getElementById("loi3").innerHTML="Vui lòng nhập giá mới điện thoại";
        check=false;
    }else if(document.getElementById("giamoi_dt").length < 2){
        document.getElementById("loi3").innerHTML="Vui lòng nhập giá mới điện thoại ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi3").innerHTML="";
    }
    
    if(document.getElementById("soluong_dt").value ==""){
        document.getElementById("loi4").innerHTML="Vui lòng nhập số lượng điện thoại";
        check=false;
    }else if(document.getElementById("soluong_dt").length < 2){
        document.getElementById("loi4").innerHTML="Vui lòng nhập số lượng điện thoại ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi4").innerHTML="";
    }
    
    if(check==true){
        alert("Sửa sản phẩm thành công");
    }else{
        alert("Sửa sản phẩm không thành công, vui lòng kiểm tra lỗi của bạn");
    }
    return check;

}
</script> 
</body>
</html>