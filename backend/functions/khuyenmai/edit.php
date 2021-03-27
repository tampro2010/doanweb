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
                <h1 class="background2">Sửa thông tin khuyến mãi</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" novalidate="true" onsubmit="return test()" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="noidung_km">Nội dung khuyến mãi</label>
                    <textarea name="noidung_km" id="noidung_km" cols="50" rows="3" class="form-control"></textarea>
                    <small id="loi1" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="ngaybatdau_km">Ngày bắt đầu</label>
                    <input type="date" id="ngaybatdau_km" name="ngaybatdau_km" class="form-control">
                    <small id="loi2" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="ngayketthuc_km">Ngày kết thúc</label>
                    <input type="date" id="ngayketthuc_km" name="ngayketthuc_km" class="form-control">
                    <small id="loi3" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="phantram">Phần trăm khuyến mãi</label>
                    <input type="text" id="phantram" name="phantram" class="form-control" placeholder="vd: 30%">
                    <small id="loi4" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="" style="margin-right: 20px;">Áp dụng</label>
                    <input type="radio" id="apdung" name="apdung" checked value="1"><label  for="apdung"> Có</label><br>
                    <input type="radio" id="apdung1" name="apdung" value="0" style="margin-left: 85px;"><label for="apdung1"> Không</label>
               </div>
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Sửa" class="btn btn-primary">
               </div>
               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                        $ma_km=$_GET['ma_km'];
                        $noidung_km = $_POST['noidung_km'];
                        $ngaybatdau_km = $_POST['ngaybatdau_km'];
                        $ngayketthuc_km = $_POST['ngayketthuc_km'];
                        $phantram = $_POST['phantram'];
                        $apdung = $_POST['apdung'];

                        $sql4 = <<<EOT
                        UPDATE khuyenmai
                            SET
                                noidung_km='$noidung_km',
                                ngaybatdau_km='$ngaybatdau_km',
                                ngayketthuc_km='$ngayketthuc_km',
                                phantram='$phantram',
                                apdung='$apdung'
                            WHERE ma_km=$ma_km
EOT;
                        $result4=mysqli_query($conn,$sql4);

                        // if($result4){
                        //     echo'<script>
                        //     alert("Sửa thành công...");
                        //     </script>';
                        // }else{
                        //     echo'<script>
                        //     alert("Sửa không thành công...");
                        //     </script>';
                        //     }
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
    
    if(document.getElementById("noidung_km").value ==""){
        document.getElementById("loi1").innerHTML="Vui lòng nhập nội dung khuyến mãi!";
        check=false;
    }else if(document.getElementById("noidung_km").length < 2){
        document.getElementById("loi1").innerHTML="Vui lòng nhập nội dung khuyến mãi ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi1").innerHTML="";
    }
    
    if(document.getElementById("ngaybatdau_km").value ==""){
        document.getElementById("loi2").innerHTML="Vui lòng nhập ngày bắt đầu khuyến mãi!";
        check=false;
    }else {
        document.getElementById("loi2").innerHTML="";
    }
    
    if(document.getElementById("ngayketthuc_km").value ==""){
        document.getElementById("loi3").innerHTML="Vui lòng nhập ngày kết thúc khuyến mãi";
        check=false;
    }else {
        document.getElementById("loi3").innerHTML="";
    }
    
    if(document.getElementById("phantram").value ==""){
        document.getElementById("loi4").innerHTML="Vui lòng nhập phần trăm khuyến mãi";
        check=false;
    }else if(document.getElementById("phantram").length < 2){
        document.getElementById("loi4").innerHTML="Vui lòng nhập phần trăm khuyến mãi ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi4").innerHTML="";
    }
    
    if(check==true){
        alert("Sửa thông tin khuyến mãi thành công");
    }else{
        alert("Sửa thông tin khuyến mãi không thành công, vui lòng kiểm tra lỗi của bạn");
    }
    return check;

}
</script>
    
</body>
</html>