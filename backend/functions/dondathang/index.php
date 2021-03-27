<!-- xác định tên và tiêu đề -->

<?php include_once(__DIR__.'/../../layouts/config.php'); ?>
<!DOCTYPE html>
<head>
    <!-- datatables -->
    <link href="/hoc_back-end/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/hoc_back-end/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <!-- nhúng file head -->
    <?php include_once(__DIR__.'/../../layouts/head.php'); ?>
    <style>
        body{
            background-color: #7f165f59;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include_once(__DIR__.'/../../layouts/partials/header.php'); ?>
    <!-- content -->
    <div class="container-fluit ">
        <div class="row">
            <div class="col-md-2 ">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10">
                <h1 class="background3">Quản lý đơn đặt hàng</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT dhh.ma_dhh,kh.sdt_kh, dhh.ngaydathang, dhh.ngaygiaohang, kh.ten_kh, kh.diachi_kh, km.noidung_km,SUM((km.phantram * ctdhh.soluong_mua *ctdhh.gia_mua )/ 100) AS tongtien, dhh.trangthai,dhh.diachi_dhh, sum(ctdhh.soluong_mua *ctdhh.gia_mua) as thanhtien
                    from dathanghoa dhh
                    JOIN khachhang kh ON dhh.ma_kh = kh.ma_kh
                    JOIN chitiet_dathanghoa ctdhh ON dhh.ma_dhh = ctdhh.ma_dhh
                    JOIN khuyenmai km ON dhh.ma_km = km.ma_km
                    GROUP BY dhh.ma_dhh,kh.sdt_kh, dhh.ngaydathang, dhh.ngaygiaohang, dhh.trangthai, kh.diachi_kh, kh.ten_kh, km.phantram, km.noidung_km, ctdhh.soluong_mua,ctdhh.gia_mua, dhh.diachi_dhh
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_dhh = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_dhh[]=array(
                            'ma_dhh'=>$row['ma_dhh'],
                            'sdt_kh'=>$row['sdt_kh'],
                            'ngaydathang'=>$row['ngaydathang'],
                            'ngaygiaohang'=>$row['ngaygiaohang'],
                            'ten_kh'=>$row['ten_kh'],
                            'noidung_km'=>$row['noidung_km'],
                            'tongtien'=>$row['tongtien'],
                            'diachi_dhh'=>$row['diachi_dhh'],
                            'thanhtien'=>$row['thanhtien'],
                            'trangthai'=>$row['trangthai']
                        );
                    }
                ?>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="create.php" class="btn btn-secondary">
                                Thêm mới
                            </a>
                        </div>
                        <div class="col-md-10">
                            <h3 class="center">Bảng thông tin đơn đặt hàng</h3>
                        </div>
                    </div>
                <table id="tblDanhsach" class="table table-success table-striped mt-2">
                    <thead class="table-dark">
                    <tr>
                        <th>Mã ĐĐH</th>
                        <th>SĐT KH</th>
                        <th>Ngày BĐ</th>
                        <th>Ngày KT</th>
                        <th>Tên KH</th>
                        <th>Nội dung KM</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                        <th>Print</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_dhh as $value): ?>
                    <tr>
                        <td><?=$value['ma_dhh'];?></td>
                        <td><?=$value['sdt_kh'];?></td>
                        <td><?=$value['ngaydathang'];?></td>
                        <td><?=$value['ngaygiaohang'];?></td>
                        <td><?=$value['ten_kh'];?></td>
                        <td><?=$value['noidung_km'];?></td>
                        <td><?=$value['diachi_dhh'];?></td>
                        <td><?=number_format($value['thanhtien']);?> VNĐ</td>
                        <td>
                        <?php
                        if($value['trangthai'] == 1){
                            echo'<span style="color: green;">Đã xử lý</span>';
                        }else{
                            echo'<span style="color: red;">Chưa xử lý</span>';
                        }
                        ?>
                        </td>
                        <td>
                        <a href="edit.php?ma_dhh=<?= $value['ma_dhh'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="delete.php?ma_dhh=<?= $value['ma_dhh'] ?>" onclick="xoa()" class="btn btn-danger">
                        <span data-feather="delete"></span> Xóa
                        </a>
                        
                        
                        </td>
                        <td><a href="print.php?ma_dhh=<?= $value['ma_dhh'] ?>" class="btn btn-primary">In</a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            
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
        // function xoa(){
        //     confirm("Xóa thành công");
        // }
    </script>
    
</body>
</html>