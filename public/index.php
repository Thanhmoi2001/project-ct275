<?php 
session_start();
include '../public/connect.php';
$title = 'Trang chủ';
include '../public/header.php';
?>
        <div id="carouselExample" class="carousel slide carousel-custom">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://wallpaperaccess.com/full/825374.jpg" class="d-block w-100" alt="anh1" height="700px">
                </div>
                <div class="carousel-item">
                <img src="https://wallpaperaccess.com/full/800031.jpg" class="d-block w-100" alt="anh2" height="700px">
                </div>
                <div class="carousel-item">
                <img src="https://www.hdwallpapers.in/download/mercedes_amg_gt_black_series_2020_4k_8k_hd-5120x2880.jpg" class="d-block w-100" alt="anp" height="700px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="row">
                <h2 class="text-center mt-3">Sản Phẩm</h2>
                <?php
                    $query = "SELECT * FROM xe";
                    $sth = $pdo->prepare($query);
                    $sth->execute();
                    if($sth->rowCount()>0){
                        while($xe = $sth->fetch()){
                ?>
                        <div class="col-md-4 p-3">
                            <div class="hover">
                                <a href="<?php echo "chitietsanpham.php?id={$xe['maXe']}"?>"><img class="img-hover" src="<?php echo $xe['hinhXe']?>" alt="anhxe"></a>
                            </div>
                            <h5 class="text-center"><a class="a-customs" href=""><?php echo $xe['tenXe'] ?></a></h5>
                            <h6 class="text-center"><a class="a-customs" href=""><?php echo $xe['giaXe'] ?> VND</a></h6>
                        </div>
                <?php } 
                }?> 
                </div>
            </div>
        </div>
<?php
include '../public/footer.php';
?>

