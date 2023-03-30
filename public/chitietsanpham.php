<?php
session_start();
include '../public/connect.php';
$title = "Sản phẩm";
include '../public/header.php';
    if(isset($_GET['id'])){
        $query = "SELECT * FROM xe WHERE maXe = ?";
        $sth = $pdo->prepare($query);
        $sth->execute([
            $_GET['id']
        ]);
        if($sth->rowCount()==1){
            $xe = $sth->fetch();
            ?>
            <div class = "row">
                    <div class="col-md-4 p-3">
                        <div class="hover">
                            <a href="<?php echo "chitietsanpham.php?id={$xe['maXe']}"?>"><img class="img-hover" src="<?php echo $xe['hinhXe'] ?>" alt="anhxe"></a>
                        </div>
                        <h5 class="text-center"><a class="a-customs" href=""><?php echo $xe['tenXe'] ?></a></h5>
                        <h6 class="text-center"><a class="a-customs" href=""><?php echo $xe['giaXe']?> VND</a></h6>
                    </div>
                    <div class="col-md-6 p-3">
                        <h3 class = "text-center">Thông tin sản phẩm</h3>
                        <p><?php echo $xe['thongtinXe']?></p>
                    </div>
                </div>
            <?php
            }
    }
    include '../public/footer.php';
?>
</body>
</html>
