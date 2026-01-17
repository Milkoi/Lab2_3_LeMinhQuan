<?php
require 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword
    ])) {
        $message = "Đăng ký thành công!";
    } else {
        $message = "Có lỗi xảy ra, vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #ffffff;
            width: 360px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            margin-left: 2.5%;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #0b5ed7;
        }

        .message {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Đăng ký tài khoản</h2>

    <form method="post">
        <input type="email" name="email" placeholder="Nhập email" required>
        <input type="password" name="password" placeholder="Nhập mật khẩu" required>
        <button type="submit">Đăng ký</button>
    </form>

    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>
</div>

</body>
</html>
