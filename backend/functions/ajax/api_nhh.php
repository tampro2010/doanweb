
<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconect.php'); 

// 2. Chuẩn bị câu truy vấn $sql
$sql = <<<EOT
        SELECT nhh.ten_nhh as ten, COUNT(*) AS quantity
            FROM `hanghoa` hh
            JOIN `nhomhanghoa` nhh ON hh.ma_nhh = nhh.ma_nhh
            GROUP BY hh.ma_nhh
EOT;

// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sql);

// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$datasql = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $datasql[] = array(
        'ten_nhh' => $row['ten'],
        'quantity' => $row['quantity']
    );
}

// Dữ liệu JSON, array PHP -> JSON 
echo json_encode($datasql);
?>
