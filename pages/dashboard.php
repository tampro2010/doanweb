<!-- xác định tên và tiêu đề -->


<?php include_once(__DIR__.'/../backend/layouts/config.php'); ?>
<!DOCTYPE html>
<head>
    <!-- datatables -->
    <link href="/TMDT/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/TMDT/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/TMDT/assets/vendor/Chart.JS/dist/Chart.min.css" type="text/css">
    <!-- nhúng file head -->
    <?php include_once(__DIR__.'/../backend/layouts/head.php'); ?>
</head>
    <style>
        body{
            background-color: #7f165f59;
        }
    </style>
<body>
    <!-- header -->
    <?php include_once(__DIR__.'/../backend/layouts/partials/headerDashboard.php'); ?>
    <!-- content -->
    <div class="container-fluit ">
        <div class="row">
            <div class="col-md-2">

            <?php include_once(__DIR__.'/../backend/layouts/partials/sidebarDashboard.php'); ?>

            </div>
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Bảng tin DASHBOARD</h1>
        </div>

        <!-- Block content -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-primary mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="hanghoa">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số hàng hóa</div>
                </div>
              </div>
              <button class="btn btn-primary btn-sm form-control" id="refreshHH">Refresh dữ liệu</button>
            </div> <!-- Tổng số mặt hàng -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-success mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="khachhang">
                    <h1 >0</h1>
                  </div>
                  <div>Tổng số khách hàng</div>
                </div>
              </div>
              <button class="btn btn-success btn-sm form-control" id="refreshKH">Refresh dữ liệu</button>
            </div> <!-- Tổng số khách hàng -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-warning mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="nhanvien">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số nhân viên</div>
                </div>
              </div>
              <button class="btn btn-warning btn-sm form-control" id="refreshNV">Refresh dữ liệu</button>
            </div> <!-- Tổng số đơn hàng -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-info mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="dondathang">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số đơn đặt hàng</div>
                </div>
              </div>
              <button class="btn btn-info btn-sm form-control" id="refreshDDH">Refresh dữ liệu</button>
            </div> <!-- Tổng số góp ý -->
            <div class="col-sm-6 col-lg-3 mt-3">
              <div class="card text-white bg-danger mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="khuyenmai">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số khuyến mãi</div>
                </div>
              </div>
              <button class="btn btn-danger btn-sm form-control" id="refreshKM">Refresh dữ liệu</button>
            </div> <!-- Tổng số góp ý -->
            <div id="ketqua"></div>
          </div><!-- row -->
          <div class="row">
            <!-- Biểu đồ thống kê loại sản phẩm -->
            <div class="col-sm-6 col-lg-6">
              <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
              <button class="btn btn-outline-secondary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
            </div><!-- col -->

          </div><!-- row -->
        </div>
        <!-- End block content -->
      </main>
            
        </div>
    </div>
    <!-- footer -->
    <?php include_once(__DIR__.'/../backend/layouts/partials/footer.php'); ?>

    <!-- nhúng script -->
    <?php include_once(__DIR__.'/../backend/layouts/script.php'); ?>
     <!-- DataTable JS -->
     <script src="/TMDT/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/TMDT/assets/vendor/DataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="/TMDT/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/TMDT/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="/TMDT/assets/vendor/Chart.JS/dist/Chart.min.js"></script>

    <script>
    $(document).ready(function() {
      // ----------------- Tổng số mặt hàng --------------------------
      function hanghoa() {
        $.ajax('/TMDT/backend/functions/ajax/api_hh.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.quantity}</h1>`;
            $('#hanghoa').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#hanghoa').html(htmlString);
          }
        });
      }
      $('#refreshHH').click(function(event) {
        event.preventDefault();
        hanghoa();
      });

      // ----------------- Tổng số khách hàng --------------------------
      function khachhang() {
        $.ajax('/TMDT/backend/functions/ajax/api_kh.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.quantity}</h1>`;
            $('#khachhang').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#khachhang').html(htmlString);
          }
        });
      }
      $('#refreshKH').click(function(event) {
        event.preventDefault();
        khachhang();
      });

      // ----------------- Tổng số đơn hàng --------------------------
      function nhanvien() {
        $.ajax('/TMDT/backend/functions/ajax/api_nv.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.quantity}</h1>`;
            $('#nhanvien').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#nhanvien').html(htmlString);
          }
        });
      }
      $('#refreshNV').click(function(event) {
        event.preventDefault();
        nhanvien();
      });

      // ----------------- Tổng số Góp ý --------------------------
      function dondathang() {
        $.ajax('/TMDT/backend/functions/ajax/api_ddh.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.quantity}</h1>`;
            $('#dondathang').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#dondathang').html(htmlString);
          }
        });
      }
      $('#refreshDDH').click(function(event) {
        event.preventDefault();
        dondathang();
      });


      // ----------------- Tổng số Góp ý --------------------------
      function khuyenmai() {
        $.ajax('/TMDT/backend/functions/ajax/api_km.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.quantity}</h1>`;
            $('#khuyenmai').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#khuyenmai').html(htmlString);
          }
        });
      }
      $('#refreshKM').click(function(event) {
        event.preventDefault();
        khuyenmai();
      });


      // ------------------ Vẽ biểu đồ thống kê Loại sản phẩm -----------------
      // Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
      var $objChartThongKeLoaiSanPham;
      var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
        "2d");

      function renderChartThongKeLoaiSanPham() {
        $.ajax({
          url: '/TMDT/backend/functions/ajax/api_nhh.php',
          type: "GET",
          success: function(response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function() {
              myLabels.push((this.ten_nhh));
              myData.push(this.quantity);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
              $objChartThongKeLoaiSanPham.destroy();
            }
            $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
              // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
              type: "bar",
              data: {
                labels: myLabels,
                datasets: [{
                  data: myData,
                  borderColor: "#9ad0f5",
                  backgroundColor: "#9ad0f5",
                  borderWidth: 1
                }]
              },
              // Cấu hình dành cho biểu đồ của ChartJS
              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "Thống kê loại hàng hóa"
                },
                responsive: true
              }
            });
          }
        });
      };
      $('#refreshThongKeLoaiSanPham').click(function(event) {
        event.preventDefault();
        renderChartThongKeLoaiSanPham();
      });

      // Mới mở web (khi trang web load xong)
      // thì sẽ gọi lập tức một số hàm AJAX gọi API lấy dữ liệu
      hanghoa();
      khachhang();
      nhanvien();
      dondathang();
      khuyenmai();

    });
  </script>
</body>
</html>