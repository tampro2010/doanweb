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

    <!-- content -->
    <div class="container-fluit background1">
        <div class="row">
            <div class="col-md-12">

                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                ?>
                
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" novalidate="true" onsubmit="return test()" enctype="multipart/form-data">
               <div class="row">
                    
                    <div class="col-md-12">
                         <h2 class="background2">Thêm chi tiết Laptop</h2>
                         <div class="form-group">
                              <label for="loai_chitiet1">Ký hiệu</label>
                              <input type="text" id="loai_chitiet1" name="loai_chitiet1" class="form-control"value="LT">
                              <small id="loi1" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="manhinh1">Màn hình</label>
                              <input type="text" id="manhinh1" name="manhinh1" class="form-control">
                              <small id="loi2" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="ram1">RAM</label>
                              <input type="text" id="ram1" name="ram1" class="form-control">
                              <small id="loi3" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="chip1">Chip CPU</label>
                              <input type="text" id="chip1" name="chip1" class="form-control">
                              <small id="loi4" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="hedieuhanh1">Hệ điều hành</label>
                              <input type="text" id="hedieuhanh1" name="hedieuhanh1" class="form-control">
                              <small id="loi5" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="xuatxu1">Xuất xứ</label>
                              <input type="text" id="xuatxu1" name="xuatxu1" class="form-control">
                              <small id="loi6" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="namsx1">Năm sản xuất</label>
                              <input type="text" id="namsx1" name="namsx1" class="form-control">
                              <small id="loi7" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="dohoa_lt">Đồ họa</label>
                              <input type="text" id="dohoa_lt" name="dohoa_lt" class="form-control">
                              <small id="loi8" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="ocung_lt">Ổ cứng</label>
                              <input type="text" id="ocung_lt" name="ocung_lt" class="form-control">
                              <small id="loi9" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="trongluong_lt">Trọng lượng</label>
                              <input type="text" id="trongluong_lt" name="trongluong_lt" class="form-control">
                              <small id="loi10" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="kichthuoc_lt">Kích thước</label>
                              <input type="text" id="kichthuoc_lt" name="kichthuoc_lt" class="form-control">
                              <small id="loi11" class="form-text" style="color: red!important;"></small>
                         </div>
                    </div>
               </div>
               
               
               <div class="form-group" style="text-align: center;" >
                    <span ><input type="submit" id="save" name="save" value="Thêm laptop" class="btn btn-primary"></span>
                    <!-- <span style="margin-left: 430px;"><input type="submit" id="save1" name="save1" value="Thêm Laptop" class="btn btn-primary"></span> -->
               </div>


               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                         
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

                        
                        $sql5 = <<<EOT
                        INSERT INTO chitiethanghoa
                        (loai_chitiet, manhinh, ram, chip, hedieuhanh, xuatxu, namsx, dohoa_lt, ocung_lt, trongluong_lt, kichthuoc_lt)
                        VALUES ('$loai_chitiet1', '$manhinh1', '$ram1', '$chip1', '$hedieuhanh1', '$xuatxu1', '$namsx1', '$dohoa_lt', '$ocung_lt', '$trongluong_lt', '$kichthuoc_lt')
