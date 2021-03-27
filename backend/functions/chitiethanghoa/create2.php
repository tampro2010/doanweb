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
                         <h2 class="background2">Thêm chi tiết điện thoại</h2>
                         <div class="form-group">
                              <label for="loai_chitiet">Ký hiệu</label>
                              <input type="text" id="loai_chitiet" name="loai_chitiet" class="form-control"value="DT">
                              <small id="loi1" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="manhinh">Màn hình</label>
                              <input type="text" id="manhinh" name="manhinh" class="form-control">
                              <small id="loi2" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="camerasau">Camera sau</label>
                              <input type="text" id="camerasau" name="camerasau" class="form-control">
                              <small id="loi3" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="cameraselfile">Camera trước</label>
                              <input type="text" id="cameraselfile" name="cameraselfile" class="form-control">
                              <small id="loi4" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="ram">RAM</label>
                              <input type="text" id="ram" name="ram" class="form-control">
                              <small id="loi5" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="bonhotrong">Bộ nhớ trong</label>
                              <input type="text" id="bonhotrong" name="bonhotrong" class="form-control">
                              <small id="loi6" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="chip">Chip CPU</label>
                              <input type="text" id="chip" name="chip" class="form-control">
                              <small id="loi7" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="GPU">GPU</label>
                              <input type="text" id="GPU" name="GPU" class="form-control">
                              <small id="loi8" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="pin">PIN</label>
                              <input type="text" id="pin" name="pin" class="form-control">
                              <small id="loi9" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="sms">SIM</label>
                              <input type="text" id="sms" name="sms" class="form-control">
                              <small id="loi10" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="hedieuhanh">Hệ điều hành</label>
                              <input type="text" id="hedieuhanh" name="hedieuhanh" class="form-control">
                              <small id="loi11" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="xuatxu">Xuất xứ</label>
                              <input type="text" id="xuatxu" name="xuatxu" class="form-control">
                              <small id="loi12" class="form-text" style="color: red!important;"></small>
                         </div>
                         <div class="form-group">
                              <label for="namsx">Năm sản xuất</label>
                              <input type="text" id="namsx" name="namsx" class="form-control">
                              <small id="loi13" class="form-text" style="color: red!important;"></small>
                         </div>
                    </div>
                    
               </div>
               
               
               <div class="form-group" style="text-align: center;" >
                    <span ><input type="submit" id="save" name="save" value="Lưu điện thoại" class="btn btn-primary"></span>
                 </div>


               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                         //ĐIỆN THOẠI
                        $loai_chitiet = htmlentities($_POST['loai_chitiet']);
                        $manhinh = htmlentities($_POST['manhinh']);
                        $camerasau = htmlentities($_POST['camerasau']);
                        $cameraselfile = htmlentities($_POST['cameraselfile']);
                        $ram = htmlentities($_POST['ram']);
                        $bonhotrong = htmlentities($_POST['bonhotrong']);
                        $chip = htmlentities($_POST['chip']);
                        $GPU = htmlentities($_POST['GPU']);
                        $pin = htmlentities($_POST['pin']);
                        $sms = htmlentities($_POST['sms']);
                        $hedieuhanh = htmlentities($_POST['hedieuhanh']);
                        $xuatxu = htmlentities($_POST['xuatxu']);
                        $namsx = htmlentities($_POST['namsx']);

                         //LAPTOP
                        

                        $sql4 = <<<EOT
                        INSERT INTO chitiethanghoa
                        (loai_chitiet, manhinh, camerasau, cameraselfile, ram, bonhotrong, chip, GPU, pin, sms, hedieuhanh, xuatxu, namsx)
                        VALUES ('$loai_chitiet', '$manhinh', '$camerasau', '$cameraselfile', '$ram', '$bonhotrong', '$chip', '$GPU', '$pin', '$sms', '$hedieuhanh', '$xuatxu', '$namsx')
