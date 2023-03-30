<?php
    session_start();
    include '../public/connect.php';
    $title ='Khách hàng';
    include '../public/header_admin.php';
    include '../public/check_admin.php';

    $query = "SELECT* FROM khachhang WHERE maKH =?";
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
            $row = $sth->fetch();?>
            <div class="d-flex justify-content-center">
                <form class="mt-3 col-md-6" action="update_khachhang.php" method="post" name="frm" onsubmit="return capnhat()">
                        <h2 class="text-center">Cập nhật khách hàng</h2>
                        <div>
                            <label class="form-label" for="username" >Tên đăng nhập</label>
                            <div>
                                <input class="form-control " type="text" name="username" placeholder="Tên đăng Nhập" value="<?php echo $row['userName'] ?>">
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="hoten">Họ và Tên</label>
                            <div>
                                <input class="form-control " type="text" name="hoten" placeholder="Họ và Tên" value="<?php echo $row['hoTen'] ?>" >
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="gioitinh">Giới tính</label>
                            <div>
                                <select name="gioitinh" id="" class="custom-select custom-select-sm form-select" >
                                    <option><?php echo $row['gioiTinh']?></option>
                                    <?php
                                    if($row['gioiTinh']=='Nam'){
                                        echo '<option>Nữ</option>';
                                    }else{
                                        echo '<option>Nam</option>';}?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="ngaysinh">Ngày sinh</label>
                            <div>
                                <input class="form-control " type="date" name="ngaysinh" placeholder="DD/MM/YYYY" value="<?php echo $row['ngaySinh'] ?>">
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="diachi">Địa chỉ</label>
                            <div>
                                <input class="form-control " type="text" name="diachi" placeholder="số A, đường B, phường C, quận D, Tp E" value="<?php echo $row['diaChi'] ?>">
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="email">Email</label>
                            <div>
                                <input class="form-control " type="text" name="email" placeholder="Email" value="<?php echo $row['email'] ?>" >
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="sdt">Số điện thoại</label>
                            <div>
                                <input class="form-control " type="text" name="sdt" placeholder="Nhập sdt" value="0<?php echo $row['sdt'] ?>" >
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="password">Mật khẩu</label>
                            <div>
                                <input class="form-control " type="text" name="pass" placeholder="Mật khẩu" value="<?php echo $row['matKhau'] ?>" >
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="phanquyen">Phân quyền</label>
                            <div>
                                <select name="phanquyen" id="" class="custom-select custom-select-sm form-select">
                                    <option><?php echo $row['phanquyen'] ?></option>
                                    <?php
                                    if($row['phanquyen']=='0'){
                                        echo '<option>1</option>';
                                    }else{
                                        echo '<option>0</option>';}?>
                                </select>
                            </div>
                        </div>
                        <div class="text-center row mb-3">
                            <input type="hidden" name="makh" value="<?php echo $_GET['id'] ?>">
                            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
                        </div>
                    </form>
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
                r = confirm('Bạn có chắc chắn muốn cập nhật thông tin khách hàng?');
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