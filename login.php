<?php
session_start();
require 'db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password_input = $_POST['password'];

    $sql = "SELECT * FROM students WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password_input, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai email hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
        }
        .box {
            width: 360px;
            margin: 100px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        input {
            width: 90%;
            padding: 10px;
            margin-top: 10px;
            margin-left: 2.5%;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Đăng nhập</h2>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
    </form>
</div>

</body>
</html>
