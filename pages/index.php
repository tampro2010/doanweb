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
    $sql = <<<EOT
            SELECT *
            FROM hanghoa hh
            JOIN khuyenmai km ON hh.ma_km = km.ma_km
            JOIN nhomhanghoa nhh ON hh.ma_nhh = nhh.ma_nhh
            
EOT;
    $result = mysqli_query($conn,$sql);
        $ds_sp = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $ds_sp[]=array(
                'ma_hh'=>$row['ma_hh'],
                'ma_nhh'=>$row['ma_nhh'],
                'ten_nhh'=>$row['ten_nhh'],
                'apdung'=>$row['apdung'],
                'ten_dt'=>$row['ten_dt'],
                'giacu_dt'=>$row['giacu_dt'],
                'giamoi_dt'=>$row['giamoi_dt'],
                'soluong_dt'=>$row['soluong_dt'],
                'hinh1_dt'=>$row['hinh1_dt'],
                'hinh2_dt'=>$row['hinh2_dt'],
                'hinh3_dt'=>$row['hinh3_dt']
            );
        }
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
  
  <div class="row mt-4">
    <!-- điện thoai-->
    <div class="col-md-10">
    <b style="line-height:50px;color: red; font-size: 20px;"><i class="fa fa-star-o" aria-hidden="true"></i> Điện thoại <i class="fa fa-star-o" aria-hidden="true"></i></b> <br>
        <?php foreach ($ds_sp as $sp): ?>
        <?php if($sp['ma_nhh'] == 1): ?>
        <div class="card float-left" style="width:13.90rem; height: 25rem;">
            <img src="../assets/uploads/products/<?=$sp['hinh1_dt']?>" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
            <h5 class="card-title" style="height: 3rem;"><?=$sp['ten_dt']?></h5>
            <p class="card-text"><b><?=number_format($sp['giamoi_dt'])?> VNĐ</b></p>
            <p class="card-text" style="line-height:2px;"><i><s><b><?=number_format($sp['giacu_dt'])?> VNĐ</b></s></i></p>
            <a href="mua.php?ma_hh=<?= $sp['ma_hh'] ?>" name="mua" class="btn btn-outline-primary">Mua Ngay</a>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <!-- Bán chạy -->
    <div class="col-md-2  banchay1">
      <h6 style="padding:5px 0;margin-bottom: 0px;"><img src="../assets/img/logo/iconbanchay.gif" class="img-fluit" width="50px" height="50px" alt=""><b style="color: yellow;text-shadow:2px 2px 3px black;font-size: 20px;">Bán chạy</b></h6>
        <table>
        <?php foreach ($ds_sp as $sp): ?>
        <?php if($sp['ma_hh'] == 11 || $sp['ma_hh'] == 14 || $sp['ma_hh'] == 15): ?>
            <tr>
                <td>
                    <div class="card" style="width: 6rem; height: 5rem;">
                        <img src="../assets/uploads/products/<?=$sp['hinh1_dt']?>" height="80rem" class="img-fluit" alt="...">
                    </div>
                </td>
                <td>
                    <button type="submid" class="btn btn-link" name="mua"><i style="font-size: 13px;"><?=$sp['ten_dt']?> <br> <?=$sp['giamoi_dt']?> VNĐ</i></button>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        </table>
    </div>
    <!-- Laptop -->
    <div class="col-md-10 mt-4">
    <b style="color: red; font-size: 20px;"><i class="fa fa-star-o" aria-hidden="true"></i> Laptop <i class="fa fa-star-o" aria-hidden="true"></i></b> <br>
        <?php foreach ($ds_sp as $sp): ?>
        <?php if($sp['ma_nhh'] == 2): ?>
        <div class="card float-left" style="width:13.90rem; height: 25rem;">
            <img src="../assets/uploads/products/<?=$sp['hinh1_dt']?>" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
            <h5 class="card-title" style="height: 3rem;"><?=$sp['ten_dt']?></h5>
            <p class="card-text"><b><?=number_format($sp['giamoi_dt'])?> VNĐ</b></p>
            <p class="card-text" style="line-height:2px;"><i><s><b><?=number_format($sp['giacu_dt'])?> VNĐ</b></s></i></p>
            <a href="mua.php?ma_hh=<?= $sp['ma_hh'] ?>" name="mua"  class="btn btn-outline-primary">Mua Ngay</a>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    
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