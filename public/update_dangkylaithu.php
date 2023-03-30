<?php
session_start();
include '../public/connect.php';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if(isset($_POST['dklaithu'])== true){
        $sql = "SELECT * FROM xe WHERE maXe = ? or madongXe = ? or tenXe =?";
        $sth = $pdo->prepare($sql);
        $sth->execute([
            $_POST['tenxe'],
            $_POST['tenxe'],
            $_POST['tenxe']
        ]);
        if($sth->rowCount() == 0){
            echo "<script>
                alert('Tên xe bạn nhập không tồn tại');
                window.open('dklaithu.php','_self', 1);
                </script>
             "; 
        }else{
            $sql2 = "SELECT * FROM khachhang WHERE hoTen=?";
            $sth3 = $pdo->prepare($sql2);
            $sth3->execute([
                $_POST['hoten']
            ]);
            if($sth3->rowCount()==0){
                echo "<script>
                alert('Hãy đăng ký thông tin người dùng trước khi đăng ký lái thử.');
                window.open('dangky.php','_self', 1);
                </script>
             "; 
            }else{
                $khachhang = $sth3->fetch();
                $_SESSION['makh'] = $khachhang['maKH'];
                if(!empty($_POST['hoten']) && !empty($_POST['sdt']) && !empty($_POST['tenxe']) ){
                    $query = 'INSERT INTO dkchaythu (hotendk,thoigiandk,maXe,makh,sdt) values (?, ?, ?, ?, ?)';
                    try{
                        $sth1 = $pdo->prepare($query);
                        $sth1->execute([
                            $_POST['hoten'],
                            $_POST['thoigianlaithu'],
                            $_POST['tenxe'],
                            $_SESSION['makh'],
                            $_POST['sdt']
                        ]);
                    }catch(PDOException $e){
                        $pdo_error = $e->getMessage();
                    }
                    if($sth1 && $sth1->rowCount() == 1){
                        echo "<script>
                        alert('Đăng ký lái thử thành công, hãy chờ cuộc gọi từ cửa hàng.');
                        window.open('dklaithu.php','_self', 1);
                        </script>
                        ";
                    } else{
                        $error_message ='Không thể lưu thông tin đăng ký';
                        $reason = $pdo_error ?? 'Không rõ nguyên nhân';
                        include '../public/show_error.php';
                    }
        }else {
            $error_message = 'Hãy Nhập thông tin đăng ký!';
            include '../public/show_error.php';
            include '../public/dangky.php';
            }
        }
    }
}
}
?>