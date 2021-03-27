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
    <div class="container-fluit">
        <div class="row">
            <div class="col-md-3">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-9">
                <h1>Danh sách chi tiết hàng hóa</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT *
                    FROM chitiethanghoa where loai_chitiet like '%DT%'
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_cthh = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_cthh[]=array(
                            'ma_cthh'=>$row['ma_cthh'],
                            'loai_chitiet'=>$row['loai_chitiet'],
                            'manhinh'=>$row['manhinh'],
                            'camerasau'=>$row['camerasau'],
                            'cameraselfile'=>$row['cameraselfile'],
                            'ram'=>$row['ram'],
                            'bonhotrong'=>$row['bonhotrong'],
                            'chip'=>$row['chip'],
                            'GPU'=>$row['GPU'],
                            'pin'=>$row['pin'],
                            'sms'=>$row['sms'],
                            'hedieuhanh'=>$row['hedieuhanh'],
                            'xuatxu'=>$row['xuatxu'],
                            'namsx'=>$row['namsx']
                        );
                    }
                    $sql1 = <<<EOT
                    SELECT *
                    FROM chitiethanghoa where loai_chitiet like '%LT%'
EOT;
                    $result1 = mysqli_query($conn,$sql1);
                    $ds_cthh1 = [];
                    while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                        $ds_cthh1[]=array(
                            'ma_cthh'=>$row['ma_cthh'],
                            'loai_chitiet'=>$row['loai_chitiet'],
                            'manhinh'=>$row['manhinh'],
                            'ram'=>$row['ram'],
                            'bonhotrong'=>$row['bonhotrong'],
                            'chip'=>$row['chip'],
                            'GPU'=>$row['GPU'],
                            'hedieuhanh'=>$row['hedieuhanh'],
                            'xuatxu'=>$row['xuatxu'],
                            'namsx'=>$row['namsx'],
                            'dohoa_lt'=>$row['dohoa_lt'],
                            'ocung_lt'=>$row['ocung_lt'],
                            'trongluong_lt'=>$row['trongluong_lt'],
                            'kichthuoc_lt'=>$row['kichthuoc_lt']
                        );
                    }
                ?>
                <a href="create.php" class="btn btn-primary">
                Thêm mới
                </a>
                <h5>Danh sách chi tiết điện thoại</h5>
                <table id="tblDanhsach" class="table table-bordered table-hover table-dark mt-2">
                    <thead>
                    <tr>
                        <th>Hành động</th>
                        <th>Mã CTHH</th>
                        <th>Loại CTHH</th>
                        <th>Màn hình</th>
                        <th>Camerasau</th>
                        <th>Cameratrước</th>
                        <th>RAM</th>
                        <th>Bộ nhớ</th>
                        <th>Chip</th>
                        <th>GPU</th>
                        <th>PIN</th>
                        <th>Sim</th>
                        <th>HĐH</th>
                        <th>Xuất xứ</th>
                        <th>Năm SX</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_cthh as $value): ?>
                    <tr>
                    <td>
                        <a href="edit.php?ma_cthh=<?= $value['ma_cthh'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="delete.php?ma_cthh=<?= $value['ma_cthh'] ?>" onclick="xoa()" class="btn btn-danger">
                        <span data-feather="delete"></span> Xóa
                        </a>
                        </td>
                        
                        <td><?=$value['ma_cthh'];?></td>
                        <td><?=$value['loai_chitiet'];?></td>
                        <td><?=$value['manhinh'];?></td>
                        <td><?=$value['camerasau'];?></td>
                        <td><?=$value['cameraselfile'];?></td>
                        <td><?=$value['ram'];?></td>
                        <td><?=$value['bonhotrong'];?></td>
                        <td><?=$value['chip'];?></td>
                        <td><?=$value['GPU'];?></td>
                        <td><?=$value['pin'];?></td>
                        <td><?=$value['sms'];?></td>
                        <td><?=$value['hedieuhanh'];?></td>
                        <td><?=$value['xuatxu'];?></td>
                        <td><?=$value['namsx'];?></td>
                        
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <h5>Danh sách chi tiết Laptop</h5>
                <table id="tblDanhsach" class="table table-bordered table-hover table-dark mt-2">
                    <thead>
                    <tr>
                        <th>Hành động</th>
                        <th>Mã CTHH</th>
                        <th>Loại CTHH</th>
                        <th>Màn hình</th>
                        <th>RAM</th>
                        <th>Chip</th>
                        <th>HĐH</th>
                        <th>Xuất xứ</th>
                        <th>Năm SX</th>
                        <th>Đồhọa LT</th>
                        <th>Ổcứng LT</th>
                        <th>Trọnglượng LT</th>
                        <th>Kíchthước LT</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_cthh1 as $value): ?>
                    <tr>
                    <td>
                        <a href="edit.php?ma_cthh=<?= $value['ma_cthh'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="delete.php?ma_cthh=<?= $value['ma_cthh'] ?>" onclick="xoa()" class="btn btn-danger">
                        <span data-feather="delete"></span> Xóa
                        </a>
                        </td>
                        
                        <td><?=$value['ma_cthh'];?></td>
                        <td><?=$value['loai_chitiet'];?></td>
                        <td><?=$value['manhinh'];?></td>
                        <td><?=$value['ram'];?></td>
                        <td><?=$value['chip'];?></td>
                        <td><?=$value['hedieuhanh'];?></td>
                        <td><?=$value['xuatxu'];?></td>
                        <td><?=$value['namsx'];?></td>
                        <td><?=$value['dohoa_lt'];?></td>
                        <td><?=$value['ocung_lt'];?></td>
                        <td><?=$value['trongluong_lt'];?></td>
                        <td><?=$value['kichthuoc_lt'];?></td>
                        
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