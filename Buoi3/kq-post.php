<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $ten_sach = htmlspecialchars($_POST['ten_sach']);
    $tac_gia = htmlspecialchars($_POST['tac_gia']);
    $nha_xuat_ban = htmlspecialchars($_POST['nha_xuat_ban']);
    $nam_xuat_ban = htmlspecialchars($_POST['nam_xuat_ban']);

    echo "<h2>Thông tin sách (POST):</h2>";
    echo "Tên sách: $ten_sach<br>";
    echo "Tác giả: $tac_gia<br>";
    echo "Nhà xuất bản: $nha_xuat_ban<br>";
    echo "Năm xuất bản: $nam_xuat_ban<br><hr>";
} else {
    echo "<h2>Không có dữ liệu được gửi.</h2>";
}
