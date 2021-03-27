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
    <?php include_once(__DIR__.'/../../layouts/partials/header.php'); ?>
    <!-- content -->
    <div class="container-fluit background">
        <div class="row">
            <div class="col-md-2">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10">
                <h1 class="background3 canhgiua">Quản lý sản phẩm</h1>
                <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT *
                    FROM hanghoa hh
                    JOIN khuyenmai km ON hh.ma_km = km.ma_km
                    JOIN nhomhanghoa nhh ON hh.ma_nhh = nhh.ma_nhh
                    JOIN chitiethanghoa cthh ON hh.ma_cthh = cthh.ma_cthh
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_sp = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $thongtin = '0';
                        if($row['apdung'] != '0'){
                            $thongtin = sprintf(
                                "Nội dung khuyến mãi: %s từ: %s-%s",
                                $row['noidung_km'],
                                DATE('d/m/Y H:i:s',strtotime($row['ngaybatdau_km'])),
                                DATE('d/m/Y H:i:s',strtotime($row['ngayketthuc_km']))
                            );
                        }
                        $ds_sp[]=array(
                            'ma_hh'=>$row['ma_hh'],
                            'ma_nhh'=>$row['ma_nhh'],
                            'ten_nhh'=>$row['ten_nhh'],
                            'loai_chitiet'=>$row['loai_chitiet'],
                            'apdung'=>$row['apdung'],
                            'ten_dt'=>$row['ten_dt'],
                            'giacu_dt'=>$row['giacu_dt'],
                            'giamoi_dt'=>$row['giamoi_dt'],
                            'soluong_dt'=>$row['soluong_dt'],
                            'hinh1_dt'=>$row['hinh1_dt'],
                            'hinh2_dt'=>$row['hinh2_dt'],
                            'hinh3_dt'=>$row['hinh3_dt'],
                            'thongtin'=> $thongtin
                        );
                    }
                ?><div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="create.php" class="btn btn-secondary">
                                Thêm mới
                            </a>
                        </div>
                        <div class="col-md-10">
                            <h3 class="center">Bảng thông tin sản phẩm</h3>
                        </div>
                    </div>
                </div>
                <table id="tblDanhsach" class="table table-success table-striped mt-2">
                    <thead class="table-dark">
                        <tr>
                            <th>Mã HH</th>
                        <th>Nhóm HH</th>
                        <th>Loại CTHH</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá cũ</th>
                        <th>Giá mới</th>
                        <th>Số lượng</th>
                        <th>Hình 1</th>
                        <th>Hình 2</th>
                        <th>Hình 3</th>
                        <th>Khuyến mãi</th>
                        <th>Hành động</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_sp as $value): ?>
                    <tr>
                        <td><?=$value['ma_hh'];?></td>
                        <td><?=$value['ten_nhh'];?></td>
                        <td><?=$value['loai_chitiet'];?></td>
                        <td><?=$value['ten_dt'];?></td>
                        <td><?=NUMBER_FORMAT($value['giacu_dt']);?> VNĐ</td>
                        <td><?=number_format($value['giamoi_dt']);?> VNĐ</td>
                        <td><?=number_format($value['soluong_dt']);?> </td>
                        <td><img src="../../../assets/uploads/products/<?=$value['hinh1_dt'];?>" alt="hình" width="50px" height="50px"></td>
                        <td><img src="../../../assets/uploads/products/<?=$value['hinh2_dt'];?>" alt="hình" width="50px" height="50px"></td>
                        <td><img src="../../../assets/uploads/products/<?=$value['hinh3_dt'];?>" alt="hình" width="50px" height="50px"></td>
                        
                        <td><?=$value['thongtin'];?></td>
                        <td style="float: left;padding:0px 25px;">
                        <a href="edit.php?ma_hh=<?= $value['ma_hh'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="edit_hinhsp.php?ma_hh=<?= $value['ma_hh'] ?>" class="btn btn-warning">
                        <span data-feather="edit_hinhsp" style="font-size: 15px;">sửa ảnh</span> 
                        </a>
                        <a href="delete.php?ma_hh=<?= $value['ma_hh'] ?>" onclick="xoa()" class="btn btn-danger">
                        <span data-feather="delete"></span> Xóa
                        </a>
                        
                        </td>
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