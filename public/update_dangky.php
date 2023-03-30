<?php
include '../public/connect.php';
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $query1 = "SELECT * FROM khachhang WHERE userName = ?";
        $sth1 = $pdo->prepare($query1);
        $sth1->execute([
            $_POST['username']
        ]);
        if($sth1->rowCount()==1){
            $kq = $sth1->fetch();
            echo "<script>
            alert('Tài khoản đã tồn tại');
            window.open('dangky.php','_self', 1);
            </script>
             ";
        }else{
            if(!empty($_POST['username']) && !empty($_POST['email'])){
    
                $query = 'INSERT INTO khachhang (userName,hoTen,gioiTinh,ngaySinh,email,diaChi, sdt, matKhau, phanquyen) values (?, ?, ?, ?, ?, ?, ?, ?, 1)';
        
                try{
                    $sth = $pdo->prepare($query);
                    $sth->execute([
                        $_POST['username'],
                        $_POST['hoten'],
                        $_POST['gioitinh'],
                        $_POST['ngaysinh'],
                        $_POST['email'],
                        $_POST['diachi'],
                        $_POST['sdt'],
                        $_POST['pass']
                    ]);
                }catch(PDOException $e){
                    $pdo_error = $e->getMessage();
                }
                if($sth && $sth->rowCount() == 1){
                    echo "<script>
                    alert('Đăng ký thành công');
                    window.open('index.php','_self', 1);
                    </script>
                     ";
                } else{
                    $error_message ='Không thể lưu Khách hàng';
                    $reason = $pdo_error ?? 'Không rõ nguyên nhân';
                    include '../public/show_error.php';
                }
            } else {
                $error_message = 'Hãy Nhập thông tin khách hàng!';
                include '../public/show_error.php';
                include '../public/dangky.php';
            }
        }
    }
?>