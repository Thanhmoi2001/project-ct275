<?php
session_start();
include '../public/connect.php';
$title = 'Đăng ký lái thử';
include '../public/header.php';
?>
<?php
if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']) && $_SESSION['phanquyen']!=0){
            $query = 'SELECT * FROM dkchaythu WHERE makh=?';
            $sth = $pdo->prepare($query);
                            $sth->execute([
                                $_SESSION['makh']
                            ]);
                            if($sth->rowCount()>0){
                                echo'<div class="container">
                                <table class="mt-5 table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Họ và Tên</th>
                                                <th scope="col">Thời gian đăng ký</th>
                                                <th scope="col">Tên Xe</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    

                                    $index = 1;
                                        while ($row = $sth->fetch()) {
                                            $htmlspecialchars = 'htmlspecialchars';
                                            echo"<tr>
                                                    <th scope=\"row\">".($index++)."</th>
                                                    <td>{$htmlspecialchars($row['hotendk'])}</td>
                                                    <td>{$htmlspecialchars($row['thoigiandk'])}</td>
                                                    <td>{$htmlspecialchars($row['maXe'])}</td>
                                                    <td>{$htmlspecialchars($row['sdt'])}</td>
                                                    <td><div class=\"d-flex justify-content-center\"><a class=\"btn btn-outline-primary me-2\" href=\"edit_chaythu.php?id=".($row['makh'])."\">Sửa</a>
<a class=\"btn btn-outline-danger\" onclick=\"return checkDelete()\" href=\"delete_chaythu.php?id=".($row['makh'])."\">Xóa</a>
</div>
                                                    </td>
                                                </tr>
                                                
                                                <script>
                                                    function checkDelete(){
                                                        r = confirm('Bạn có chắc chắn muốn xóa thông tin đăng ký?');
                                                        if( r == false )
                                                            return false;
                                                        else return true;
                                                    }
                                                </script>";
                                                }
                                 
                                echo'   </tbody>
                                    </table>
                                    <a class="btn btn-outline-success mb-3" href="add_dklaithu.php">Thêm</a>
                                    </div>';
                            }else{?>
    <div class="container">
            <form class="mt-3 col-md-6 offset-md-3 mt-5" action="update_dangkylaithu.php" method="post" name="frm" onsubmit="return dangkylaithu()">
                    <h2 class="text-center">Đăng Ký Lái Thử</h2>
                    <div>
                        <label class="form-label" for="hoten">Họ và Tên</label>
                        <div>
                            <input class="form-control " type="text" name="hoten" placeholder="Họ và Tên" >
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="thoigianlaithu">Thời gian lái thử</label>
                        <div>
                            <input class="form-control " type="date" name="thoigianlaithu" placeholder="DD/MM/YYYY">
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="sdt">Số điện thoại</label>
                        <div>
                            <input class="form-control " type="text" name="sdt" placeholder="Nhập sdt" >
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="tenxe">Tên xe</label>
                        <div>
                            <input class="form-control " type="text" name="tenxe" placeholder="Nhập tên xe bạn muốn lái thử" >
                        </div>
                    </div>
                    <div class="text-center row">
                        <button type="submit" class="btn btn-primary mt-3 mb-3 " name="dklaithu">Đăng Ký Ngay</button>
                    </div>
                </form>
                <div class="col-md-6 offset-md-3 row">
                    <h4>Lưu ý:</h4>
                    <p>Quý khách vui lòng mang theo CMTND và GPLX có hiệu lực khi tới lái thử xe</p>
                    <p>Đăng ký thông tin theo chỉ dẫn dưới đây để được đón tiếp chu đáo hơn</p>
                    <p>Hotline: 0854 172 887</p>
                </div>
        </div>

<?php
    }
}else{?>
    <div class="container">
        <form class="mt-3 col-md-6 offset-md-3 mt-5" action="update_dangkylaithu.php" method="post" name="frm" onsubmit="return dangkylaithu()">
                <h2 class="text-center">Đăng Ký Lái Thử</h2>
                <div>
                    <label class="form-label" for="hoten">Họ và Tên</label>
                    <div>
                        <input class="form-control " type="text" name="hoten" placeholder="Họ và Tên" >
                    </div>
                </div>
                <div>
                    <label class="form-label" for="thoigianlaithu">Thời gian lái thử</label>
                    <div>
                        <input class="form-control " type="date" name="thoigianlaithu" placeholder="DD/MM/YYYY">
                    </div>
                </div>
                <div>
                    <label class="form-label" for="sdt">Số điện thoại</label>
                    <div>
                        <input class="form-control " type="text" name="sdt" placeholder="Nhập sdt" >
                    </div>
                </div>
                <div>
                    <label class="form-label" for="tenxe">Tên xe</label>
                    <div>
                        <input class="form-control " type="text" name="tenxe" placeholder="Nhập tên xe bạn muốn lái thử" >
                    </div>
                </div>
                <div class="text-center row">
                    <button type="submit" class="btn btn-primary mt-3 mb-3 " name="dklaithu">Đăng Ký Ngay</button>
                </div>
            </form>
            <div class="col-md-6 offset-md-3 row">
                <h4>Lưu ý:</h4>
                <p>Quý khách vui lòng mang theo CMTND và GPLX có hiệu lực khi tới lái thử xe</p>
                <p>Đăng ký thông tin theo chỉ dẫn dưới đây để được đón tiếp chu đáo hơn</p>
                <p>Muốn xem thông tin đã đăng ký lái thử vui lòng <a class="a-customs" href="dangnhap.php"><b>Đăng Nhập</b></a></p>
                <p>Hotline: 0854 172 887</p>
            </div>
    </div>
    <script>
 	function  dangkylaithu()
	{
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
        if(frm.tenxe.value=="")
		{
			alert("Bạn chưa nhập tên xe. Vui lòng kiểm tra lại");
			frm.tenxe.focus();
			return false;	
		}
	}
 </script>
<?php
}
 include '../public/footer.php';
 ?>
</body>
</html>