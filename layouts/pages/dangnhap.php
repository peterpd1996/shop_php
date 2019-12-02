
<h3 class="title-main" style="text-align: left;margin-bottom: 30px"><a href="#"> Đăng nhập </a> </h3> 
<?php
    
        // kiểm tra xem các ô có trống hay không
        if (isset($_POST['submit'])) {
            $error = [];

    		
            if ($_POST['email']=='') {
                $error['email'] = "Bạn chưa nhập email";
            } else{
                $email = trim($_POST['email']);
            }

            if ($_POST['password']=='') {
                $error['password'] = "Bạn chưa nhập mật khẩu";
            } else{
                $password = md5(trim($_POST['password']));

            }
            $rs = $db -> fetchOne("users","email = '".$email."' AND password = '".$password."' ");
            if ($rs == NULL) {
                $error['saipass'] = "Bạn nhập sai tài khoản hoặc mật khẩu !!";
            }

            if (empty($error)) {
                $_SESSION['idUser'] = $rs['id'];
                $_SESSION['nameUser'] = $rs['name'];
                echo "<script>location.href = 'index.php'</script>";
            }
    
        
            
    
        }
     ?>
        <form action="#" method="POST" >
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Email</label>
                    <div class=" col-md-6">
                        <input type="email" class="form-control" name="email"  value="<?php if(isset($email)) echo $email ?>">
                    </div>
                </div>
                <?php if (isset($error['email'])) { 
                 echo "<p class = 'text-danger'>".$error['email']."</p>";
                }
                 ?>
            </div>
     
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Mật khẩu</label>
                    <div class=" col-md-6">
                        <input type="password" class="form-control" name="password" value="<?php if(isset($password)) echo $password ?>" >
                    </div>
                </div>
                <?php if (isset($error['password'])) { ?>
                <p class = 'text-danger'><?php echo $error['password'] ?></p>
                <?php  } ?>
            </div>
            <?php  if (isset($error['saipass'])) {
                 echo "<p class = 'text-danger' style = 'margin-left:145px'>".$error['saipass']."</p>";
                } 
            ?>
            <div style="margin-bottom: 25px"></div>
            
            
        
            <input type="submit" class="btn btn-info col-md-2 col-md-offset-4" style="margin-bottom: 10px" value="Đăng Nhập" name="submit">
        </form>

<!-- /.row -->
<!-- /.container-fluid -->
