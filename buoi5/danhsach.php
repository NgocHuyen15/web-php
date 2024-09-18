<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 40px;
            color: #444;
        }
        h2 {
            text-align: center;
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        th, td {
            padding: 16px 20px;
            text-align: left;
        }
        th {
            background-color: #6c63ff;
            color: white;
            font-weight: 600;
        }
        td {
            border-bottom: 1px solid #e0e0e0;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover td {
            background-color: #f1f5f9;
        }
        form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }
        input[type="text"], input[type="email"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
            font-size: 16px;
        }
        button {
            background-color: #6c63ff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #574bff;
        }
        a {
            color: #ff4b5c;
            text-decoration: none;
            margin-left: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-form {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 40px;
        }
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>

<h2>Danh sách nhân viên</h2>

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

// Thêm người dùng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
    $conn->query($sql);
}

// Sửa người dùng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    
    $sql = "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$id";
    $conn->query($sql);
}

// Xóa người dùng
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM MyGuests WHERE id=$id";
$conn->query($sql);
}

// Hiển thị bảng
$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Actions</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['reg_date']}</td>
                <td class='action-buttons'>
                    <form style='display:inline;' method='POST'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <input type='text' name='firstname' value='{$row['firstname']}' required>
                        <input type='text' name='lastname' value='{$row['lastname']}' required>
                        <input type='email' name='email' value='{$row['email']}' required>
                        <button type='submit' name='edit'>Sửa</button>
                    </form>
                    <a href='?delete={$row['id']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\");'>Xóa</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}

// Form thêm người dùng
echo "<div class='add-form'>
        <h3>Thêm người dùng</h3>
        <form method='POST'>
            <input type='text' name='firstname' placeholder='Firstname' required>
            <input type='text' name='lastname' placeholder='Lastname' required>
            <input type='email' name='email' placeholder='Email' required>
            <button type='submit' name='add'>Thêm</button>
        </form>
      </div>";

// Đóng kết nối
$conn->close();
?>

</body>
</html>
