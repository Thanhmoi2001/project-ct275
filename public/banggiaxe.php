<?php
session_start();
include '../public/connect.php';
$title = 'Bảng giá xe';
include '../public/header.php';
?>
<div class="container">
    <table class="mt-3 mb-3 table table-bordered">
                <thead>
                    <tr>
                        <th class="col">Tên Xe</th>
                        <th class="col">Giá Xe</th>
                        <th class="col">Nhận báo giá lăn bánh & Khuyến mại</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM xe ';
                    $sth = $pdo->prepare($sql);
                    $sth->execute();
                    if($sth->rowCount()>0){
                        while($xe = $sth->fetch()){
                            ?>
                    <tr>
                            <th class="col fw-normal"><a class="a-customs" href="<?php echo "chitietsanpham.php?id={$xe['maXe']}"?>"><?php echo $xe['tenXe']?></a></th>
                            <th class="col fw-normal"><?php echo $xe['giaXe']?> VND</th>
                            <th class="col fw-normal">Báo giá lăn bánh</th>
                        </tr>
                    <?php }
                    }
                    ?>
                </tbody>
    </table>
</div>
<?php
include '../public/footer.php';
?>
</body>
</html>