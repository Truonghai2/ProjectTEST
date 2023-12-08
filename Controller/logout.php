<?php
    session_start();

    // Xóa toàn bộ session data
    $_SESSION = array();

    // Hủy tất cả các session
    session_destroy();

    // Chuyển hướng người dùng về trang đăng nhập hoặc trang chính
    header('Location: /login'); // Thay đổi đường dẫn nếu cần
    exit();
?>