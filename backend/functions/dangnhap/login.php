<?php
session_start();
?>
<?php include_once(__DIR__.'/../../layouts/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/hoc_back-end/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <!-- nhúng file head -->
    <?php include_once(__DIR__.'/../../layouts/head.php'); ?>
</head>

<body class="background">


      <!-- form đăng nhập -->

<form action="xuly_login.php" id="formdn" name="formdn" method="POST" onsubmit="return test()">
    <div class="container mt-5 " id="dieukien">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md 12">
                                <h1 class="canhgiua">Đăng nhập</h1>
                            </div>
                        </div>
                        <div class="row" v-if="hienmodal">
                            <div class="col-md-12">
                            <!-- tài khoản -->
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label for="#">Nhập thông tin tài khoản</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <input type="text" class="form-control" id="txtDangNhapTK" name="txtDangNhapTK" v-model="nhaptk" placeholder="Tài khoản">
                                            <div class="input-group-append">
                                                <div class="input-group-text"></div>
                                            </div>
                                        </div>
                                        <small id="loi1"class="form-text text-muted">Tài khoản nhập ít nhất 5 ký tự</small>
                                    </div>
                                    <!-- mật khẩu -->
                                    <div class="form-group">
                                        <label for="#"></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text paddingmatkhau">
                                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" id="pwDangNhapPassword" name="pwDangNhapPassword" v-model="nhapmk" placeholder="Mật khẩu">
                                            <div class="input-group-append">
                                                <div class="input-group-text"></div>
                                            </div>
                                        </div>
                                        <small id="loi2"class="form-text text-muted">Mật khẩu nhập ít nhất 3 ký tự</small>
                                    </div>
                            </div>
                        </div>
                        <div class="row" v-if="hienmodal">
                            <div class="col-md-12 text-center">
                                <input type="submit" v-on:click="hienketqua" name="login" id="login" class="btn btn-dark" value="Đăng nhập">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>

    


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <script src="../vendor/vuejs/vue.js"></script>

    <script>
        function test(){
            var check = true;

            if(document.getElementById("txtDangNhapTK").value ==""){
            document.getElementById("loi1").innerHTML="Vui lòng nhập tài khoản là số điện thoại của bạn!";
            check=false;
            }else {
                document.getElementById("loi1").innerHTML="";
            }

            if(document.getElementById("pwDangNhapPassword").value ==""){
            document.getElementById("loi2").innerHTML="Vui lòng nhập password!";
            check=false;
            }else {
                document.getElementById("loi2").innerHTML="";
            }

            if(check==false){
                alert("Vui lòng nhập tài khoản hoặc mật khẩu");
            }
            return check;
        }
        
        
    </script>
</body>
</html>