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
                <h1 class="background3">Quản lý khuyến mãi</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql = <<<EOT
                    SELECT *
                    FROM khuyenmai
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_km = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_km[]=array(
                            'ma_km'=>$row['ma_km'],
                            'noidung_km'=>$row['noidung_km'],
                            'ngaybatdau_km'=>DATE('d/m/Y',strtotime($row['ngaybatdau_km'])),
                            'ngayketthuc_km'=>DATE('d/m/Y',strtotime($row['ngayketthuc_km'])),
                            'phantram'=>$row['phantram'],
                            'apdung'=>$row['apdung']
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
                            <h3 class="center">Bảng thông tin khuyến mãi</h3>
                        </div>
                    </div>
                <table id="tblDanhsach" class="table table-success table-striped mt-2">
                    <thead class="table-dark">
                    <tr>
                        <th>Mã KM</th>
                        <th>Nội dung KM</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>% khuyến mãi</th>
                        <th>Áp dụng</th>
                        <th>Hành động</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ds_km as $value): ?>
                    <tr>
                        <td><?=$value['ma_km'];?></td>
                        <td><?=$value['noidung_km'];?></td>
                        <td><?=$value['ngaybatdau_km'];?></td>
                        <td><?=$value['ngayketthuc_km'];?></td>
                        <td><?=$value['phantram'];?></td>
                        <td>
                        <?php
                        if($value['apdung'] == 1){
                            echo'<span style="color: green;">Áp dụng</span>';
                        }else{
                            echo'<span style="color: red;">Không áp dụng</span>';
                        }
                        ?>
                        </td>
                        <td>
                        <a href="edit.php?ma_km=<?= $value['ma_km'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                        </a>
                        <a href="delete.php?ma_km=<?= $value['ma_km'] ?>" onclick="xoa()" class="btn btn-danger">
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