<?php
    session_start();
    include '../public/connect.php';
    $title = 'Đăng ký';
    include '../public/header.php';
    ?>
    <div class="d-flex justify-content-center">
        <form class="mt-3 col-md-6" action="update_dangky.php" method="post" name="frm" onsubmit="return dangky()">
                <h2 class="text-center">Đăng Ký</h2>
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
                            <option>Nam</option>
                            <option>Nữ</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="form-label" for="ngaysinh">Ngày sinh</label>
                    <div>
                        <input class="form-control " type="date" name="ngaysinh" placeholder="MM/DD/YYYY">
                    </div>
                </div>
                <div>
                    <label class="form-label" for="diachi">Địa chỉ</label>
                    <div>
                        <input class="form-control " type="text" name="diachi" placeholder="số A, đường B, phường C, quận D, Tp E" >
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
                        <input class="form-control " type="text" name="sdt" placeholder="Nhập sdt" >
                    </div>
                </div>
                <div>
                    <label class="form-label" for="password">Mật khẩu</label>
                    <div>
                        <input class="form-control " type="password" name="pass" placeholder="Mật khẩu" >
                    </div>
                </div>
                <div>
                    <label class="form-label" for="repassword">Nhập lại mật khẩu</label>
                    <div>
                        <input class="form-control " type="password" name="pass2" placeholder="Nhập lại mật khẩu" >
                    </div>
                </div>
                <div class="text-center row mb-3">
                    <button type="submit" class="btn btn-primary mt-3 ">Đăng Ký</button>
                </div>
            </form>
    </div>
    <script>
 	function  dangky(){
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
		
		if(frm.pass2.value=="")
		{
			alert("Bạn chưa nhập lại password");	
			frm.pass2.focus();
			return false;
		}
		mk=frm.pass.value;
		mk1=frm.pass2.value;
		if(mk1!=mk)
		{
			alert("Password chưa đúng");	
			frm.pass1.focus();
			return false;
		}
	}
 </script>
 <?php
    include '../public/footer.php';
    ?>
</body>
</html>