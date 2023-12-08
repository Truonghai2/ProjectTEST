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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu
            $query = "SELECT password FROM user WHERE username='$username'";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];
                
                // Kiểm tra xem mật khẩu nhập vào từ người dùng có trùng khớp với mật khẩu đã mã hóa trong cơ sở dữ liệu không
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['username'] = $username;
                    header('Location: /');
                    exit();
                } else {
                    $_SESSION['login_error'] = "Invalid username or password.";
                    header('Location: /login');
                    exit();
                }
            } else {
                $_SESSION['login_error'] = "Invalid username or password.";
                header('Location: /login');
                exit();
            }
        }
    }

?>