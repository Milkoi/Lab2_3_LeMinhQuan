<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['add_to_cart'])) {
    $id_san_pham = $_POST['product_id'];
    $_SESSION['cart'][] = $id_san_pham;
}

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Refresh:0");
}

$products = [
    101 => "iPhone 15 Pro Max",
    102 => "Samsung Galaxy S24",
    103 => "MacBook Air M2",
    104 => "Sony PlayStation 5"
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng </title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; display: flex; gap: 50px; }
        .product-list, .cart-info { border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 45%; }
        h2 { color: #333; }
        .item { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
        button { background: #007bff; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 4px; }
        button:hover { background: #0056b3; }
        .btn-clear { background: #dc3545; margin-top: 20px; }
    </style>
</head>
<body>

    <div class="product-list">
        <h2>🛍️ Danh sách sản phẩm</h2>
        
        <?php foreach ($products as $id => $name): ?>
            <div class="item">
                <span>[ID: <?= $id ?>] <b><?= $name ?></b></span>
                
                <form method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?= $id ?>">
                    <button type="submit" name="add_to_cart">Thêm +</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="cart-info">
        <h2>🛒 Giỏ hàng của bạn</h2>
        
        <?php 
        if (empty($_SESSION['cart'])) {
            echo "<p>Giỏ hàng đang trống</p>";
        } else {
            echo "<p>Danh sách các ID sản phẩm đã chọn:</p>";
            echo "<ul>";
            
            foreach ($_SESSION['cart'] as $index => $saved_id) {
                $name = isset($products[$saved_id]) ? $products[$saved_id] : "Không xác định";
                echo "<li>Sản phẩm ID: <b>$saved_id</b> ($name)</li>";
            }
            
            echo "</ul>";
            
            echo "<hr>Tổng số lượng: <b>" . count($_SESSION['cart']) . "</b> sản phẩm";
        }
        ?>

        <form method="post">
            <button type="submit" name="clear_cart" class="btn-clear">Xóa sạch giỏ hàng</button>
        </form>
    </div>

</body>
</html>