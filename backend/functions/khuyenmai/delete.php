<?php
    $ma_km=$_GET['ma_km'];
    include_once(__DIR__.'/../../../dbconect.php'); 
    
    $sql="DELETE FROM khuyenmai WHERE ma_km='$ma_km'";
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