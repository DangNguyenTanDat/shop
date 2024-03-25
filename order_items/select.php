<?php
// Thông tin kết nối MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Tạo kết nối
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Câu lệnh SELECT
    $sql = "SELECT * FROM order_items";
    
    // Thực thi câu lệnh SQL và lấy tất cả các bản ghi
    $result = $conn->query($sql)->fetchAll();
    
    if (count($result) > 0) {
        // Hiển thị dữ liệu của bảng
        foreach($result as $row) {
            echo "id: " . $row["id"]. " - Quantity: " . $row["quantity"]. " - Price: " . $row["price"]. " - Orders_id: " . $row["orders_id"]." - Products_id: " . $row["products_id"]. "<br>";
        }
    } else {
        echo "0 results";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>