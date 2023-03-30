<?php
    session_start();
    include '../public/connect.php';
    include '../public/check_admin.php';

    $query = 'UPDATE xe SET tenXe=?, hinhXe=?, giaXe=?, thongtinXe=? WHERE maXe=?';
    try{
        $sth = $pdo->prepare($query);
        $sth->execute([
            $_POST['tenXe'],
            $_POST['hinhXe'],
            $_POST['giaXe'],
            $_POST['thongtinXe'],
            $_POST['maXe']
            ]);
                echo"<script>
                        alert('Cap nhat thong tin thanh cong');
                        window.location.href=\"index_admin.php\";
                    </script>";
    } catch(PDOException $e){
        $error_message = 'Không thể lấy dữ liệu';
        $reason = $e->getMessage();
        include '../public/show_error.php';
    }
        

?>

