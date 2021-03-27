<?php
session_start();
if(!isset($_SESSION['sdt_nv']) || !isset($_SESSION['sdt_nv']) == "admin"){
    header("location: ../dangnhap/login.php");
}

?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">DANH MỤC</a>

  <!-- Links -->
<ul class="navbar-nav ">
  <li class="nav-item dropdown">
    <a class="nav-link " href="../../../pages/dashboard.php" id="navbardrop" >
          Dashboard
    </a>
  </li>
</ul>
  <ul class="navbar-nav right" style="margin-left: 980px">
            <li class="nav-item dropdown">
            
              <?php
              if(isset($_SESSION['sdt_nv'])){
                $session = $_SESSION['sdt_nv'];
                include_once(__DIR__.'/../../../dbconect.php');
                $sql = "select * from nhanvien where sdt_nv= '".$_SESSION['sdt_nv']."'";
                
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                if($session != "admin"){
                echo'
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$row['ten_nv'].'
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../../functions/dangnhap/logout.php" name="logout">Đăng Xuất</a>
                  </div>
                </div>
                ';
              }else{
                echo'
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item" href="../../functions/dangnhap/logout.php" name="logout">Đăng Xuất</a>
                  </div>
                </div>
                ';
              }
            }
            ?>
            </li>
        </ul>
</nav>