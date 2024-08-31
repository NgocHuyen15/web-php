<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
    $ten_sach = htmlspecialchars($_GET['ten_sach']);
    $tac_gia = htmlspecialchars($_GET['tac_gia']);
    $nha_xuat_ban = htmlspecialchars($_GET['nha_xuat_ban']);
    $nam_xuat_ban = htmlspecialchars($_GET['nam_xuat_ban']);

    echo "<h2>Thông tin sách (GET):</h2>";
    echo "Tên sách: $ten_sach<br>";
    echo "Tác giả: $tac_gia<br>";
    echo "Nhà xuất bản: $nha_xuat_ban<br>";
    echo "Năm xuất bản: $nam_xuat_ban<br><hr>";
} else {
    echo "<h2>Không có dữ liệu được gửi.</h2>";
}
