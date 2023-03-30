<?php
session_start();
include '../public/connect.php';


 $query1 = "DELETE FROM khachhang WHERE maKH=? LIMIT 1";

 try {
     $sth = $pdo->prepare($query1);
     $sth->execute([
        $_GET['id']
     ]);
 } catch (PDOException $e) {
     $pdo_error = $e->getMessage();
     }

$query = "DELETE FROM dkchaythu WHERE makh=? LIMIT 1";

try {
    $sth = $pdo->prepare($query);
    $sth->execute([
        $_GET['id']
    ]);
        echo'<script>
                alert(\'Xóa thành công\');
                window.location.href="khachhang.php";
            </script>';
} catch (PDOException $e) {
    $pdo_error = $e->getMessage();
    }
    ?>