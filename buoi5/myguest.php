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
$password = "huyen15042005";
$dbname = "if0_37102140_b5_mydb"; // Thay bằng tên cơ sở dữ liệu của bạn

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Chuẩn bị câu lệnh SQL
$sql = " INSERT IGNORE INTO MyGuests(firstname, lastname, email)
values ('John','Doe','jone@exmable.com'),
('Jane','Smith','jane@exmable.com'),
('James','Johnson','jame@exmable.com'),
('Emily','Brown','emily@exmable.com'),
('Michael','Davis','michael@exmable.com')";

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