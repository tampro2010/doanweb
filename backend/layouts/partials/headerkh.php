<?php
session_start();
if(!isset($_SESSION['sdt_kh'])){
    // header("location: ../dangnhap/login.php");
}
?>
<style>
.bgroudsearch{
    background-color: wheat;
  } 
  
  .paddingSearch{
    padding-left: 305px;
    right: 0;
  }
</style>
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href=""><img src="../assets/img/logo/logo3.PNG" alt="T A M Shop" width="160px" height="50px"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="maunen collapse navbar-collapse navbar-dark bg-primary" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Trang Chủ<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Lienhe.php">Liên Hệ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="giohang.php">Giỏ Hàng</a>
      </li>
      </ul>
        <form class="form-inline my-2 my-lg-0 paddingSearch" action="search.php" method="GET">
          <input style="margin-left: 143px;" class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success mr-sm-2 my-2 my-sm-0 bgroudsearch" name="subthanhcong" type="submit">Search</button>
        </form>
      <ul class="navbar-nav mr-auto ">
        <li class="nav-item dropdown">
          <?php
              if(isset($_SESSION['sdt_kh'])){
                include_once(__DIR__.'/../../../dbconect.php'); 
                $sql = "select * from khachhangshop where sdt_kh= '".$_SESSION['sdt_kh']."'";
                
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                echo'
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$row['ten_kh'].'
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="dangxuat.php">Đăng Xuất</a>
                  </div>
                </div>
                ';
              }else{
                echo'
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tài khoản
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="dangnhap.html">Đăng nhập</a>
                    <a class="dropdown-item" href="dangky.html">Đăng ký</a>
                  </div>
                </div>
                ';
              }
            ?>
            </li>
           
            
        </ul>
        </div>
</nav>
