<?php
require './libs/students.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';

if ($id) {
    // Kết nối tới cơ sở dữ liệu và xóa sinh viên
    if (delete_student($id)) {
        // Xóa thành công
        header("location: students_list.php?status=success");
    } else {
        // Xóa không thành công
        header("location: students_list.php?status=error");
    }
} else {
    // Nếu không có ID, trở về danh sách với thông báo lỗi
    header("location: students_list.php?status=invalid_id");
}
exit; // Dừng script sau khi chuyển hướng
?>