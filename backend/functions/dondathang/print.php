<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In đơn hàng</title>
    <link rel="stylesheet" href="/hoc_back-end/assets/vendor/paper-css/paper.css" type="text/css">

    <style>@page { size: A4 }</style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
                <?php 
                $ma_dhh= $_GET['ma_dhh'];
                    include_once(__DIR__.'/../../../dbconect.php');
                    $sql = <<<EOT
                    SELECT dhh.ma_dhh,kh.sdt_kh, dhh.ngaydathang, dhh.ngaygiaohang, kh.ten_kh, kh.diachi_kh, km.noidung_km,SUM((km.phantram * ctdhh.soluong_mua *ctdhh.gia_mua )/ 100) AS tongtien, dhh.trangthai,dhh.diachi_dhh,hh.ten_dt
                    from dathanghoa dhh
                    JOIN khachhang kh ON dhh.ma_kh = kh.ma_kh
                    JOIN chitiet_dathanghoa ctdhh ON dhh.ma_dhh = ctdhh.ma_dhh
                    JOIN khuyenmai km ON dhh.ma_km = km.ma_km
                    JOIN hanghoa hh ON ctdhh.ma_hh = hh.ma_hh
                    where dhh.ma_dhh = $ma_dhh
                    GROUP BY hh.ten_dt,dhh.ma_dhh,kh.sdt_kh, dhh.ngaydathang, dhh.ngaygiaohang, dhh.trangthai, kh.diachi_kh, kh.ten_kh, km.phantram, km.noidung_km, ctdhh.soluong_mua,ctdhh.gia_mua, dhh.diachi_dhh
EOT;
                    $result = mysqli_query($conn,$sql);
                    $ds_dhh = [];
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $ds_dhh [] = array(
                            'ma_dhh' => $row['ma_dhh'],
                            'ngaydathang' => $row['ngaydathang'],
                            'ngaygiaohang' => $row['ngaygiaohang'],
                            'ten_kh' => $row['ten_kh'],
                            'diachi_kh' => $row['diachi_kh'],
                            'diachi_dhh' => $row['diachi_dhh'],
                            'tongtien' => $row['tongtien'],
                            'ten_dt' => $row['ten_dt'],
                            'trangthai' => $row['trangthai']
                        );
                    }
                ?>
    <table  width="100%">
        <tr>
            <td><img src="/hoc_back-end/assets/uploads/share/default-avatar.png" alt="Hinh" width="100px" height="100px"></td>
            <td style="text-align: center;"><h4>SHOP BÁN ĐIỆN THOẠI DI ĐỘNG <br> LAPTOP THÔNG MINH<br> T A M</h4></td>
        </tr>
    </table>
    <p style="font-weight: bold;">Thông tin đơn hàng</p>
    <table border="1px" width="100%" style="border-collapse: collapse;">
    <?php foreach($ds_dhh as $sp): ?>
        <tr>
            <th>Khách hàng</th>
            <td><?= $sp['ten_kh']; ?></td>
        </tr>
        <tr>
            <th>Địa chỉ khách hàng</th>
            <td><?= $sp['diachi_kh']; ?></td>
        </tr>
        <tr>
            <th>Tên hàng hóa</th>
            <td><?= $sp['ten_dt']; ?></td>
        </tr>
        <tr>
            <th>Ngày đặt hàng</th>
            <td><?= $sp['ngaydathang']; ?></td>
        </tr>
        <tr>
            <th>Ngày giao hàng</th>
            <td><?= $sp['ngaygiaohang']; ?></td>
        </tr>
        <tr>
            <th>Nơi giao</th>
            <td><?= $sp['diachi_dhh']; ?></td>
        </tr>
        <tr>
            <th>Thành tiền</th>
            <td><?= number_format($sp['tongtien']); ?> vnd</td>
        </tr>
    <?php endforeach; ?>
    </table>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-left: 450px;margin-top:50px;">
                <i style="margin-left: 16px;">Cần Thơ , Thứ...Ngày...Tháng...Năm...</i>
                <h2 style="text-align:center;">Ký tên</h2><br><br><br>
                <h3 style="text-align:center;">...............................................</h3>
            </div>
        </div>
    </div>
    </section>
</body>
</html>