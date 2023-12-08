<?php

// Thông tin kết nối database
$servername = "127.0.0.1"; // Thay thế bằng tên máy chủ MySQL của bạn
$username = "root"; // Thay thế bằng tên người dùng MySQL của bạn
$password = ""; // Thay thế bằng mật khẩu của bạn
$dbname = "projecttest"; // Thay thế bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$q = "SELECT * FROM product";
$res = $conn->query($q);
if ($res->num_rows > 0) {
    echo '<div id="productList">
    <div  class="list-product">
        <div class="title">
            <h2>
                Danh sách sản phẩm
            </h2>
        </div>
        <div class="product">
            <div class="card">
            </div>
        </div>
                <section style="background-color: #eee; margin-top:10px; border-radius:10px;">
                    <div class="container py-5">
                        <div class="row justify-content-center mb-3">';
                        while ($row = $res->fetch_assoc()) {
                            echo '<div class="col-md-12 col-xl-10">
                                <div class="card shadow-0 border rounded-3" style="border-radius:10px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                    <img src="/storage/product/' . $row['img'] . '" class="w-100" />
                                                    <a href="#!">
                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <h5>' . $row['name'] . '</h5>
                                                <p class="text-truncate mb-4 mb-md-0">' . $row['content'] . '</p>
                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <h4 class="mb-1 me-1">$' ;
                                                    if(isset($_SESSION['username'])){
                                                        echo number_format($row['price'], 2, '.', ',');
                                                    } else{
                                                        echo 'Liên hệ';
                                                    }
                                                    echo '</h4>
                                                </div>
                                                <div class="d-flex flex-column mt-4">
                                                    <button class="btn btn-outline-primary btn-edit btn-sm mt-2" onclick="edit('.$row['id'].')" type="button">
                                                        Sửa
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-erase btn-sm mt-2" onclick="erase('.$row['id'].')" style="background-color: red; border:none; color:#fff;" type="button">
                                                        Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                        
                        echo '</div></div></section></div>';
                    }                        

$conn->close();
?>
