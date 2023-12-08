<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "projecttest";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


if(isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Query để lấy thông tin sản phẩm từ cơ sở dữ liệu dựa trên ID
    $sql = "SELECT * FROM product WHERE id = $productId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Chuyển đổi dữ liệu thành JSON và trả về cho phía client
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        echo "Product not found"; // Nếu không tìm thấy sản phẩm
    }
} else {
    echo "Invalid request"; // Nếu không có ID được cung cấp trong yêu cầu GET
}
$conn->close();
?>
