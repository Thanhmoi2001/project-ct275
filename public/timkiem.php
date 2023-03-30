<?php
    session_start();
    include '../public/connect.php';
    $title = 'Tìm kiếm';
    include '../public/header.php';
    ?>
<div class ="row">
    <?php
    if(isset($_POST['search'])== true){
        $sql = "SELECT * FROM xe WHERE maXe = ? or madongXe = ? or tenXe =?  ORDER BY giaXe DESC";
        $sth = $pdo->prepare($sql);
        $sth->execute([
            $_POST['timkiem'],
            $_POST['timkiem'],
            $_POST['timkiem']
        ]);
        if($sth->rowCount() > 0){
            while($xe = $sth->fetch()){
        ?>
         <div class="col-md-4 p-3">
                <div class="hover">
                    <a href="<?php echo "chitietsanpham.php?id={$xe['maXe']}"?>"><img class="img-hover w-100 h-100" src="<?php echo $xe['hinhXe']?>" alt="anhxe"></a>
                </div>
                <h5 class="text-center"><a class="a-customs" href=""><?php echo $xe['tenXe'] ?></a></h5>
                <h6 class="text-center"><a class="a-customs" href=""><?php echo $xe['giaXe'] ?> VND</a></h6>
            </div>
    <?php     
            }
        }
    }?>
    </div>
<?php
include '../public/footer.php';
?>