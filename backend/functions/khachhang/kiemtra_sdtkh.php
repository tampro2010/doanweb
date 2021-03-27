<?php

    $sdt = $_GET['q'];
    include_once(__DIR__.'/../../../dbconect.php');
    $sql ="select sdt_kh from khachhang";
    $result=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_array($result)){
        if($sdt !== ""){
            foreach($row as $sdt_kh){

            }
            if($sdt == $sdt_kh){
                // echo'<span style="color: red;">
                // Số điện thoại tồn tại
                // </span>';
                echo"Số điện thoại tồn tại!";
            }
        }
    }

?>