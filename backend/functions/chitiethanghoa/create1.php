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
    <div class="container-fluit ">
        <div class="row">
            <div class="col-md-2 background">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10 background1">
                <h1 class="background3">Thêm chi tiết hàng hóa</h1>
                <!-- style="position: -webkit-sticky;position: sticky;top: 0;" -->
                <a href="create2.php" class="btn btn-secondary" target="ifamCTHH">Thêm điện thoại</a>
                <a href="create3.php" class="btn btn-secondary" target="ifamCTHH">Thêm laptop</a>
                <a href="index1.php" class="btn btn-secondary" style="margin-left: 700px;">
                Xem danh sách
                </a>
                <iframe src="create2.php" frameborder="0" name="ifamCTHH" width="100%" height="800px"></iframe>
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