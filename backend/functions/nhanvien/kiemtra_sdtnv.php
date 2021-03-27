<?php

    $sdt = $_GET['q'];
    include_once(__DIR__.'/../../../dbconect.php');
    $sql ="select sdt_nv from nhanvien";
    $result=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_array($result)){
        if($sdt !== ""){
            foreach($row as $sdt_nv){

            }
            if($sdt == $sdt_nv){
                // echo'<span style="color: red;">
                // Số điện thoại tồn tại
                // </span>';
                echo"Số điện thoại tồn tại!";
            }
        }
    }

?>