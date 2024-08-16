<!DOCTYPE html>
<html>
<head>
    <title>Phép tính trên hai số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px 0;
        }
        h1 {
            margin-bottom: 30px;
        }
        form {
            margin-bottom: 20px;
        }
        input, select {
            padding: 5px 10px;
            margin: 5px 0;
        }
        button {
            background: #009999;
            padding: 10px 20px;
            background-color: #009999;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Phép tính trên hai số</h1>
        <div class="form-group">
            <label for="num1">Số thứ nhất:</label>
            <input type="number" id="num1" name="num1" required>
        </div>
        <div class="form-group">
            <label for="num2">Số thứ hai:</label>
            <input type="number" id="num2" name="num2" required>
        </div>
        <div class="form-group">
            <label>Chọn phép tính:</label>
            <input type="radio" id="cong" name="pheptinh" value="cong" checked>
            <label for="cong">Cộng</label>
            <input type="radio" id="tru" name="pheptinh" value="tru">
            <label for="tru">Trừ</label>
            <input type="radio" id="nhan" name="pheptinh" value="nhan">
            <label for="nhan">Nhân</label>
            <input type="radio" id="chia" name="pheptinh" value="chia">
            <label for="chia">Chia</label>
        </div>
        <button onclick="tinhToan()">Tính</button>
        <button onclick="kiemTraNguyenTo()">Kiểm tra số nguyên tố</button>
        <button onclick="kiemTraChanLe()">Kiểm tra số chẵn</button>
        <div id="result"></div>
        <div id="thongtin"></div>
    </div>

    <script>
        function tinhToan() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            var pheptinh = document.querySelector('input[name="pheptinh"]:checked').value;
            var result = 0;

            switch (pheptinh) {
                case "cong":
                    result = num1 + num2;
                    break;
                case "tru":
                    result = num1 - num2;
                    break;
                case "nhan":
                    result = num1 * num2;
                    break;
                case "chia":
                    if (num2 === 0) {
                        document.getElementById("result").textContent = "Không thể chia cho 0.";
                        return;
                    }
                    result = num1 / num2;
                    break;
            }

            document.getElementById("result").textContent = "Kết quả: " + result.toFixed(2);
        }

        function kiemTraNguyenTo() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            var thongtin = "";

            if (isNguyenTo(num1)) {
                thongtin += "Số " + num1 + " là số nguyên tố. ";
            } else {
                thongtin += "Số " + num1 + " không phải là số nguyên tố. ";
            }

            if (isNguyenTo(num2)) {
                thongtin += "Số " + num2 + " là số nguyên tố.";
            } else {
                thongtin += "Số " + num2 + " không phải là số nguyên tố.";
            }

            document.getElementById("thongtin").textContent = thongtin;
        }

        function kiemTraChanLe() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            var thongtin = "";

            if (isEven(num1)) {
                thongtin += "Số " + num1 + " là số chẵn. ";
            } else {
                thongtin += "Số " + num1 + " là số lẻ. ";
            }

            if (isEven(num2)) {
                thongtin += "Số " + num2 + " là số chẵn.";
            } else {
                thongtin += "Số " + num2 + " là số lẻ.";
            }

            document.getElementById("thongtin").textContent = thongtin;
        }

        function isNguyenTo(num) {
            if (num < 2) {
                return false;
            }
            for (var i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) {
                    return false;
                }
            }
            return true;
        }

        function isEven(num) {
            return num % 2 === 0;
        }
    </script>
</body>
</html>