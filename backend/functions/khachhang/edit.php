<!-- xác định tên và tiêu đề -->
<?php include_once(__DIR__.'/../../layouts/config.php'); ?>
<!DOCTYPE html>
<head>
    <!-- datatables -->
    <link href="/hoc_back-end/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <!-- nhúng file head -->
    <?php include_once(__DIR__.'/../../layouts/head.php'); ?>
    <script>
        function kiemtra(str) {
            if (str.length == 0) {
                document.getElementById("sdt_kh").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
    
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("loi1").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "kiemtra_sdtkh.php?q=" + str, true);
            xmlhttp.send();
            }
        }
    </script> 
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
                <h1 class="background2">Sửa thông tin khách hàng</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" novalidate="true" onsubmit="return test()" enctype="multipart/form-data">
               
               <div class="form-group">
                    <label for="sdt_kh">Số điện thoại</label>
                    <input type="text" id="sdt_kh" name="sdt_kh" onkeyup="kiemtra(this.value)" class="form-control">
                    <small id="loi1" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="ten_kh">Tên Khách hàng</label>
                    <input type="text" id="ten_kh" name="ten_kh" class="form-control">
                    <small id="loi2" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="matkhau_kh">Mật khẩu</label>
                    <input type="password" id="matkhau_kh" name="matkhau_kh" class="form-control">
                    <small id="loi3" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="gioitinh1_kh" style="margin-right: 20px;">Giới tính</label>
                    <input type="radio" id="gioitinh1_kh" name="gioitinh_kh" checked value="1"><label for="gioitinh1_kh">Nam</label>
                    <input type="radio" id="gioitinh2_kh" name="gioitinh_kh" value="0"><label for="gioitinh2_kh">Nữ</label>
               </div>
               <div class="form-group">
                    <label for="emai_kh">Email</label>
                    <input type="email" id="emai_kh" name="emai_kh" class="form-control">
                    <small id="loi4" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group">
                    <label for="diachi_kh">Địa chỉ</label>
                    <textarea name="diachi_kh" id="diachi_kh" cols="60" rows="4"  class="form-control"></textarea>
                    <small id="loi5" class="form-text" style="color: red!important;"></small>
               </div>
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Sửa" class="btn btn-primary">
               </div>
               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                        $ma_kh = $_GET['ma_kh'];
                        $sdt_kh = $_POST['sdt_kh'];
                        $matkhau_kh = md5($_POST['matkhau_kh']);
                        $ten_kh = $_POST['ten_kh'];
                        $gioitinh_kh = $_POST['gioitinh_kh'];
                        $emai_kh = $_POST['emai_kh'];
                        $diachi_kh = $_POST['diachi_kh'];

                        $sql4 = <<<EOT
                        UPDATE khachhang
                        SET
                            sdt_kh='$sdt_kh',
                            ten_kh='$ten_kh',
                            matkhau_kh='$matkhau_kh',
                            gioitinh_kh='$gioitinh_kh',
                            emai_kh='$emai_kh',
                            diachi_kh='$diachi_kh'
                        WHERE ma_kh='$ma_kh'
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
    
    if(document.getElementById("sdt_kh").value ==""){
        document.getElementById("loi1").innerHTML="Vui lòng nhập số điện thoại khách hàng!";
        check=false;
    }else if(document.getElementById("sdt_kh").length < 2){
        document.getElementById("loi1").innerHTML="Vui lòng nhập số điện thoại khách hàng ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi1").innerHTML="";
    }
    
    if(document.getElementById("ten_kh").value ==""){
        document.getElementById("loi2").innerHTML="Vui lòng nhập tên khách hàng!";
        check=false;
    }else if(document.getElementById("ten_kh").length < 3){
        document.getElementById("loi2").innerHTML="Vui lòng nhập tên khách hàng ít nhất 3 ký tự!";
        check=false;
    }else {
        document.getElementById("loi2").innerHTML="";
    }
    
    if(document.getElementById("matkhau_kh").value ==""){
        document.getElementById("loi3").innerHTML="Vui lòng nhập mật khẩu khách hàng";
        check=false;
    }else if(document.getElementById("matkhau_kh").length < 2){
        document.getElementById("loi3").innerHTML="Vui lòng nhập mật khẩu khách hàng ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi3").innerHTML="";
    }
    
    var email=document.getElementById("emai_kh").value;
    if(ktraemail(email)){
        document.getElementById("loi4").innerHTML="";
    }else if(email ==""){
        document.getElementById("loi4").innerHTML="Vui lòng nhập email";
    }else{
        document.getElementById("loi4").innerHTML="Vui lòng nhập email đúng dạng abc@gmail.com";
    }
    
    if(document.getElementById("diachi_kh").value ==""){
        document.getElementById("loi5").innerHTML="Vui lòng nhập địa chỉ khách hàng!";
        check=false;
    }else if(document.getElementById("diachi_kh").length < 10){
        document.getElementById("loi5").innerHTML="Vui lòng nhập địa chỉ khách hàng ít nhất 10 ký tự!";
        check=false;
    }else {
        document.getElementById("loi5").innerHTML="";
    }
    
    if(check==true){
        alert("Sửa thông tin khách hàng thành công");
    }else{
        alert("Sửa thông tin khách hàng không thành công, vui lòng kiểm tra lỗi của bạn");
    }
    return check;

     function ktraemail(email){
     email_check = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     return email_check.test(email)
     }
}
</script>  
</body>
</html>