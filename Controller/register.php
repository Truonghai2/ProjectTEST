<?php
    session_start();

    // Thông tin kết nối database
$servername = "127.0.0.1"; // Thay thế bằng tên máy chủ MySQL của bạn
$username = "root"; // Thay thế bằng tên người dùng MySQL của bạn
$password = ""; // Thay thế bằng mật khẩu của bạn
$dbname = "projecttest"; // Thay thế bằng tên cơ sở dữ liệu của bạn



    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die('connection failed');


    }


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (strlen($password) < 8) {
                
                // Hiển thị thông báo lỗi về độ dài mật khẩu không đủ
                $_SESSION['error'] = "Password must be at least 8 characters long.";
                header('Location: /register'); // Chuyển hướng người dùng về trang đăng nhập
                exit();
            }
            // Kiểm tra xem tên người dùng đã tồn tại hay chưa
            $check_query = "SELECT * FROM user WHERE username='$username'";
            $check_result = $conn->query($check_query);

            if ($check_result->num_rows > 0) {
                // Tên người dùng đã tồn tại
                $_SESSION['error'] = "Username already exists.";
                header('Location: /register'); // Chuyển hướng người dùng về trang đăng ký
                exit();
            } 
            else{

            

                // Kiểm tra và thêm dữ liệu vào cơ sở dữ liệu
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
                // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
                
                $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";

                if ($conn->query($sql) === TRUE) {
                    // Dữ liệu được thêm thành công
                    header('Location: /login');
                } else {
                    // Nếu có lỗi khi thêm dữ liệu
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
        }
    }

    $conn->close(); // Đóng kết nối sau khi hoàn thành thao tác với cơ sở dữ liệu
?>