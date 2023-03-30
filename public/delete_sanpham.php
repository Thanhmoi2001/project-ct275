<?php
session_start();
include '../public/connect.php';


 $query1 = "DELETE FROM dkchaythu WHERE maXe=?";

 try {
     $sth = $pdo->prepare($query1);
     $sth->execute([
        $_GET['id']
     ]);
 } catch (PDOException $e) {
     $pdo_error = $e->getMessage();
     }

$query = "DELETE FROM xe WHERE maXe=? LIMIT 1";

try {
    $sth = $pdo->prepare($query);
    $sth->execute([
        $_GET['id']
    ]);
    echo'<script>
            alert(\'Xóa thành công\');
            window.location.href="index_admin.php";
        </script>';
} catch (PDOException $e) {
    $pdo_error = $e->getMessage();
    }
    ?>