EOT;
                        $result4=mysqli_query($conn,$sql4);
                        
                         
                    //     if($result4 ){
                    //         echo'<script>
                    //         alert("Thêm thành công...");
                    //         </script>';
                    //     }else{
                    //         echo'<script>
                    //         alert("Thêm không thành công...");
                    //         </script>';
                    //         }
                    echo '<script>location.href = "index1.php";</script>';
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
    
    if(document.getElementById("loai_chitiet").value ==""){
        document.getElementById("loi1").innerHTML="Vui lòng nhập mã số chi tiết điện thoại!";
        check=false;
    }else if(document.getElementById("loai_chitiet").length < 2){
        document.getElementById("loi1").innerHTML="Vui lòng nhập mã số chi tiết điện thoại ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi1").innerHTML="";
    }
    
    if(document.getElementById("manhinh").value ==""){
        document.getElementById("loi2").innerHTML="Vui lòng nhập màn hình!";
        check=false;
    }else if(document.getElementById("manhinh").length < 5){
        document.getElementById("loi2").innerHTML="Vui lòng nhập màn hình ít nhất 5 ký tự!";
        check=false;
    }else {
        document.getElementById("loi2").innerHTML="";
    }
    
    if(document.getElementById("camerasau").value ==""){
        document.getElementById("loi3").innerHTML="Vui lòng nhập Camerasau";
        check=false;
    }else if(document.getElementById("camerasau").length < 2){
        document.getElementById("loi3").innerHTML="Vui lòng nhập Camerasau ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi3").innerHTML="";
    }
    
    if(document.getElementById("cameraselfile").value ==""){
        document.getElementById("loi4").innerHTML="Vui lòng nhập CameraSelfile!";
        check=false;
    }else if(document.getElementById("cameraselfile").length < 2){
        document.getElementById("loi4").innerHTML="Vui lòng nhập CameraSelfile ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi4").innerHTML="";
    }
    
    if(document.getElementById("ram").value ==""){
        document.getElementById("loi5").innerHTML="Vui lòng nhập RAM!";
        check=false;
    }else if(document.getElementById("ram").length < 2){
        document.getElementById("loi5").innerHTML="Vui lòng nhập RAM ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi5").innerHTML="";
    }
    
    if(document.getElementById("bonhotrong").value ==""){
        document.getElementById("loi6").innerHTML="Vui lòng nhập bộ nhớ trong!";
        check=false;
    }else if(document.getElementById("bonhotrong").length < 2){
        document.getElementById("loi6").innerHTML="Vui lòng nhập bộ nhớ trong ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi6").innerHTML="";
    }

    if(document.getElementById("chip").value ==""){
        document.getElementById("loi7").innerHTML="Vui lòng nhập Chip CPU!";
        check=false;
    }else if(document.getElementById("chip").length < 2){
        document.getElementById("loi7").innerHTML="Vui lòng nhập Chip CPU ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi7").innerHTML="";
    }

    if(document.getElementById("GPU").value ==""){
        document.getElementById("loi8").innerHTML="Vui lòng nhập GPU!";
        check=false;
    }else if(document.getElementById("GPU").length < 2){
        document.getElementById("loi8").innerHTML="Vui lòng nhập GPU ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi8").innerHTML="";
    }
    if(document.getElementById("pin").value ==""){
        document.getElementById("loi9").innerHTML="Vui lòng nhập PIN!";
        check=false;
    }else if(document.getElementById("pin").length < 2){
        document.getElementById("loi9").innerHTML="Vui lòng nhập PIN ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi9").innerHTML="";
    }

    if(document.getElementById("sms").value ==""){
        document.getElementById("loi10").innerHTML="Vui lòng nhập SMS!";
        check=false;
    }else if(document.getElementById("sms").length < 2){
        document.getElementById("loi10").innerHTML="Vui lòng nhập SMS ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi10").innerHTML="";
    }

    if(document.getElementById("hedieuhanh").value ==""){
        document.getElementById("loi11").innerHTML="Vui lòng nhập hệ điều hành!";
        check=false;
    }else if(document.getElementById("hedieuhanh").length < 2){
        document.getElementById("loi11").innerHTML="Vui lòng nhập hệ điều hành ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi11").innerHTML="";
    }

    if(document.getElementById("xuatxu").value ==""){
        document.getElementById("loi12").innerHTML="Vui lòng nhập xuất xứ!";
        check=false;
    }else if(document.getElementById("xuatxu").length <2){
        document.getElementById("loi12").innerHTML="Vui lòng nhập xuất xứ ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi12").innerHTML="";
    }
    
    if(document.getElementById("namsx").value ==""){
        document.getElementById("loi13").innerHTML="Vui lòng nhập năm sản xuất!";
        check=false;
    }else if(document.getElementById("namsx").length < 2){
        document.getElementById("loi13").innerHTML="Vui lòng nhập năm sản xuất ít nhất 2 ký tự!";
        check=false;
    }else {
        document.getElementById("loi13").innerHTML="";
    }

    
    if(check==true){
        alert("Thêm điện thoại thành công");
    }else{
        alert("Thêm điện thoại không thành công, vui lòng kiểm tra lỗi của bạn");
    }
    return check;
    
}
</script>  
    
</body>
</html>