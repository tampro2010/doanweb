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
    <style>
        body{
            background-color: #7f165f59;
        }
    </style>
<body>
    <!-- header -->
    <?php include_once(__DIR__.'/../../layouts/partials/header.php'); ?>
    <!-- content -->
    <div class="container-fluit ">
        <div class="row">
            <div class="col-md-2">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10">
                <h1 class=" canhgiua background3">Quản lý khách hàng</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT *
                    FROM khachhang
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_kh = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_kh[]=array(
                            'ma_kh'=>$row['ma_kh'],
                            'sdt_kh'=>$row['sdt_kh'],
                            'ten_kh'=>$row['ten_kh'],
                            'gioitinh_kh'=>$row['gioitinh_kh'],
                            'emai_kh'=>$row['emai_kh'],
                            'diachi_kh'=>$row['diachi_kh']
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
                            <h3 class="center">Bảng thông tin khách hàng</h3>
                        </div>
                    </div>
                <table id="tblDanhsach" class="table table-success table-striped mt-2">
                    <thead class="table-dark">
                    <tr>
                        <th>Mã KH</th>
                        <th>SĐT</th>
                        <th>Tên KH</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_kh as $value): ?>
                    <tr>
                        <td><?=$value['ma_kh'];?></td>
                        <td><?=$value['sdt_kh'];?></td>
                        <td><?=$value['ten_kh'];?></td>
                        <td>
                        <?php
                        if($value['gioitinh_kh'] == 1){
                            echo'Nam';
                        }else{
                            echo'Nữ';
                        }
                        ?>
                        </td>
                        <td><?=$value['emai_kh'];?></td>
                        <td><?=$value['diachi_kh'];?></td>
                        <td>
                        <a href="edit.php?ma_kh=<?= $value['ma_kh'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="delete.php?ma_kh=<?= $value['ma_kh'] ?>" onclick="xoa()" class="btn btn-danger">
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