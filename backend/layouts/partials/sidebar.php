<?php 
$session = $_SESSION['sdt_nv'];
$admin = "admin";
?>
<div class="fixed-left">
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-1">
      <div class="btn-group dropright">
        <button type="button" class=" dropdown-toggle" style="padding: 0px 54px 0px 54px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sản phẩm
        </button>
        <div class="dropdown-menu menu1">
          <a class="dropdown-item" href="../../functions/sanpham/index.php">Xem</a>
          <a class="dropdown-item" href="../../functions/sanpham/create.php">Thêm</a>
        </div>
      </div><br>
      <div class="btn-group dropright">
        <button type="button" class=" dropdown-toggle" style="padding: 0px 54px 0px 53px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nhân viên
        </button>
        <div class="dropdown-menu menu1">
          <a class="dropdown-item" href="../../functions/nhanvien/index.php">Xem</a>
          <?php if($session == $admin):?>
          <a class="dropdown-item" href="../../functions/nhanvien/create.php">Thêm</a>
          <?php else:?>
          <?php endif;?>
        </div>
      </div>
      <br>
      <div class="btn-group dropright">
        <button type="button" class=" dropdown-toggle" style="padding: 0px 47px 0px 49px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Khách hàng
        </button>
        <div class="dropdown-menu menu1">
          <a class="dropdown-item" href="../../functions/khachhang/index.php">Xem</a>
          <a class="dropdown-item" href="../../functions/khachhang/create.php">Thêm</a>
        </div>
      </div>
      <br>
      <div class="btn-group dropright">
        <button type="button" class=" dropdown-toggle" style="padding: 0px 54px 0px 55px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Đơn hàng
        </button>
        <div class="dropdown-menu menu1">
          <a class="dropdown-item" href="../../functions/dondathang/index.php">Xem</a>
          <a class="dropdown-item" href="../../functions/dondathang/create.php">Thêm</a>
        </div>
      </div>
      <br>
      <div class="btn-group dropright">
        <button type="button" class=" dropdown-toggle" style="padding: 0px 27px 0px 28px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Chi tiết sản phẩm
        </button>
        <div class="dropdown-menu menu1">
          <a class="dropdown-item" href="../../functions/chitiethanghoa/index1.php">Xem</a>
          <a class="dropdown-item" href="../../functions/chitiethanghoa/create1.php">Thêm</a>
        </div>
      </div>
      <br>
      <div class="btn-group dropright">
        <button type="button" style="padding: 0px 48px 0px 48px;" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Khuyến mãi
        </button>
        <div class="dropdown-menu menu1">
          <a class="dropdown-item" href="../../functions/khuyenmai/index.php">Xem</a>
          <a class="dropdown-item" href="../../functions/khuyenmai/create.php">Thêm</a>
        </div>
      </div>
    </div>
  </div>
</div>
