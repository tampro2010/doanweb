<!-- xác định tên và tiêu đề -->
<?php
// session_start();
// $session = $_SESSION['sdt_nv'];
// $admin = "admin";
?>
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
        <div class="row ">
            <div class="col-md-2">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10">
                <h1 class="background3">Quản lý nhân viên</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT *
                    FROM nhanvien
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_kh = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_kh[]=array(
                            'ma_nv'=>$row['ma_nv'],
                            'sdt_nv'=>$row['sdt_nv'],
                            'ten_nv'=>$row['ten_nv'],
                            'gioitinh_nv'=>$row['gioitinh_nv'],
                            'email_nv'=>$row['email_nv'],
                            'diachi_nv'=>$row['diachi_nv']
                        );
                    }
                ?>
                    <div class="row">
                        <div class="col-md-2">
                            <?php if($session == "admin"): ?>
                            <a href="create.php" id="them" onclick=ngan() name="them" class="btn btn-secondary">
                                Thêm mới
                            </a>
                            <?php else:?>
                            <?php endif;?>
                        </div>
                        <div class="col-md-10">
                            <h3 class="center">Bảng thông tin nhân viên</h3>
                        </div>
                    </div>
                <table id="tblDanhsach" class="table table-success table-striped mt-2">
                    <thead class="table-dark">
                    <tr>
                        <th>Mã NV</th>
                        <th>SĐT</th>
                        <th>Tên NV</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_kh as $value): ?>
                    <tr>
                        <td><?=$value['ma_nv'];?></td>
                        <td><?=$value['sdt_nv'];?></td>
                        <td><?=$value['ten_nv'];?></td>
                        <td>
                        <?php
                        if($value['gioitinh_nv'] == 1){
                            echo'Nam';
                        }else{
                            echo'Nữ';
                        }
                        ?>
                        </td>
                        <td><?=$value['email_nv'];?></td>
                        <td><?=$value['diachi_nv'];?></td>
                        <td>
                        <?php if($session == "admin"): ?>
                        <a href="edit.php?ma_nv=<?= $value['ma_nv'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="delete.php?ma_nv=<?= $value['ma_nv'] ?>" onclick="xoa()" class="btn btn-danger">
                        <span data-feather="delete"></span> Xóa
                        </a>
                        <?php else:?>
                        <?php endif;?>
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

    
</body>
</html>