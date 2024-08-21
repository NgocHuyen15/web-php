<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        form {
            background-color: white;
            border: 3px solid #9999FF;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 450px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
        }
        
        td {
            padding: 10px 0;
        }
        
        .label {
            font-weight: bold;
            text-align: right;
            padding-right: 20px;
        }
        
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="radio"] {
            margin-right: 5px;
        }
        
        button {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #009999;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="B3trangkq.php" method="post">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <table>
            <tr>
                <td class="label">Chọn phép tính:</td>
                <td>
                    <input type="radio" name="operation" value="Tong"> Tổng
                    <input type="radio" name="operation" value="Hieu"> Hiệu
                    <input type="radio" name="operation" value="Tich"> Tích
                    <input type="radio" name="operation" value="Thuong"> Thương
                </td>
            </tr>
            <tr>
                <td class="label">Số thứ nhất:</td>
                <td><input type="number" name="num1"></td>
            </tr>
            <tr>
                <td class="label">Số thứ hai:</td>
                <td><input type="number" name="num2"></td>
            </tr>
            <tr>
                <td></td>
                <td><button>Tính</button></td>
            </tr>
        </table>
    </form>
</body>
</html>