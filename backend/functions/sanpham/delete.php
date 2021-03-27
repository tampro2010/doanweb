<?php
    $ma_hh=$_GET['ma_hh'];
    include_once(__DIR__.'/../../../dbconect.php'); 

    $sql1="select *from hanghoa where ma_hh='$ma_hh'";
    $result1=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_array($result1, MYSQLI_ASSOC);

    $upload_dir = __DIR__."/../../../assets/uploads/";
    $subdir='products/';
    
    $filehinh1= $upload_dir . $subdir . $row['hinh1_dt'];
    $filehinh2= $upload_dir . $subdir . $row['hinh2_dt'];
    $filehinh3= $upload_dir . $subdir . $row['hinh3_dt'];
    if (file_exists($filehinh1) || file_exists($filehinh2) || file_exists($filehinh3)) {
        unlink($filehinh1);
        unlink($filehinh2);
        unlink($filehinh3);
    }
    
    $sql="DELETE FROM hanghoa WHERE ma_hh='$ma_hh'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo'<script>
        alert("Xóa thành công...");
        </script>';
        header("refresh:0.1;url=index.php");
    }else{

    echo'<script>
    alert("Xóa không thành công...");
    </script>';
    header("refresh:0.1;url=index.php");
    }
?>