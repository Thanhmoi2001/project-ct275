<?php
session_start();
include '../public/connect.php';
$title ='Sản phẩm';
include '../public/header_admin.php';
include '../public/check_admin.php';?>
<?php
            if (isset($_REQUEST['ok'])){
                if (isset($_POST['search'])){
                        $query = 'SELECT maXe, tenXe, giaXe, thongtinXe, madongXe FROM xe WHERE tenXe = ? OR maXe = ? OR madongXe = ?' ;
                        try{
                            $sth = $pdo->prepare($query);
                            $sth->execute([
                                $_POST['search'],
                                $_POST['search'],
                                $_POST['search']
                            ]);
                            if($sth->rowCount()>0){
                                echo'<div class="container">
                                <table class="mt-5 table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Mã Dòng Xe</th>
                                                <th scope="col">Mã Xe</th>
                                                <th scope="col">Tên Xe</th>
                                                <th scope="col">Giá Xe</th>
                                                <th scope="col">Thông tin xe</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </div>';
                                    

                                    $index = 1;
                                        while ($row = $sth->fetch()) {
                                            $htmlspecialchars = 'htmlspecialchars';
                                            echo"<tr>
                                                    <th scope=\"row\">".($index++)."</th>
                                                    <td>{$htmlspecialchars($row['madongXe'])}</td>
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
                                 
                                echo'   </tbody>
                                    </table>';
                        
                            } else {  
                                echo "<script>
                                    alert(\"Không tìm thấy sản phẩm\");
                                    window.location.href=\"index_admin.php\";
                                    </script>";
                                }
                         
                    
        
                            
                        } catch(PDOException $e){
                            $error_message = 'Không thể lấy dữ liệu';
                            $reason = $e->getMessage();
                            include '../public/show_error.php';
                        }
                    
                }
                
            }
        ?>
        </div>
          <?php 
    include '../public/footer.php';
    ?>
</body>
</html>