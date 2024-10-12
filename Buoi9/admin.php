<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: authentication.php'); // Chuyển hướng đến trang đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .nav {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .nav a:hover {
            background-color: #007bff;
            color: white;
        }
        a.logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ff4d4d;
            font-weight: bold;
            text-decoration: none;
        }
        a.logout:hover {
            text-decoration: underline;
        }
        .content {
            background: white;
            padding: 40px; /* Tăng padding */
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 1200px; /* Tăng chiều rộng tối đa */
            margin: auto;
        }
        #content {
            margin-top: 20px;
            padding: 15px;
            border-top: 1px solid #ddd;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.nav a').click(function(e) {
                e.preventDefault();
                const page = $(this).attr('href');

                $.ajax({
                    url: page,
                    type: 'GET',
                    success: function(data) {
                        $('#content').html(data);
                    },
                    error: function() {
                        $('#content').html('<p>Đã xảy ra lỗi khi tải trang.</p>');
                    }
                });
            });

            // Xử lý form từ user.php
            $(document).on('submit', 'form', function(e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định của form
                const formData = $(this).serialize(); // Lấy dữ liệu từ form

                $.post($(this).attr('action'), formData, function(data) {
                    $('#content').html(data); // Cập nhật nội dung
                });
            });
        });
    </script>
</head>
<body>
    <div class="content">
        <h1>Xin chào, Admin</h1>
        <p>Đây là trang dành cho quản trị.</p>
        <div class="nav">
            <a href="employee_list.php">Home</a>
            <a href="employee_manager.php">Quản trị nhân viên</a>
            <a href="user.php">Quản trị người dùng</a>
        </div>
        <a class="logout" href="logout.php">Đăng xuất</a>
        <div id="content">
            <p>Vui lòng chọn một liên kết.</p>
        </div>
    </div>
</body>
</html>