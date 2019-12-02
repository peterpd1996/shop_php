<h3 class="title-main" style="text-align: left;margin-bottom: 30px"><a href="#"> Đăng kí </a> </h3> 
<?php
        // kiểm tra xem các ô có trống hay không
        if (isset($_POST['submit'])) {
            $error = [];
            if ($_POST['name']=='') {
                $error['name'] = "Bạn chưa nhập họ tên";
            } else{
                $name = trim($_POST['name']);
            }
    
            if ($_POST['password']=='') {
                $error['password'] = "Bạn chưa nhập mật khẩu";
            } else{
                $password = trim($_POST['password']);
            }
    
            if ($_POST['repassword']!=$_POST['password']) {
                $error['repassword'] = "Mật khẩu không trùng";
            } else {
            	$repass = $_POST['repassword'];
            }
    		
            if ($_POST['email']=='') {
                $error['email'] = "Bạn chưa nhập email";
            } else{
                $email = trim($_POST['email']);
            }
            $rs = $db -> fetchOne("users","email = '".$email."'");
            if ($rs != NULL ) {
            	$error['existEmail'] = "Email này đã được đăng kí với tài khoản khác !!";
            }

            if ($_POST['phone']=='') {
                $error['phone'] = "Bạn chưa nhập số điện thoại";
            } else{
                $phone = trim($_POST['phone']);
            } 
    
             if ($_POST['address'] == '') {
                $error['address'] = "Bạn chưa nhập địa chỉ";
            } else{
                $address = trim($_POST['address']);
            }
            
        // không có lỗi thì bắt đầu insert
            if (empty($error)) {
                $data = [
                    "name" => $name,
                    "password" => md5($password),
                    "email" => $email,
                    "phone" => $phone,
                    "address" => $address
                ];
                 $rs = $db-> insert("users",$data);
                 if ($rs > 0) {
                     $success = "Đăng kí thành công !! Mời bạn đăng nhập";
                     unset($name,$password,$email,$phone,$address,$repass);
                 }
            }
            
    
        }
     ?>

        <?php if (isset($success)) {
        	 echo "<div class='alert alert-success' role='alert'>
                                 ".$success." </div>";
        } ?>
        <form action="#" method="POST" >
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Họ và tên</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="name" value="<?php if(isset($name)) echo $name ?>">
                    </div>
                </div>
                <?php if (isset($error['name'])) { ?>
                <p class = 'text-danger'><?php echo $error['name'] ?></p>
                <?php  } ?>
            </div>
                <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Email</label>
                    <div class=" col-md-6">
                        <input type="email" class="form-control" name="email"  value="<?php if(isset($email)) echo $email ?>">
                    </div>
                </div>
                <?php if (isset($error['email'])) { 
                 echo "<p class = 'text-danger'>".$error['email']."</p>";
                } elseif (isset($error['existEmail'])) {
                 echo "<p class = 'text-danger'>".$error['existEmail']."</p>";
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
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Xác nhận mật khẩu</label>
                    <div class=" col-md-6">
                        <input type="password" class="form-control" name="repassword" value="<?php if(isset($repass)) echo $repass ?>">
                    </div>
                </div>
                <?php if (isset($error['repassword'])) { ?>
                <p class = 'text-danger'><?php echo $error['repassword'] ?></p>
                <?php  } ?>
            </div>
        
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Số điện thoại</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="phone"  value="<?php if(isset($phone)) echo $phone ?>">
                    </div>
                    <?php if (isset($error['phone'])) { ?>
                    <p class = 'text-danger'><?php echo $error['phone'] ?></p>
                    <?php  } ?>
                </div>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
               	<div class="form-group">
                    <label class="col-md-2">Địa chỉ</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="address"  value="<?php if(isset($address)) echo $address ?>">
                    </div>
                    <?php if (isset($error['address'])) { ?>
                    <p class = 'text-danger'><?php echo $error['address'] ?></p>
                    <?php  } ?>
                </div>
              </div>
            
            <div style="margin-bottom: 25px"></div>
            <input type="submit" class="btn btn-info col-md-2 col-md-offset-4" style="margin-bottom: 10px" value="Đăng kí" name="submit">
        </form>

<!-- /.row -->
<!-- /.container-fluid -->
