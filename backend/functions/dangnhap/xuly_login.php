
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #7f165f59;
    }
    </style>
<body>
    
</body>
</html>
<?php
if(isset($_POST['login'])){
    session_start();
    include_once(__DIR__.'/../../../dbconect.php'); 
    $username = $_POST['txtDangNhapTK'];
    $password = md5($_POST['pwDangNhapPassword']);
    $mk = 123456;
    $sql="select *from nhanvien where sdt_nv='$username' and matkhau_nv='$password'";
    $result=mysqli_query($conn,$sql);
    $check = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if(($username == "admin" && $password == md5($mk)) || $check==1){
        echo'Xin chào: ';
        if($username == "admin" && $password == md5($mk)){
            echo '<span style="color: red;">'.$_POST['txtDangNhapTK'].'</span>';
        }else{
            echo '<span style="color: red;">'.$row['ten_nv'].'</span>';
        }
        echo'</br><a href="../../../pages/dashboard.php">Bấm vào đây để làm việc với trang chủ</a></br>';
        echo'<a href="logout.php">Đăng xuất</a>';
        $_SESSION['sdt_nv']=$username;
	}else {
		header('location: login.php') ;
        echo "<script>";
        echo "alert('Đăng nhập không thành công.')";
        echo "</script>";
	}
}
?>