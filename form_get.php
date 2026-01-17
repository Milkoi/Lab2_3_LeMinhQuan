<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form GET</title>
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

        input {
            width: 50%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 15px;
            background-color: #e9f5ff;
            padding: 10px;
            border-radius: 6px;
            color: #004085;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tìm kiếm (GET)</h2>

    <form method="get">
        <input type="text" name="keyword" placeholder="Nhập từ khóa cần tìm">
        <button type="submit">Tìm kiếm</button>
    </form>

    <?php
    if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
        $keyword = htmlspecialchars($_GET['keyword']);
        echo "<div class='result'>Bạn đang tìm kiếm: <b>$keyword</b></div>";
    }
    ?>
</div>

</body>
</html>
