<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CCCCFF;
            color: #333;
            padding: 20px;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .result {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 102, 102, 0.5);
            padding: 20px;
            max-width: 600px; /* Adjust width as needed */
            width: 100%;
            text-align: center; /* Center text inside the result box */
        }
        h2 {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <?php
    // Fetch and sanitize data from query parameters
    $x = htmlspecialchars($_GET["Tensach"]);
    $y = htmlspecialchars($_GET["Tacgia"]);
    $z = htmlspecialchars($_GET["NSX"]);
    $t = htmlspecialchars($_GET["NXB"]);
    ?>

    <div class="result">
        <h2>Thông tin sách</h2>
        <p><strong>Tên Sách:</strong> <?php echo $x; ?></p>
        <p><strong>Tác giả:</strong> <?php echo $y; ?></p>
        <p><strong>Nhà sản xuất:</strong> <?php echo $z; ?></p>
        <p><strong>Năm xuất bản:</strong> <?php echo $t; ?></p>
    </div>
</body>
</html>
