<?php
session_start();
if (isset($_SESSION['login_user'])) {
    unset($_SESSION['phanquyen']);
    unset($_SESSION['login_user']);
    unset($_SESSION['makh']);
}
echo "<script>
            alert('Đăng xuất thành công.');
            window.open('index.php','_self', 1);
            </script>
             "; 

?>