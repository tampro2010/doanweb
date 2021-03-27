<!-- xác định tên và tiêu đề -->
<?php include_once(__DIR__.'/../backend/layouts/config.php'); ?>
<!DOCTYPE html>
<head>
    <!-- datatables -->
    <link href="/hoc_back-end/assets/vendor/DataTables/datatables.css" type="text/css" rel="stylesheet" />
    <link href="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <!-- nhúng file head -->
    <?php include_once(__DIR__.'/../backend/layouts/head.php'); ?>
    <link rel="shortcut icon" href="../assets/img/logo/logo3.PNG">
</head>
<body>
    <!-- header -->
    <?php include_once(__DIR__.'/../backend/layouts/partials/headerkh.php'); ?>
    <!-- content -->
    <?php
    include_once(__DIR__.'/../dbconect.php'); 
    
    ?>
<div class="container-fluid">
      <div id="menu1">
        <ul>
          <li class="text-left">Sản phẩm</li>
          <li><a href='samsung.php'>Điện thoại</a></li>
          <li><a href='oppo.php' style='padding-left: 35px'>Laptop</a></li>
        </ul>
      </div>
</div>
<div class="container backgroudnencontainer">
  <div class="row paddingqc mt-5">
  <!-- silde qc -->
    <div class="col-md-9">
      <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" >
          <div class="carousel-item active" data-interval="10000">
            <a href="oppo.php"><img src="../assets/img/sanpham/quangcao_1.jpg" class="d-block w-100 imgqc" alt="..."></a>
          </div>
          <div class="carousel-item" data-interval="2000">
            <a href="samsung.php"><img src="../assets/img/sanpham/quangcao_2.jpg" class="d-block w-100 imgqc" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="samsung.php"><img src="../assets/img/sanpham/quangcao_8.jpg" class="d-block w-100 imgqc" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="samsung.php"><img src="../assets/img/sanpham/quangcao_9.jpg" class="d-block w-100 imgqc" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="samsung.php"><img src="../assets/img/sanpham/quangcao_7.jpg" class="d-block w-100 imgqc" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="samsung.php"><img src="../assets/img/sanpham/quangcao_3.jpg" class="d-block w-100 imgqc" alt="..."></a>
          </div>
          </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
      <!-- qc right -->
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12"><img src="../assets/img/sanpham/quangcao_4.jpg" alt=""></div>
      </div>
      <div class="row">
        <div class="col-md-12"><img src="../assets/img/sanpham/quangcao_5.jpg" alt="" class="imgkqc"></div>
      </div>
    </div>
  </div>
  
