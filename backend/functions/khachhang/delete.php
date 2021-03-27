<?php
    $ma_kh=$_GET['ma_kh'];
    include_once(__DIR__.'/../../../dbconect.php'); 
    
    $sql="DELETE FROM khachhang WHERE ma_kh='$ma_kh'";
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