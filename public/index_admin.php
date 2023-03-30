<?php
session_start();
include '../public/connect.php';
$title ='Sản phẩm';
include '../public/header_admin.php';
include '../public/check_admin.php';
?>

<?php


    $query = 'SELECT maXe, tenXe, hinhXe, giaXe, thongtinXe, tendongXe, dongxe.madongXe FROM xe , dongXe WHERE xe.madongXe = dongXe.madongXe' ;
    try{
        $sth = $pdo->prepare($query);
        $sth->execute();
       
    } catch(PDOException $e){
        $error_message = 'Không thể lấy dữ liệu';
        $reason = $e->getMessage();
        include '../public/show_error.php';
    }
        

?>
<div class="container">
        <table class="mt-5 table table-bordered">
            <thead>
                <tr>
                    <th scope="col-sm-1">STT</th>
                    <th scope="col-sm-1">Mã Dòng Xe</th>
                    <th scope="col-sm-1">Tên Dòng Xe</th>
                    <th scope="col-sm-1">Mã Xe</th>
                    <th scope="col-sm-1">Tên Xe</th>
                    <th scope="col-sm-1">Giá Xe</th>
                    <th scope="col-sm-1">Thông tin xe</th>
                    <th scope="col-sm-1"></th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $index = 1;
                    while ($row = $sth->fetch()) {
                        $htmlspecialchars = 'htmlspecialchars';
                        echo"<tr>
                                <th scope=\"row\">".($index++)."</th>
                                <td>{$htmlspecialchars($row['madongXe'])}</td>
                                <td>{$htmlspecialchars($row['tendongXe'])}</td>
                                <td>{$htmlspecialchars($row['maXe'])}</td>
                                <td>{$htmlspecialchars($row['tenXe'])}</td>
                                <td>{$htmlspecialchars($row['giaXe'])} VND</td> 
                                <td>{$htmlspecialchars($row['thongtinXe'])}</td>
                                <td><div class=\"d-flex justify-content-center\"><a class=\"btn btn-outline-primary me-2\" href=\"edit_sanpham.php?id=".($row['maXe'])."\">Sửa</a>
                                    <a class=\"btn btn-outline-danger\" onclick=\"return checkDelete()\" href=\"delete_sanpham.php?id=".($row['maXe'])."\">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                            
                            <script>
                                function checkDelete(){
                                    r = confirm('Bạn có chắc chắn muốn xóa sản phẩm?');
                                    if( r == false )
                                        return false;
                                    else return true;
                                }
                            </script>";
                    }
                ?>
            </tbody>
        </table>
        <a class="btn btn-outline-success mb-3" href="add_sanpham.php">Thêm</a>
                </div>
<?php
include '../public/footer.php';
?>
</body>
</html>