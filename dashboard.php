<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-box {
            background: white;
            width: 400px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        .avatar {
            width: 80px;
            height: 80px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        h2 {
            margin: 0 0 10px;
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 30px;
        }
        .user-email {
            font-weight: bold;
            color: #007bff;
        }
        .logout-btn {
            display: inline-block;
            background-color: #dc3545; 
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: background 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="dashboard-box">
        <div class="avatar">
            <?= strtoupper(substr($_SESSION['user'], 0, 1)) ?>
        </div>

        <h2>Xin chào!</h2>
        <p>Bạn đang đăng nhập với tài khoản:<br>
            <span class="user-email"><?= htmlspecialchars($_SESSION['user']); ?></span>
        </p>

        <a href="logout.php" class="logout-btn">Đăng xuất</a>
    </div>

</body>
</html>
