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
    
    // Câu lệnh UPDATE
    $sql = "UPDATE order_items SET quantity = :quantity, price = :price, orders_id = :orders_id, products_id = :products_id WHERE id = :id";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    
    // Gán giá trị cho các tham số
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':orders_id', $orders_id);
    $stmt->bindParam(':products_id', $products_id);
    $stmt->bindParam(':id', $id);
    
    // Gán giá trị cho các biến
    $quantity = '0';
    $price = '0';
    $orders_id = '0';
    $products_id = '0';
    $id = 1;
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    echo "Record updated successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>