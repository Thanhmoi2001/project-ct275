<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/> -->
</head>
<body>
  <header>
      <nav class="navbar bg-dark navbar-expand-sm" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Mercedes-Benz</a>
              <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                  <li class="nav-item">
                    <a class="nav-link<?php if(!empty($title)){if($title == 'Sản phẩm'){echo " active";}}?>" aria-current="page" href="index_admin.php">Sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link<?php if(!empty($title)){if($title == 'Khách hàng'){echo " active";}}?>" href="khachhang.php">Khách hàng</a>
                  </li>
                </ul>
              <form class="d-flex" action="<?php if($title == 'Sản phẩm'){echo 'search_sanpham.php';}else{echo 'search_khachhang.php';}?>" name="timkiem" method="post" onsubmit="return kthople()">
                        <input class="form-control bg-dark border border-light text-light me-2" id="search" type="search" placeholder="Nhập vào mã xe..." name="search">
                        <button class="btn btn-outline-light me-2" type="submit" name="ok" >Search</button>
              </form>
                <?php
                if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']) && $_SESSION['phanquyen']!=1){
                  echo '<a class="btn btn-outline-light" href="dangxuat.php">
                            <span class="material-symbols-outlined">
                            Logout
                            </span>
                        </a>';
                }else{
                    echo '<a class="btn btn-outline-light" href="dangnhap.php">
                            <span class="material-symbols-outlined">
                            Login
                            </span>
                          </a>';
                }
                  ?>
              </div>
            </div>
          </nav>
    <script>
            function kthople(){
                if (timkiem.search.value == "") {
                    alert("Vui lòng nhập từ khóa");
                    timkiem.search.focus();
                    return false;

                }
            }
    </script>
    </header>