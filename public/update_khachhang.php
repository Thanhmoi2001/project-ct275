<?php
    session_start();
    include '../public/connect.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $query1 = 'UPDATE dkchaythu SET hotendk=?, sdt=? WHERE makh=?';
                        try {
                            $sth1 = $pdo->prepare($query1);
                            $sth1->execute([
                                $_POST['hoten'],
                                $_POST['sdt'],
                                $_POST['makh']
                                ]);
                        } catch (PDOException $e) {
                            $pdo_error = $e->getMessage();
                        }
        $query = 'UPDATE khachhang SET userName=?, hoTen=?, gioiTinh=?, ngaySinh=?, email=?, diaChi=?, sdt=?, matKhau=?, phanquyen=? WHERE maKH=?';
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
                $_POST['pass'],
                $_POST['phanquyen'],
                $_POST['makh']
                ]);
                    echo"<script>
                            alert('Cap nhat thong tin thanh cong');
                            window.location.href=\"khachhang.php\";
                        </script>";
        } catch(PDOException $e){
            $error_message = 'Không thể lấy dữ liệu';
            $reason = $e->getMessage();
            include '../public/show_error.php';
        }
}

?>