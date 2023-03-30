<?php
    session_start();
    include '../public/connect.php';
    $title ='Chỉnh sửa lịch lái thử';
    include '../public/header.php';

    $query = "SELECT hotendk,thoigiandk,maXe,sdt FROM dkchaythu WHERE makh =?";
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

    <div class="container mt-5">
        <?php
            $row = $sth->fetch();?>
            <form action="update_chaythu.php" name="frm" method="post">
                    <div class="container-sm col-5">
                        <h3 class="text-center pb-5">Cập nhật thông tin lái thử</h3>
                        <div class="mb-3 mt-3">
                            <label>Họ và Tên:</label>
                            <input class="form-control" id="hoten" type="text" name="hoten" value="<?php echo $row['hotendk'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label>Thời gian lái thử:</label>
                            <input class="form-control" id="thoigian" type="date" name="thoigian" value="<?php echo $row['thoigiandk'] ?>">
                        </div>
                        <div class="mb-3">
                            <lable>Tên xe:</lable>
                            <input class="form-control" id="tenxe" type="text" name="tenxe" value="<?php echo $row['maXe'] ?>">
                        </div> 
                        <div class="mb-3">
                            <lable>Số điện thoại:</lable>
                            <input class="form-control" id="sdt" type="text" name="sdt" value="0<?php echo $row['sdt'] ?>">
                        </div> 
                        <div class ="row">
                            <input type="hidden" name="makh" value="<?php echo $_GET['id'] ?>">
                            <button type="submit" onclick="return check(this)" class="btn btn-primary mb-3">Cập nhật</button>
                        </div>
                    </div>
                </form>';
                  
    </div>
        <script>
            function check(){
                var hoten = document.getElementById('hoten').value;
                var hoten = document.getElementById('hoten').value;
                if(hoten == "")
                {
                    alert("Bạn chưa nhập tên. Vui lòng kiểm tra lại");
                    frm.hoten.focus();
                    return false;	
                }
                if(hoten.length<6)
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
                r = confirm('Bạn có chắc chắn muốn cập nhật thông tin lái thử?');
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