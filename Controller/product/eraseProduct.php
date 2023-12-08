<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "projecttest";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Using prepared statement to delete a product safely
    $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indicates the parameter is an integer
    if ($stmt->execute()) {
        echo json_encode(["message" => "Product deleted successfully"]);
    } else {
        echo json_encode(["error" => "Failed to delete product"]);
    }
    $stmt->close();
}

$conn->close();
?>
