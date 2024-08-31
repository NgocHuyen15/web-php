<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .error-message {
            color: #d8000c;
            font-size: 12px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #9999FF;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin: 20px auto 0;
        }
        input[type="submit"]:hover {
            background-color: #009999;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Initialize variables and errors
        $x = $y = $z = $t = "";
        $errors = [];

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $x = htmlspecialchars($_POST["Tensach"]);
            $y = htmlspecialchars($_POST["Tacgia"]);
            $z = htmlspecialchars($_POST["NSX"]);
            $t = htmlspecialchars($_POST["NXB"]);

            // Validation logic
            if (empty($x)) {
                $errors['Tensach'] = "Tên sách là bắt buộc.";
            }
            if (empty($y)) {
                $errors['Tacgia'] = "Tác giả là bắt buộc.";
            }
            if (empty($z)) {
                $errors['NSX'] = "Nhà sản xuất là bắt buộc.";
            }
            if (empty($t)) {
                $errors['NXB'] = "Năm xuất bản là bắt buộc.";
            } elseif (!is_numeric($t)) {
                $errors['NXB'] = "Năm xuất bản phải là số.";
            }
            

            if (empty($errors)) {
                // Redirect to result.php with data
                header("Location: bai1-KQ.php?Tensach=" . urlencode($x) . "&Tacgia=" . urlencode($y) . "&NSX=" . urlencode($z) . "&NXB=" . urlencode($t));
                exit();
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="Tensach">Tên Sách</label>
                <input type="text" id="Tensach" name="Tensach" value="<?php echo $x; ?>">
                <?php if (isset($errors['Tensach'])): ?>
                    <span class="error-message"><?php echo $errors['Tensach']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="Tacgia">Tác giả</label>
                <input type="text" id="Tacgia" name="Tacgia" value="<?php echo $y; ?>">
                <?php if (isset($errors['Tacgia'])): ?>
                    <span class="error-message"><?php echo $errors['Tacgia']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="NSX">Nhà sản xuất</label>
                <input type="text" id="NSX" name="NSX" value="<?php echo $z; ?>">
                <?php if (isset($errors['NSX'])): ?>
                    <span class="error-message"><?php echo $errors['NSX']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="NXB">Năm xuất bản <?php if (isset($errors['NXB'])): ?><span style="color: red;">*</span><?php endif; ?></label>
                <input type="text" id="NXB" name="NXB" value="<?php echo $t; ?>">
                <?php if (isset($errors['NXB'])): ?>
                    <span class="error-message"><?php echo $errors['NXB']; ?></span>
                <?php endif; ?>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
