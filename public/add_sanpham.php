<?php
session_start();
    include '../public/connect.php';
    $title ='Sản phẩm';
    include '../public/header_admin.php';
    include '../public/check_admin.php';
    ?>
    <div class="container">
            <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $query = 'INSERT INTO dongxe (madongXe, tendongXe) VALUES (?,?)';
                        try {
                            $sth = $pdo->prepare($query);
                            $sth->execute([
                                $_POST['madongXe'],
                                $_POST['tendongXe']
                                ]);
                        } catch (PDOException $e) {
                            $pdo_error = $e->getMessage();
                        }

                        $query1 = 'INSERT INTO xe (maXe, tenXe, giaXe,hinhXe, thongtinXe, madongXe) VALUES (?,?,?,?,?,?)';
                        try {
                                $sth = $pdo->prepare($query1);
                                $sth->execute([
                                    $_POST['maXe'],
                                    $_POST['tenXe'],
                                    $_POST['hinhXe'],
                                    $_POST['giaXe'],
                                    $_POST['thongtinXe'],
                                    $_POST['madongXe']
                                    ]);
                                echo"<script>
                                        alert('Thêm sản phẩm thành công');
                                        window.location.href=\"index_admin.php\";
                                    </script>";
                            } catch (PDOException $e) {
                                $pdo_error = $e->getMessage();
                            }
                    }
                ?>  
                <form class="m-auto" action="add_sanpham.php" name="add" method="post">
                    <h3 class="text-center pb-5\">Thêm sản phẩm</h3>
                    <div class="mt-3 mb-3">
                        <label for="madongXe">Mã dòng xe:</label>
                        <input class="form-control" id="madongXe" name="madongXe">
                    </div>
                    <div class="mt-3 mb-3">
                        <label>Tên dòng xe:</label>
                        <input class="form-control" id="tendongXe" type="text" name="tendongXe">
                    </div>
                    <div class="mt-3 mb-3">
                        <label>Mã xe:</label>
                        <input class="form-control" id="maXe" type="text" name="maXe">
                    </div>
                    <div class="mb-3 mt-3">
                        <label>Tên xe:</label>
                        <input class="form-control" id="tenXe" type="text" name="tenXe">
                    </div>
                    <div class="mb-3 mt-3">
                        <label>Hình xe:</label>
                        <input class="form-control" id="hinhXe" type="text" name="hinhXe">
                    </div>
                    <div class="mb-3">
                        <lable>Giá xe:</lable>
                        <input class="form-control" id="giaXe" type="text" name="giaXe">
                    </div> 
                    <div class="mb-3">
                        <lable>Thông tin xe:</lable>
                        <input class="form-control" id="thongtinXe" type="text" name="thongtinXe">
                    </div>
                    <div class="mb-3">
                        <button type="submit" onclick="return check(this)" class="btn btn-primary">Thêm</button>
                    </div>
                    
                </form>
            </div>
        </div>
    <script>
            function check(){
                var madongXe = document.getElementById('madongXe').value;
                var tendongXe = document.getElementById('tendongXe').value;
                var tenXe = document.getElementById('tenXe').value;
                var hinhXe = document.getElementById('hinhXe').value;
                var giaXe = document.getElementById('giaXe').value;
                var thongtinXe = document.getElementById('thongtinXe').value;
              
                if (madongXe == ""){
                    add.madongXe.focus();
                    alert('Vui lòng nhập mã dòng xe');
                    return false;
                }
                if (tendongXe == ""){
                    add.tendongXe.focus();
                    alert('Vui lòng nhập tên dòng xe');
                    return false;
                }
                if (tenXe == ""){
                    add.tenXe.focus();
                    alert('Vui lòng nhập tên xe');
                    return false;
                }
                if (tenXe == ""){
                    add.tenXe.focus();
                    alert('Vui lòng nhập tên xe');
                    return false;
                }

                if (hinhXe == ""){
                    add.hinhXe.focus();
                    alert('Vui lòng nhập hình xe');
                    return false;
                }

                if (giaXe == ""){
                    add.giaXe.focus();
                    alert('Vui lòng nhập giá xe');
                    return false;
                }
                if (thongtinXe == ""){
                    add.thongtinXe.focus();
                    alert('Vui lòng nhập thông tin xe');
                    return false;
                }
                    
            }
        </script>
        <?php
        include '../public/footer.php';
        ?>
</body>
</html>
 
 




