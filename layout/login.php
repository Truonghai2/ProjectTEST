<div class="login-layout d-flex flex-direction-column justify-content-center align-items-center" style="
    flex-direction: column;
    margin-top:150px;
">
    <div class="title">
        <h2>Login</h2>
    </div>
    <div class="form-login">
        <form action="/Controller/login.php" method="POST">
            <div class="username">
                <div class="input d-flex">
                    <div class="icon"><i class='bx bxs-user'></i></div>
                    <input type="text" name="username" placeholder="Usernane" required style="
    padding: 10px;
    border-radius: 20px;
    outline: none;
    border: 1px solid #d0d0d0;
    width: 280px;
">
                </div>
            </div>
            <div class="password">
                <div class="input d-flex">
                    <div class="icon"></div>
                    <input type="password" name="password" placeholder="Password" required style="
    padding: 10px;
    border-radius: 20px;
    outline: none;
    border: 1px solid #d0d0d0;
    width: 280px;
    margin-top:10px;
">
                </div>
            </div>
            <div class="error-login">
                <?php
                    if(isset($_SESSION['login_error'])){
                        echo '<p style="color:red;">' . $_SESSION['login_error'] . '</p>';
                        unset($_SESSION['login_error']); // Xóa thông báo lỗi để không hiển thị lần tiếp theo
                    } 
                ?> 
            </div>
            <div class="d-flex" style="flex-direction: column;">
                <button class="submit" name="submit" style="
    padding: 10px;
    width: 280px;
    border: 1px;
    border-radius: 20px;
    margin-top: 10px;
    background-color: rgb(0, 132, 255);
    color: #fff;
">Login</button>
<button style="
    padding: 10px;
    width: 280px;
    border: 1px;
    border-radius: 20px;
    margin-top: 10px;
    color: rgb(0, 132, 255);
"><a href="register">Register</a></button>
            </div>
        </form>
    </div>
</div>