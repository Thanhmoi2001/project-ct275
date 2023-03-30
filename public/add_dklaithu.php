<?php
session_start();
include '../public/connect.php';
$title ="Đăng ký lái thử";
include '../public/header.php';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if(isset($_POST['dklaithu'])== true){
        $sql = "SELECT * FROM xe WHERE maXe = ? or madongXe = ? or tenXe =?";
        $sth = $pdo->prepare($sql);
        $sth->execute([
            $_POST['tenxe'],
            $_POST['tenxe'],
            $_POST['tenxe']
        ]);
        if($sth->rowCount() == 0){
            echo "<script>
                alert('Tên xe bạn nhập không tồn tại');
                window.open('dklaithu.php','_self', 1);
                </script>
             "; 
        }else{
            $sql2 = "SELECT * FROM khachhang WHERE hoTen=?";
            $sth3 = $pdo->prepare($sql2);
            $sth3->execute([
                $_POST['hoten']
            ]);
            if($sth3->rowCount()==0){
                echo "<script>
                alert('Hãy đăng ký tài khoản để đăng ký lái thử.');
                window.open('dangky.php','_self', 1);
                </script>
             "; 
            }else{
                $khachhang = $sth3->fetch();
                $_SESSION['makh'] = $khachhang['maKH'];
                if(!empty($_POST['hoten']) && !empty($_POST['sdt']) && !empty($_POST['tenxe']) ){
                    $query = 'INSERT INTO dkchaythu (hotendk,thoigiandk,maXe,makh,sdt) values (?, ?, ?, ?, ?)';
                    try{
                        $sth1 = $pdo->prepare($query);
                        $sth1->execute([
                            $_POST['hoten'],
                            $_POST['thoigianlaithu'],
                            $_POST['tenxe'],
                            $_SESSION['makh'],
                            $_POST['sdt']
                        ]);
                    }catch(PDOException $e){
                        $pdo_error = $e->getMessage();
                    }
                    if($sth1 && $sth1->rowCount() == 1){
                        echo "<script>
                        alert('Đăng ký lái thử thành công, hãy chờ cuộc gọi từ cửa hàng.');
                        window.open('index.php','_self', 1);
                        </script>
                        ";
                    } else{
                        $error_message ='Không thể lưu thông tin đăng ký';
                        $reason = $pdo_error ?? 'Không rõ nguyên nhân';
                        include '../public/show_error.php';
                    }
        }else {
            $error_message = 'Hãy Nhập thông tin đăng ký!';
            include '../public/show_error.php';
            include '../public/dangky.php';
            }
        }
    }
}
}
?>
<div class="d-flex justify-content-center">
        <form class="mt-3 col-md-6 mt-5" action="update_dangkylaithu.php" method="post" name="frm" onsubmit="return dangkylaithu()">
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
 include '../public/footer.php'; 
 ?>
 </body>
 </html>