<form action="themspgiohang.php" method="POST" name="frmthemsp" id="frmthemsp">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12" style="font-size: 20px;color: rgba(17, 12, 12, 0.692);">
          <?php 
                
                if(isset($_GET['mua'])){
                $ma_hh = $_GET['ma_hh'];
                $sql ="select * from dienthoai where MSDT='".$MasoDT."'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                    echo"<p>";
                    echo"".$row["ten_dt"]."</br>";
                    echo"<b>".number_format($row["giamoi_dt"])." VNĐ</b>";
                    echo"</p>";
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <?php
        
        if(isset($_POST['mua'])){
        $ma_hh = $_GET['ma_hh'];
        $sql ="select * from hanghoa where ma_hh= $ma_hh";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
            echo"<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>";
                echo"<ol class='carousel-indicators'>";
                    echo"<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
                    echo"<li data-target='#carouselExampleIndicators' data-slide-to='1'></li>";
                    echo"<li data-target='#carouselExampleIndicators' data-slide-to='2'></li>";
                echo"</ol>";
                echo"<div class='carousel-inner'style='width: 500px; height: 500px;'>";
                echo"<div class='carousel-item active'>";
                    echo"<img src='".$row['hinh1_dt']."' class='d-block w-100 img-fluid' alt='...'>";
                echo"</div>";
                echo"<div class='carousel-item'>";
                    echo"<img src='".$row['hinh2_dt']."' class='d-block w-100 img-fluid' alt='...'>";
                echo"</div>";
                echo"<div class='carousel-item'>";
                    echo"<img src='".$row['hinh3_dt']."' class='d-block w-100 img-fluid' alt='...'>";
                echo"</div>";
                echo"<form method = 'get' action = 'themspgiohang.php'>";
                echo"<input type='text' name='muadt' class='MSDT' value='".$row['MSDT']."'>";
                echo"<input type='text' name='txtctdt' class='MSDT' value='".$row['MSCTDT']."'>";
                echo"<button type='submit' class='btn btn-link' name='submua'><i style='font-size: 13px;'>".$row['TenDT']." <br> ".$row['GiaDT']."</i></button>";
                echo"</form>";
                echo"</div>";
                    echo"<a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>";
                        echo"<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                        echo"<span class='sr-only'>Previous</span>";
                    echo"</a>";
                    echo"<a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>";
                        echo"<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                        echo"<span class='sr-only'>Next</span>";
                    echo"</a>";
                echo"</div>";
            echo"</div>";
        }
        ?>
        <div class="col-md-6 text-left" style="padding-left: 143px;border-left:2px solid #ccc;">
            <?php
                $conn = mysqli_connect("localhost", "root", "","qlbanhang");
                if(isset($_GET['submua'])){
                $MasoCTDT = $_GET['txtctdt'];
                $sql ="select * from chitietdienthoai where MSCTDT='".$MasoCTDT."'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                echo"<div class='row' style='margin-bottom: 23px;'>";
                echo"<div class='col-md-12 text-center'><h4>Thông số kỹ thuật</h4></div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Màn hình</div>";
                echo"<div class='col-md-8'>".$row['ManHinh']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Camera sau</div>";
                echo"<div class='col-md-8'>".$row['Camerasau']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Camera Selfie</div>";
                echo"<div class='col-md-8'>".$row['CameraSelfile']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>RAM</div>";
                echo"<div class='col-md-8'>".$row['RAM']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Bộ nhớ trong</div>";
                echo"<div class='col-md-8'>".$row['BoNhoTrong']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>CPU</div>";
                echo"<div class='col-md-8'>".$row['CHIPCPU']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>GPU</div>";
                echo"<div class='col-md-8'>".$row['GPU']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Dung lượng pin</div>";
                echo"<div class='col-md-8'>".$row['PIN']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Thẻ sim</div>";
                echo"<div class='col-md-8'>".$row['SMS']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Hệ điều hành</div>";
                echo"<div class='col-md-8'>".$row['HeDieuHanh']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Xuất xứ</div>";
                echo"<div class='col-md-8'>".$row['XuatXu']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Năm sản xuất</div>";
                echo"<div class='col-md-8'>".$row['NamSX']."</div>";
                echo"</div>";
                echo"<div class='row'>";
                echo"<div class='col-md-4'>Số Lượng</div>";
                echo"<div class='col-md-8'><input type='number' name='soluong' id='soluong' min='1' max='99' value='1'/></div>";
                echo"</div>";
                }
            ?>

            <div class="row text-center mt-4" style="margin-top: 13px;">
                <div class="col-md-12">
                  <?php
                    // echo'<form action="themspgiohang" method="get" name="frmthemgiohang">';
                    // echo"<input type='text' name='muadt1' class='MSDT' value='".$row['MSDT']."'>";
                    // echo'</form>';
                  ?>
                    <button type="submit" name="dathang" id="dathang" class="btn btn-danger" data-toggle="button" aria-pressed="false" style="background-color: red;">
                        <h1>Mua ngay</h1>
                        <p> Mua hàng trong 1giờ hoặc nhận hàng tại shop</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
    
  </div>
</div>   


    <!-- footer -->
    <?php include_once(__DIR__.'/../backend/layouts/partials/footer.php'); ?>

    <!-- nhúng script -->
    <?php include_once(__DIR__.'/../backend/layouts/script.php'); ?>
     <!-- DataTable JS -->
     <script src="/hoc_back-end/assets/vendor/DataTables/datatables.min.js"></script>
    <!-- <script src="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/hoc_back-end/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script> -->

    
</body>
</html>