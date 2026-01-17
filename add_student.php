<?php
$message = "";

if (isset($_POST['submit'])) {

    include "db_connect.php";

    $fullname = $_POST['fullname'];
    $student_code = $_POST['student_code'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (fullname, student_code, email)
            VALUES (:fullname, :student_code, :email)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':student_code', $student_code);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $message = "Thêm sinh viên thành công!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
        }

        .container {
            width: 400px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Thêm sinh viên</h2>

    <?php if ($message != ""): ?>
        <div class="success"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Họ tên</label>
        <input type="text" name="fullname" required>

        <label>Mã sinh viên</label>
        <input type="text" name="student_code" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit" name="submit">Thêm mới</button>
    </form>
</div>

</body>
</html>
