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
            <div class="col-md-2 background">

            <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>

            </div>
            <div class="col-md-10 background1">
                <h1 class="background2">Sửa hình sản phẩm</h1>
                    <?php 
                    include_once(__DIR__.'/../../../dbconect.php'); 
                    $sql1 = <<<EOT
                    select *
                    FROM hanghoa
    EOT;
                    $result1 = mysqli_query($conn,$sql1);
                    $ds_hh = [];
                    while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                        $ds_hh[]=array(
                            'ma_hh'=>$row['ma_hh'],
                            'ten_dt'=>$row['ten_dt']
                        );
                    }
    
                    $ma_hh = $_GET['ma_hh'];
                    $sqlSelected = <<<EOT
                        SELECT * FROM hanghoa where ma_hh = '$ma_hh'
EOT;

                    $resultSelected = mysqli_query($conn,$sqlSelected);
                    $rowSelected = mysqli_fetch_array($resultSelected, MYSQLI_ASSOC);

                    $upload_dir = __DIR__."/../../../assets/uploads/";
                    $subdir='products/';
                    
                    $filehinh1= $upload_dir . $subdir . $rowSelected['hinh1_dt'];
                    $filehinh2= $upload_dir . $subdir . $rowSelected['hinh2_dt'];
                    $filehinh3= $upload_dir . $subdir . $rowSelected['hinh3_dt'];
                    if(isset($_POST['save'])){
                    if (file_exists($filehinh1) || file_exists($filehinh2) || file_exists($filehinh3)) {
                        unlink($filehinh1);
                        unlink($filehinh2);
                        unlink($filehinh3);
                    }
                }
                ?>
               
<form action="" method="post" name="frmCreatehh" id="frmCreatehh" enctype="multipart/form-data">
               <div class="form-group">
               <label for="ma_hh">Tên hàng hóa </label>
                    <?php foreach($ds_hh as $ds_sp) : ?>
                        <?php if($rowSelected['ma_hh'] == $ds_sp['ma_hh']):?>
                            <span style="font-weight: bold;font-size: 20px;"><?=$ds_sp['ten_dt']; ?></span>
                       
                        <?php endif ?>
                        <?php endforeach ?>
               </div>
               <div class="form-group">
                    <label for="">Hình sản phẩm cũ</label>
                    <img src="../../../assets/uploads/products/<?=$rowSelected['hinh1_dt']?>" alt="Hình" idth="100px" height="100px">
                </div>
                <div class="preview-img-container">
                    <img src="../../../assets/uploads/share/default-avatar.png" id="preview1-img" width="200px" />
                </div>
               <div class="form-group">
                    <label for="hinh1_dt">Hình 1</label>
                    <input type="file" id="hinh1_dt" name="hinh1_dt" class="form-control">
               </div>
               <div class="form-group">
                    <label for="">Hình sản phẩm cũ</label>
                    <img src="../../../assets/uploads/products/<?=$rowSelected['hinh2_dt']?>" alt="Hình" idth="100px" height="100px">
                </div>
                <div class="preview-img-container">
                    <img src="../../../assets/uploads/share/default-avatar.png" id="preview2-img" width="200px" />
                </div>
               <div class="form-group">
                    <label for="hinh2_dt">Hình 2</label>
                    <input type="file" id="hinh2_dt" name="hinh2_dt" class="form-control">
               </div>
               <div class="form-group">
                    <label for="">Hình sản phẩm cũ</label>
                    <img src="../../../assets/uploads/products/<?=$rowSelected['hinh3_dt']?>" alt="Hình" idth="100px" height="100px">
                </div>
                <div class="preview-img-container">
                    <img src="../../../assets/uploads/share/default-avatar.png" id="preview3-img" width="200px" />
                </div>
               <div class="form-group">
                    <label for="hinh3_dt">Hình 3</label>
                    <input type="file" id="hinh3_dt" name="hinh3_dt" class="form-control">
               </div>
               <div class="form-group" style="text-align: center;">
                    <input type="submit" id="save" name="save" value="Lưu" class="btn btn-primary">
               </div>
               </form>
            </div>
               <?php
                    if(isset($_POST['save'])){
                        $tentaptin1 = $_FILES['hinh1_dt']['name'];
                        $tenhinh1=date("dmYHis").'_'.$tentaptin1;

                        $tentaptin2 = $_FILES['hinh2_dt']['name'];
                        $tenhinh2=date("dmYHis").'_'.$tentaptin2;

                        $tentaptin3 = $_FILES['hinh3_dt']['name'];
                        $tenhinh3=date("dmYHis").'_'.$tentaptin3;

                        $sql4 = <<<EOT
                        UPDATE hanghoa
                        SET
                            hinh1_dt='$tenhinh1',
                            hinh2_dt='$tenhinh2',
                            hinh3_dt='$tenhinh3'
                        WHERE ma_hh ='$ma_hh'
EOT;
                        $result4=mysqli_query($conn,$sql4);

                        if($_FILES['hinh1_dt']['error'] <= 0 || $_FILES['hinh2_dt']['error'] <= 0 || $_FILES['hinh3_dt']['error'] <= 0){
                        $upload_dir = __DIR__ . "/../../../assets/uploads/";
                        $subdir = 'products/';
                        move_uploaded_file($_FILES['hinh1_dt']['tmp_name'], $upload_dir . $subdir . $tenhinh1);
                        move_uploaded_file($_FILES['hinh2_dt']['tmp_name'], $upload_dir . $subdir . $tenhinh2);
                        move_uploaded_file($_FILES['hinh3_dt']['tmp_name'], $upload_dir . $subdir . $tenhinh3);
                        
                        echo'<script>
                            alert("thành công...");
                            </script>';
                        echo '<script>location.href = "index.php";</script>';
                        }else{
                            echo"upload thất bại";
                        }
                    }
               ?>
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
        function xoa(){
            confirm("Xóa thành công");
        }
    </script>

    <script>
        // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
        const reader = new FileReader();
        const fileInput = document.getElementById("hinh1_dt");
        const img = document.getElementById("preview1-img");
        reader.onload = e => {
        img.src = e.target.result;
        }
        fileInput.addEventListener('change', e => {
        const f = e.target.files[0];
        reader.readAsDataURL(f);
        })
    </script>
    <script>
        // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
        const reader1 = new FileReader();
        const fileInput1 = document.getElementById("hinh2_dt");
        const img1 = document.getElementById("preview2-img");
        reader1.onload = e => {
        img1.src = e.target.result;
        }
        fileInput1.addEventListener('change', e => {
        const f = e.target.files[0];
        reader1.readAsDataURL(f);
        })
    </script>
    <script>
        // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
        const reader2 = new FileReader();
        const fileInput2 = document.getElementById("hinh3_dt");
        const img2 = document.getElementById("preview3-img");
        reader2.onload = e => {
        img2.src = e.target.result;
        }
        fileInput2.addEventListener('change', e => {
        const f = e.target.files[0];
        reader2.readAsDataURL(f);
        })
    </script>
    
</body>
</html>