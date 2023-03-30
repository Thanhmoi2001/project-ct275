<?php
session_start();
include '../public/connect.php';
$title ='Khách hàng';
include '../public/header_admin.php';
include '../public/check_admin.php';?>
<?php
            if (isset($_REQUEST['ok'])){
                if (isset($_POST['search'])){
                        $query = 'SELECT * FROM khachhang WHERE maKH = ? OR userName = ? OR hoTen = ?' ;
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
                                                <th scope="col">Mã Khách hàng</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Họ và Tên</th>
                                                <th scope="col">Giới tính</th>
                                                <th scope="col">Ngày sinh</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mật khẩu</th>
                                                <th scope="col">Phân quyền</th>
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
                                                <td>{$htmlspecialchars($row['maKH'])}</td>
                                                <td>{$htmlspecialchars($row['userName'])}</td>
                                                <td>{$htmlspecialchars($row['hoTen'])}</td>
                                                <td>{$htmlspecialchars($row['gioiTinh'])}</td>
                                                <td>{$htmlspecialchars($row['ngaySinh'])}</td>
                                                <td>{$htmlspecialchars($row['diaChi'])} VND</td> 
                                                <td>{$htmlspecialchars($row['sdt'])}</td>
                                                <td>{$htmlspecialchars($row['email'])}</td>
                                                <td>{$htmlspecialchars($row['matKhau'])}</td>
                                                <td>{$htmlspecialchars($row['phanquyen'])}</td>
                                                <td><div class=\"d-flex justify-content-center\"><a class=\"btn btn-outline-primary me-2\" href=\"edit_khachhang.php?id=".($row['maKH'])."\">Sửa</a>
                                                    <a class=\"btn btn-outline-danger\" onclick=\"return checkDelete()\" href=\"delete_khachhang.php?id=".($row['maKH'])."\">Xóa</a>
                                                    </div>
                                                </td>
                                        </tr>
                                        
                                        <script>
                                            function checkDelete(){
                                                r = confirm('Bạn có chắc chắn muốn xóa thông tin khách hàng?');
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
                                    alert(\"Không tìm thấy khách hàng\");
                                    window.location.href=\"khachhang.php\";
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