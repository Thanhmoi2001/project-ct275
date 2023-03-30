<?php
    session_start();
    include '../public/connect.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $query1 = 'UPDATE khachhang SET hoTen=? WHERE maKH=?';
    try{
        $sth1 = $pdo->prepare($query1);
        $sth1->execute([
            $_POST['hoten'],
            $_POST['makh']
            ]);
    } catch(PDOException $e){
        $error_message = 'Không thể lấy dữ liệu';
        $reason = $e->getMessage();
        include '../public/show_error.php';
    }

    $query = 'UPDATE dkchaythu SET hotendk=?, thoigiandk=?, maXe=?, sdt=? WHERE makh=?';
    try{
        $sth = $pdo->prepare($query);
        $sth->execute([
            $_POST['hoten'],
            $_POST['thoigian'],
            $_POST['tenxe'],
            $_POST['sdt'],
            $_POST['makh']
            ]);
                echo"<script>
                        alert('Cap nhat thong tin thanh cong');
                        window.location.href=\"dklaithu.php\";
                    </script>";
    } catch(PDOException $e){
        $error_message = 'Không thể lấy dữ liệu';
        $reason = $e->getMessage();
        include '../public/show_error.php';
    }
}

?>