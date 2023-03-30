<?php
session_start();
include '../public/connect.php';
if(isset($_POST['dangnhap'])== true){
    $sql = "SELECT * FROM khachhang WHERE userName = ? AND matKhau = ?";
    $sth = $pdo->prepare($sql);
    $sth->execute([
        $_POST['username'],
        $_POST['pass']
    ]);
    if($sth->rowCount() ==1){
        $user = $sth->fetch();
        $_SESSION['login_user']= $user['userName'];
        $_SESSION['makh']= $user['maKH'];
        $_SESSION['phanquyen']= $user['phanquyen'];
        if($_SESSION['phanquyen']==0){
            echo "<script>
            alert('Đăng nhập thành công vào admin');
            window.open('index_admin.php','_self', 1);
            </script>
             "; 
        }else{
            echo "<script>
            alert('Đăng nhập thành công');
            window.open('index.php','_self', 1);
            </script>
             "; 
        }
    }else{
        echo "<script>
        alert('Tài khoản hoặc mật khẩu chưa đúng.');
        window.open('dangnhap.php','_self', 1);
        </script>
         "; 
    }
}
?>