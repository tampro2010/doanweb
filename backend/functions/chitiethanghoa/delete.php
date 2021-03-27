<?php
    $ma_cthh=$_GET['ma_cthh'];
    include_once(__DIR__.'/../../../dbconect.php'); 

    $sql1= "select *from chitiethanghoa where ma_cthh='$ma_cthh'";
    $result1=mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result1);

    if($row['loai_chitiet'] == 'DT'){
        echo'<script>
        alert("Xóa thành công...");
        </script>';
        header("refresh:0.1;url=index2.php");
    }else if($row['loai_chitiet'] == 'LT'){
        echo'<script>
        alert("Xóa thành công...");
        </script>';
        header("refresh:0.1;url=index3.php");
    }else{

    echo'<script>
    alert("Xóa không thành công...");
    </script>';
    header("refresh:0.1;url=index2.php");
    }

    $sql="DELETE FROM chitiethanghoa WHERE ma_cthh='$ma_cthh'";
    $result=mysqli_query($conn,$sql);
// echo $ma_cthh;
    // var_dump($result1);
    // die();

?>