<?php
    session_start();
    include '../public/connect.php';
    $title = 'Đăng nhập';
    include '../public/header.php';
    ?>
    <div class="d-flex justify-content-center"> 
        <form class="col-md-4 mt-5 pt-5" action="update_dangnhap.php" method="post">
            <h2 class="text-center">Đăng Nhập</h2>
            <div>
                <label class="form-label mt-3" for="username">Tên đăng nhập</label>
                <div>
                    <input class="form-control" name="username" type="text" placeholder="Tên đăng nhập">
                </div>
            </div>
            <div>
                <label class="form-label" class="" for="password">Mật khẩu</label>
                <div>
                    <input class="form-control" type="password" name="pass" placeholder="Mật khẩu">
                </div>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="remember">
                <label class="form-check-label" for="check">Ghi nhớ</label>
            </div>
            <div class="mt-3 row">
                <button class="btn btn-primary" type="submit" name="dangnhap">Đăng nhập</button>
                <p class="text-center">Bạn chưa có tài khoản hãy <a class="a-custom" href="dangky.php">Đăng Ký?</a></p>
            </div>
        </form>
    </div>
    <?php
    include '../public/footer.php';
    ?>
</body>
</html>
