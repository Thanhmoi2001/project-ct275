<?php
 session_start();
 include '../public/connect.php';
 $title ='Khách hàng';
 include '../public/header_admin.php';
 include '../public/check_admin.php';
 if($_SERVER['REQUEST_METHOD']== 'POST'){
    $query1 = "SELECT * FROM khachhang WHERE userName = ?";
    $sth1 = $pdo->prepare($query1);
    $sth1->execute([
        $_POST['username']
    ]);
    if($sth1->rowCount()==1){
        $kq = $sth1->fetch();
        echo "<script>
        alert('Khách hàng đã tồn tại');
        window.open('dangky.php','_self', 1);
        </script>
         ";
    }else{
        if(!empty($_POST['username']) && !empty($_POST['email'])){

            $query = 'INSERT INTO khachhang (userName,hoTen,gioiTinh,ngaySinh,email,diaChi, sdt, matKhau, phanquyen) values (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
            try{
                $sth = $pdo->prepare($query);
                $sth->execute([
                    $_POST['username'],
                    $_POST['hoten'],
                    $_POST['gioitinh'],
                    $_POST['ngaysinh'],
                    $_POST['email'],
                    $_POST['diachi'],
                    $_POST['sdt'],
                    $_POST['pass'],
                    $_POST['phanquyen']
                ]);
            }catch(PDOException $e){
                $pdo_error = $e->getMessage();
            }
            if($sth && $sth->rowCount() == 1){
                echo "<script>
                alert('Thêm khách hàng thành công');
                window.open('khachhang.php','_self', 1);
                </script>
                 ";
            } else{
                $error_message ='Không thể lưu Khách hàng';
                $reason = $pdo_error ?? 'Không rõ nguyên nhân';
                include '../public/show_error.php';
            }
        } else {
            $error_message = 'Hãy Nhập thông tin khách hàng!';
            include '../public/show_error.php';
            include '../public/dangky.php';
        }
    }
 }
?>
                    <div class="container mt-5">
                        <div class="d-flex justify-content-center">
                        <form class="mt-3 col-md-6" action="add_khachhang.php" method="post" name="frm" onsubmit="return capnhat()">
                                <h2 class="text-center">Thêm khách hàng</h2>
                                <div>
                                    <label class="form-label" for="username" >Tên đăng nhập</label>
                                    <div>
                                        <input class="form-control " type="text" name="username" placeholder="Tên đăng Nhập">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="hoten">Họ và Tên</label>
                                    <div>
                                        <input class="form-control " type="text" name="hoten" placeholder="Họ và Tên" >
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="gioitinh">Giới tính</label>
                                    <div>
                                        <select name="gioitinh" id="" class="custom-select custom-select-sm form-select" >
                                                <option>Nữ</option>
                                                <option>Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="ngaysinh">Ngày sinh</label>
                                    <div>
                                        <input class="form-control " type="date" name="ngaysinh" placeholder="DD/MM/YYYY">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="diachi">Địa chỉ</label>
                                    <div>
                                        <input class="form-control " type="text" name="diachi" placeholder="số A, đường B, phường C, quận D, Tp E">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="email">Email</label>
                                    <div>
                                        <input class="form-control " type="text" name="email" placeholder="Email" >
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="sdt">Số điện thoại</label>
                                    <div>
                                        <input class="form-control " type="text" name="sdt" placeholder="Nhập sdt">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="password">Mật khẩu</label>
                                    <div>
                                        <input class="form-control " type="text" name="pass" placeholder="Mật khẩu" >
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="phanquyen">Phân quyền</label>
                                    <div>
                                        <select name="phanquyen" id="" class="custom-select custom-select-sm form-select">
                                                <option>1</option>
                                                <option>0</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="text-center row mb-3">
                                    <button type="submit" class="btn btn-primary mt-3 ">Thêm khách hàng</button>
                                </div>
                            </form>
                    </div>
                    </div>
                    <script>
                        function  capnhat()
                    {
                    if(frm.username.value=="")
                    {
                        alert("Bạn chưa nhập tên đăng nhập . Vui lòng kiểm tra lại");
                        frm.username.focus();
                        return false;	
                    }
                    if(frm.username.value.length<6)
                    {
                        alert("Tên đăng nhập phải lớn hơn 6 ký tự");
                        frm.username.focus();
                        return false;	
                    }
                    if(frm.hoten.value=="")
                    {
                        alert("Bạn chưa nhập tên. Vui lòng kiểm tra lại");
                        frm.hoten.focus();
                        return false;	
                    }
                    if(frm.hoten.value.length<6)
                    {
                        alert("Tên quá ngắn. Vui lòng điền đầy đủ tên");
                        frm.hoten.focus();
                        return false;	
                    }
                    if(frm.email.value=="")
                    {
                        alert("Bạn chưa nhập email");	
                        frm.email.focus();
                        return false;
                    }
                    mail=frm.email.value;
                    m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
                    m1=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
                    if(!m.test(mail) && !m1.test(mail))
                    {
                        alert("Bạn nhập sai email");	
                        frm.email.focus();
                        return false;
                    }
                    dt=/^[0-9]+$/;
                    sdt=frm.sdt.value;
                    if(!dt.test(sdt))
                    {
                        alert("Bạn chưa nhập điện thoại. Vui lòng kiểm tra lại.");
                        frm.sdt.focus();
                        return false;
                    }
                    dd=frm.sdt.value;
                    if(10>dd.length || dd.length>11)
                    {
                        alert("Số điện thoại không đủ độ dài. Vui lòng nhập lại");
                        frm.sdt.focus();
                        return false;	
                    }
                    if(frm.pass.value=="")
                    {
                        alert("Bạn chưa nhập password");	
                        frm.pass.focus();
                        return false;
                    }
                    if(frm.pass.value.length<6)
                    {
                        alert("Mật khẩu phải lớn hơn 6 ký tự");	
                        frm.pass.focus();
                        return false;
                    }
                        }
                    </script>
<?php
include '../public/footer.php';
?>
</body>
</html>