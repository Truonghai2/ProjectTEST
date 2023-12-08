<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "projecttest";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function is_base64($s){
    // Kiểm tra xem có ký tự base64 hợp lệ không
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) return false;

    return true;
}

$id = $_POST['id'];
$img = $_POST['img'];
$name = $_POST['name'];
$content = $_POST['content'];
$price = $_POST['price'];

if (is_base64($img)) {
    $filename = mt_rand(10000000, 99999999) . '.jpg';
    $imageData = base64_decode($img);
    $imagePath = 'storage/product/' . $filename;

    // Lưu dữ liệu ảnh vào đường dẫn
    if (file_put_contents($imagePath, $imageData) !== false) {
        // Cập nhật đường dẫn ảnh và thông tin sản phẩm
        $sql = "UPDATE product SET img = ?, name = ?, content = ?, price = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $filename, $name, $content, $price, $id);

        if ($stmt->execute()) {
            echo "Cập nhật dữ liệu và lưu ảnh thành công";
        } else {
            echo "Lỗi khi cập nhật dữ liệu: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Lỗi khi lưu ảnh vào thư mục";
    }
} else {
    // Nếu không phải base64, chỉ cập nhật thông tin sản phẩm
    $sql = "UPDATE product SET name = ?, content = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $content, $price, $id);

    if ($stmt->execute()) {
        echo "Cập nhật dữ liệu thành công";
    } else {
        echo "Lỗi khi cập nhật dữ liệu: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
