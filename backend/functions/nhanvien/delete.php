<?php
    $ma_nv=$_GET['ma_nv'];
    include_once(__DIR__.'/../../../dbconect.php'); 
    $sql="DELETE FROM nhanvien WHERE ma_nv='$ma_nv'";
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