<?php
    ob_start();
    require "../../autoload/autoload.php";
    $admin = 'active';
    require "../../layouts/header.php";
    
        $db = new Database;
        // kiểm tra xem các ô có trống hay không
        if (isset($_POST['submit'])) {
               
            $error = [];
            if ($_POST['name']=='') {
                $error['name'] = "Bạn chưa nhập họ tên";
            } else{
                $name = $_POST['name'];
            }
    
            if ($_POST['password']=='') {
                $error['password'] = "Bạn chưa nhập mật khẩu";
            } else{
                $password = $_POST['password'];
            }
    
            if ($_POST['repassword']!=$_POST['password']) {
                $error['repassword'] = "Mật khẩu không trùng";
            }
    
            if ($_POST['email']=='') {
                $error['email'] = "Bạn chưa nhập email";
            } else{
                $email = $_POST['email'];
            }
            if ($_POST['phone']=='') {
                $error['phone'] = "Bạn chưa nhập số điện thoại";
            } else{
                $phone = $_POST['phone'];
            } 
    
            
            $arrayPre = $_POST['checkpre'];
            

            $premissionLength = count($_POST['checkpre']);
            $pre = "";
            for ($i = 0; $i < $premissionLength ; $i++) {
                $pre .= $arrayPre[$i]."-"; 
            }
            $pre = substr($pre,0,-1); // cat dau - o cuoi
               
        // không có lỗi thì bắt đầu insert
            if (empty($error)) {
                $data = [
                    "name" => $name,
                    "password" => md5($password),
                    "email" => $email,
                    "phone" => $phone,
                    "premission" => $pre,
                    
                ];
                 $rs = $db-> insert("users",$data);
                 if ($rs > 0) {
                     $_SESSION['success'] = "Thêm mới thành công";
                     header('location:index.php');
                 }
            }
            
    
        }
     ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row" ">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm mới
                </h1>
            </div>
        </div>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Danh mục</a>
            </li>
        </ol>
        <!-- /.row -->
        <form action="#" method="POST" >
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Họ và tên</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <?php if (isset($error['name'])) { ?>
                <p class = 'text-danger'><?php echo $error['name'] ?></p>
                <?php  } ?>
            </div>
            <div style="margin-bottom: 25px"></div>
     
            
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Mật khẩu</label>
                    <div class=" col-md-6">
                        <input type="password" class="form-control" name="password">
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
                        <input type="password" class="form-control" name="repassword">
                    </div>
                </div>
                <?php if (isset($error['repassword'])) { ?>
                <p class = 'text-danger'><?php echo $error['repassword'] ?></p>
                <?php  } ?>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Email</label>
                    <div class=" col-md-6">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <?php if (isset($error['email'])) { ?>
                <p class = 'text-danger'><?php echo $error['email'] ?></p>
                <?php  } ?>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Số điện thoại</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <?php if (isset($error['phone'])) { ?>
                    <p class = 'text-danger'><?php echo $error['phone'] ?></p>
                    <?php  } ?>
                </div>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Chon quyen</label>
                    <div class=" col-md-6">
                        <input type="checkbox" name="full" class="checkall" onclick="checkall('check',this)">
                       <label>Full quyen</label>

                    </div>
                </div>
            </div>
                <?php foreach ($premission as $value): ?>
                    <div class="row">
                        <div class="col-md-4 " style="margin-left: 213px">
                            <input type="checkbox" name="checkpre[]" value=" <?php echo $value['title'].",".$value['link_add'].",".$value['link_edit'].",".$value['link_delete'].",".$value['link_index'] ?> " class ='check'>
                            <label><?php echo $value['title'] ?></label>
                        </div>
                    </div>
                 <?php  endforeach; ?>
            
            <div style="margin-bottom: 25px"></div>
            <input type="submit" class="btn btn-info" value="Thêm mới" name="submit">
        </form>
    </div>
</div>
<!-- /.row -->
<!-- /.container-fluid -->
<?php require "../../layouts/footer.php" ?>