EOT;
                        $result5=mysqli_query($conn,$sql5);
                         
                        if($result5){
                            echo'<script>
                            alert("Thêm thành công...");
                            </script>';
                            echo '<script>location.href = "index1.php";</script>';
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


    <!-- nhúng script -->
    <?php include_once(__DIR__.'/../../layouts/script.php'); ?>
     <!-- DataTable JS -->
     <script src="/hoc_back-end/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>


    <script>
function test(){
    var check =true;
    
    if(document.getElementById("loai_chitiet1").value ==""){
        document.getElementById("loi1").innerHTML="Vui lòng nhập mã số chi tiết điện thoại!";
        check=false;
    }else if(document.getElementById("loai_chitiet1").length < 2){
        document.getElementById("loi1").innerHTML="Vui lòng nhập mã số chi tiết điện thoại ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi1").innerHTML="";
    }
    
    if(document.getElementById("manhinh1").value ==""){
        document.getElementById("loi2").innerHTML="Vui lòng nhập màn hình!";
        check=false;
    }else if(document.getElementById("manhinh1").length < 5){
        document.getElementById("loi2").innerHTML="Vui lòng nhập màn hình ít nhất 5 ký tự!";
        check=false;
    }else {
        document.getElementById("loi2").innerHTML="";
    }
    
    if(document.getElementById("ram1").value ==""){
        document.getElementById("loi3").innerHTML="Vui lòng nhập RAM!";
        check=false;
    }else if(document.getElementById("ram1").length < 2){
        document.getElementById("loi3").innerHTML="Vui lòng nhập RAM ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi3").innerHTML="";
    }

    if(document.getElementById("chip1").value ==""){
        document.getElementById("loi4").innerHTML="Vui lòng nhập Chip CPU!";
        check=false;
    }else if(document.getElementById("chip1").length < 2){
        document.getElementById("loi4").innerHTML="Vui lòng nhập Chip CPU ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi4").innerHTML="";
    }

    if(document.getElementById("hedieuhanh1").value ==""){
        document.getElementById("loi5").innerHTML="Vui lòng nhập hệ điều hành!";
        check=false;
    }else if(document.getElementById("hedieuhanh").length < 2){
        document.getElementById("loi5").innerHTML="Vui lòng nhập hệ điều hành ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi5").innerHTML="";
    }

    if(document.getElementById("xuatxu1").value ==""){
        document.getElementById("loi6").innerHTML="Vui lòng nhập xuất xứ!";
        check=false;
    }else if(document.getElementById("xuatxu1").length <2){
        document.getElementById("loi6").innerHTML="Vui lòng nhập xuất xứ ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi6").innerHTML="";
    }
    
    if(document.getElementById("namsx1").value ==""){
        document.getElementById("loi7").innerHTML="Vui lòng nhập năm sản xuất!";
        check=false;
    }else if(document.getElementById("namsx1").length < 2){
        document.getElementById("loi7").innerHTML="Vui lòng nhập năm sản xuất ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi7").innerHTML="";
    }
    
    if(document.getElementById("dohoa_lt").value ==""){
        document.getElementById("loi8").innerHTML="Vui lòng nhập đồ họa laptop!";
        check=false;
    }else if(document.getElementById("dohoa_lt").length < 2){
        document.getElementById("loi8").innerHTML="Vui lòng nhập đồ họa laptop ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi8").innerHTML="";
    }
    
    if(document.getElementById("ocung_lt").value ==""){
        document.getElementById("loi9").innerHTML="Vui lòng nhập ổ cứng laptop!";
        check=false;
    }else if(document.getElementById("ocung_lt").length < 2){
        document.getElementById("loi9").innerHTML="Vui lòng nhập ổ cứng laptop ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi9").innerHTML="";
    }
    
    if(document.getElementById("trongluong_lt").value ==""){
        document.getElementById("loi10").innerHTML="Vui lòng nhập trọng lượng laptop!";
        check=false;
    }else if(document.getElementById("trongluong_lt").length < 2){
        document.getElementById("loi10").innerHTML="Vui lòng nhập trọng lượng laptop ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi10").innerHTML="";
    }
    
    if(document.getElementById("kichthuoc_lt").value ==""){
        document.getElementById("loi11").innerHTML="Vui lòng nhập kích thước laptop!";
        check=false;
    }else if(document.getElementById("kichthuoc_lt").length < 2){
        document.getElementById("loi11").innerHTML="Vui lòng nhập kích thước laptop ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi11").innerHTML="";
    }
    
    if(check!=true){
        alert("Thêm laptop không thành công, vui lòng kiểm tra lỗi của bạn");
    }
    return check;
    
}
</script> 
    
</body>
</html>