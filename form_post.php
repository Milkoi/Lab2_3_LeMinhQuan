<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }

        .container {
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .success {
            margin-top: 15px;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Đăng ký (POST)</h2>

    <form method="post">
        <label>Họ tên</label>
        <input type="text" name="name" placeholder="Nhập họ tên" required>

        <label>Mật khẩu</label>
        <input type="password" name="password" placeholder="Nhập mật khẩu" required>

        <button type="submit">Đăng ký</button>
    </form>

    <?php
    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        echo "<div class='success'>Đã nhận thông tin của <b>$name</b></div>";
    }
    ?>
</div>

</body>
</html>
