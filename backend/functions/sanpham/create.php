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
                <h1 class="background2">Thêm sản phẩm</h1>
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
                    SELECT *
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
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" novalidate="true" onsubmit="return test()" enctype="multipart/form-data">
               <div class="form-group">
                    <label for="ma_nhh">Nhóm hàng hóa</label>
                    <select name="ma_nhh" id="ma_nhh" class="form-control">
                        <?php foreach($ds_nhh as $ds_nsp) : ?>
                        <option value="<?=$ds_nsp['ma_nhh']?>"><?=$ds_nsp['ten_nhh']?></option>
                        <?php endforeach ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="ma_cthh">Loại chi tiết hàng hóa</label>
                    <select name="ma_cthh" id="ma_cthh" class="form-control">
                        <?php foreach($ds_sp as $ds_ctsp) : ?>
                        <option value="<?=$ds_ctsp['ma_cthh']?>"><?=$ds_ctsp['loai_chitiet']?>-<?=$ds_ctsp['ma_cthh']?></option>
                        <?php endforeach ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="ma_km">Khuyến mãi</label>
                    <select name="ma_km" id="ma_km" class="form-control">
                        <?php foreach($ds_km as $ds_kmsp) : ?>
                        <option value="<?=$ds_kmsp['ma_km']?>"><?=$ds_kmsp['noidung_km']?>, Áp dụng: <?=$ds_kmsp['apdung']?></option>
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
               <div class="form-group">
                    <label for="hinh1_dt">Hình 1</label>
                    <input type="file" id="hinh1_dt" name="hinh1_dt" class="form-control">
               </div>
               <div class="form-group">
                    <label for="hinh2_dt">Hình 2</label>
                    <input type="file" id="hinh2_dt" name="hinh2_dt" class="form-control">
               </div>
               <div class="form-group">
                    <label for="hinh3_dt">Hình 3</label>
                    <input type="file" id="hinh3_dt" name="hinh3_dt" class="form-control">
               </div>
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Thêm" class="btn btn-primary">
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

                        $tentaptin1 = $_FILES['hinh1_dt']['name'];
                        $tenhinh1=date("dmYHis").'_'.$tentaptin1;

                        $tentaptin2 = $_FILES['hinh2_dt']['name'];
                        $tenhinh2=date("dmYHis").'_'.$tentaptin2;

                        $tentaptin3 = $_FILES['hinh3_dt']['name'];
                        $tenhinh3=date("dmYHis").'_'.$tentaptin3;

                        $sql4 = <<<EOT
                        INSERT INTO hanghoa
                        (ma_nhh, ma_cthh, ma_km, ten_dt, giacu_dt, giamoi_dt, soluong_dt, hinh1_dt, hinh2_dt, hinh3_dt)
                        VALUES ('$ma_nhh', '$ma_cthh', '$ma_km', '$ten_dt', '$giacu_dt', '$giamoi_dt', '$soluong_dt', '$tenhinh1', '$tenhinh2', '$tenhinh3');
EOT;
                        $result4=mysqli_query($conn,$sql4);

                        if($_FILES['hinh1_dt']['error'] <= 0 || $_FILES['hinh2_dt']['error'] <= 0 || $_FILES['hinh3_dt']['error'] <= 0){
                        $upload_dir = __DIR__ . "/../../../assets/uploads/";
                        $subdir = 'products/';
                        move_uploaded_file($_FILES['hinh1_dt']['tmp_name'], $upload_dir . $subdir . $tenhinh1);
                        move_uploaded_file($_FILES['hinh2_dt']['tmp_name'], $upload_dir . $subdir . $tenhinh2);
                        move_uploaded_file($_FILES['hinh3_dt']['tmp_name'], $upload_dir . $subdir . $tenhinh3);
                        echo '<script>location.href = "index.php";</script>';
                        }else{
                            echo"upload thất bại";
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
    <script src="/TMDT/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/TMDT/assets/vendor/DataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="/TMDT/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/TMDT/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
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
        alert("Thêm sản phẩm thành công");
    }else{
        alert("Thêm sản phẩm không thành công, vui lòng kiểm tra lỗi của bạn");
    }
    return check;

}
</script>

</body>
</html>