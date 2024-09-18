<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Thông tin kết nối
$servername = "sql110.infinityfree.com";
$username = "if0_37102140"; // Thay bằng tên người dùng của bạn
$password = "huyen15042005"; // Thay bằng mật khẩu của bạn
$dbname = "if0_37102140_b5_mydb"; // Thay bằng tên cơ sở dữ liệu của bạn

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Chuẩn bị câu lệnh SQL
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
ON UPDATE CURRENT_TIMESTAMP
)";

// Thực thi câu lệnh SQL
if ($conn->query($sql) === TRUE) {
    echo "Bản ghi mới đã được thêm thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
</body>
</html>