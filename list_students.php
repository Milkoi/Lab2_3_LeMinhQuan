<?php
include "db_connect.php";

$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #479df9ff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9f3ff;
        }

        a {
            text-decoration: none;
            font-weight: bold;
        }

        .btn-edit {
            color: #91c1f4ff;
        }

        .btn-delete {
            color: #ed4f5fff;
        }

        .btn-edit:hover {
            text-decoration: underline;
        }

        .btn-delete:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Danh sách sinh viên</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Mã SV</th>
        <th>Email</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>

    <?php foreach ($students as $row): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
        <td><?php echo htmlspecialchars($row['student_code']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td>
            <a class="btn-edit" href="edit_student.php?id=<?php echo $row['id']; ?>">
                Sửa
            </a>
        </td>
        <td>
            <a class="btn-delete"
               href="delete_student.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">
                Xóa
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
