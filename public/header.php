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
<nav class="navbar bg-dark navbar-expand-sm" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Mercedes-Benz</a>
        <div class="navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
              <a class="nav-link<?php if(!empty($title)){if($title == 'Trang chủ'){echo " active";}}?>" aria-current="page" href="index.php">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link<?php if(!empty($title)){if($title == 'Bảng giá xe'){echo " active";}}?>" href="banggiaxe.php">Bảng giá xe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link<?php if(!empty($title)){if($title == 'Đăng Ký Lái Thử'){echo " active";}}?>" href="dklaithu.php">Đăng ký lái thử</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="post" action="timkiem.php">
            <input class="form-control bg-dark border border-light text-light me-2" type="search" placeholder="Search" aria-label="Search" name="timkiem">
            <button class="btn btn-outline-light me-2" type="submit" name="search">Search</button>
          </form>
          
          <?php
          if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']) && $_SESSION['phanquyen']!=0){
            echo "<div class=\"dropdown\">
            <button class=\"btn btn-outline-light dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
              Đăng xuất
            </button>
            <ul class=\"dropdown-menu\">
              <li><a class=\"dropdown-item\" href=\"dangxuat.php\">Đăng xuất</a></li>
              <li><a class=\"dropdown-item\" onclick=\"return checkDelete()\" href=\"delete_taikhoan.php?id={$_SESSION['makh']}\">Xóa Tài Khoản</a></li>
            </ul>
          </div>
          <script>
                  function checkDelete(){
                  r = confirm('Bạn có chắc chắn muốn xóa tài khoản?');
                  if( r == false )
                       return false;
                  else return true;
                  }
          </script>";
          }else{
              echo '<a class="btn btn-outline-light" href="dangnhap.php">
                      Đăng nhập
                    </a>';
          }
            ?>
        </div>
      </div>
    </nav>