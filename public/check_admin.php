<?php
include '../public/function.php';
if (!is_administrator($_SESSION['login_user'])) {
	echo "<script>
            alert('Bạn không có quyền truy cập trang này.');
            window.open('dangnhap.php','_self', 1);
            </script>
            ";
	exit();
}
?>