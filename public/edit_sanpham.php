<?php
    session_start();
    include '../public/connect.php';
    $title ='Sản phẩm';
    include '../public/header_admin.php';
    include '../public/check_admin.php';

    $query = "SELECT maXe, tenXe, hinhXe, giaXe, thongtinXe FROM xe WHERE maXe =?";
    try{
        $sth = $pdo->prepare($query);
        $sth->execute([
            $_GET['id']
        ]);
       
    } catch(PDOException $e){
        $error_message = 'Không thể lấy dữ liệu';
        $reason = $e->getMessage();
        include '../public/show_error.php';
    }
        

?>

        <?php
            $row = $sth->fetch();
            echo'<form action="update_sanpham.php" name="update" method="post">
                    <div class="container-sm col-5">
                        <h3 class="text-center mt-3 mb-3">Cập nhật thông tin sản phẩm</h3>
                        <div class="mb-3 mt-3">
                            <label>Tên xe:</label>
                            <input class="form-control" id="tenXe" type="text" name="tenXe" value="'. $row['tenXe'] .'">
                        </div>
                        <div class="mb-3 mt-3">
                            <label>Hình xe:</label>
                            <input class="form-control" id="hinhXe" type="text" name="hinhXe" value="'. $row['hinhXe'] .'">
                        </div>
                        <div class="mb-3">
                            <lable>Giá xe:</lable>
                            <input class="form-control" id="giaXe" type="text" name="giaXe" value="'.$row['giaXe'].'">
                        </div> 
                        <div class="mb-3">
                            <lable>Thông tin xe:</lable>
                            <textarea class="form-control" rows="15" id="thongtinXe" type="text" name="thongtinXe">'.$row['thongtinXe'].'</textarea>
                        </div> 
                        <div class="row">
                        <input type="hidden" name="maXe" value="' . $_GET['id'] . '">
                        <button type="submit" onclick="return check(this)" class="btn btn-primary mb-3">Cập nhật</button>
                        </div>
                    </div>
                </form>';
                  
        ?>
    </div>
        <script>
            function check(){
                var tenXe = document.getElementById('tenXe').value;
                var hinhXe = document.getElementById('hinhXe').value;
                var giaXe = document.getElementById('giaXe').value;
                var thongtinXe = document.getElementById('thongtinXe').value;
              
                if (tenXe == ""){
                    update.tenXe.focus();
                    alert('Vui lòng nhập tên xe');
                    return false;
                }

                if (hinhXe == ""){
                    update.hinhXe.focus();
                    alert('Vui lòng nhập hình xe');
                    return false;
                }

                if (giaXe == ""){
                    update.giaXe.focus();
                    alert('Vui lòng nhập giá xe');
                    return false;
                }
                if (thongtinXe == ""){
                    update.thongtinXe.focus();
                    alert('Vui lòng nhập thông tin xe');
                    return false;
                }
                r = confirm('Bạn có chắc chắn muốn cập nhật sản phẩm?');
                    if( r == false )
                        return false;
                    else return true;
            }
        </script>
<?php
include '../public/footer.php';
?>
</body>
</html>