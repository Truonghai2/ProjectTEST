

<?php session_start()



?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Product</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>

    body{
        top: 0;
        left: 0;
    }
    #wapper{
        width: 100%;
        height: 100vh;
    }
</style>
<body id="app">
    <div id="wapper">
     <div class="modal" id="modal-edit-product" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content position-relative bg-white" >
                      <div class="modal-header " style="">
                        <h5 class="modal-title">Chỉnh sửa thông tin sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="api/v1/product/update" method="POST">
                        <div class="modal-body" style="max-height:577px; overflow:auto;">
                            <div class="img">
                                <img id="img-product" width="100%" src="./storage/product/${data.img}" alt="">
                            </div>
                            <div class="btn-push-img">
                                <input type="file" name="img-product" id="img-product" onchange="previewImage(event)">
                            </div>
                            <div class="price">
                                <div class="title">Giá:</div>
                                <input type="text" name="price" class="w-100" id="" style="padding: 10px; outline: none; border-radius: 10px; border: 1px solid #d0d0d0;">
                            </div>
                            <div class="name-product" style="margin-top: 10px;">
                                <div class="title">Name:</div>
                                <textarea class="w-100" style="padding: 10px; outline: none; border-radius: 10px; border: 1px solid #d0d0d0;" name="title" id="data-title"></textarea>
                            </div>
                            <div class="content" style="margin-top: 10px;">
                                <div class="title">
                                    Thông tin:
                                </div>
                                <textarea class="w-100" style="padding: 10px; outline: none; border-radius: 10px; border: 1px solid #d0d0d0;" name="content" id="data-content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" data-product-id ="" onclick="clickE()">Lưu</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
        <div class="header container w-100">
            <div class="status-login container w-100 d-flex justify-content-space-between "style="
    justify-content: space-between;
">
                <div class="btn btn-home">
                    <a href="/">Home</a>
                </div>
                <div class="double-btn d-flex justify-content-end">
                    <?php 


                        if(isset($_SESSION['username'])){
                            echo '<div class ="btn btn-information">'.$_SESSION['username'].'</div>';
                            echo '<div class="btn btn-logout"><a href="logout">Logout</a></div>';
                        }
                        else{
                            echo '<div class="btn btn-login"><a href="login">Login</a></div>
                            <div class="btn btn-register">Register</div>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>

       
        <div class="content-page container ">
        <?php
            // Lấy URL
            $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
            
            // Xử lý route dựa trên URL
            switch ($url) {
                case '/':
                    include 'layout/home.php'; // Hiển thị trang chủ
                    break;
                case '/about':
                    include 'layout/about.php'; // Hiển thị trang giới thiệu
                    break;
                case '/products':
                    include 'layout/products.php'; // Hiển thị trang sản phẩm
                    break;
                case '/login':
                    include 'layout/login.php';
                    break;
                case '/logout':
                    include 'Controller/logout.php';
                    break;
                case '/register':
                    include 'layout/register.php';
                    break;
                
                case '/api/v1/product/list':
                    include 'Controller/product/product.php';
                    break;
                case '/api/v1/product/erase':
                    include 'Controller/product/eraseProduct.php';
                    break;
                case '/api/v1/product/update':
                    include 'Controller/product/updateProduct.php';
                    break;
                default: 
                    break; 
            }
        ?>
        </div>

        
    </div>
</body>
</html>