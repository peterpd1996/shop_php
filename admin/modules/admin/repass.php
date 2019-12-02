<?php
ob_start();
require "../../autoload/autoload.php";
$admin = 'active';
require "../../layouts/header.php";
    $db = new Database;
       $db = new Database;
        if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min-range' =>1))) {
            $id = $_GET['id'];
        }
        else
        {
            header('location:index.php');
        }
    if (isset($_POST['submit'])) {


        if ($_POST['newpass'] == '') {
            $error['newpass'] = "Bạn chưa nhập mật khẩu";
        }
        else{
            $newpass = $_POST['newpass'];
        }
        if ($_POST['repass'] =='') {
            $error['repassEmpty'] = "Bạn chưa xác nhận lại mật khẩu";
            
        }
        if ($_POST['newpass'] != $_POST['repass']) {
            $error['repass'] = "Bạn nhập mật khẩu không trùng";
        }

        if (!isset($error)) {
            $data = [   
                "password" => $newpass
            ];
            $rs = $db -> update("users",$data,array("id" => $id));
            if ($rs > 0) {
                $success = "Đổi mật khẩu thành công";
            }

        }
    }
 ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Reset Password
                        </h1>

                    </div>
                </div>
                <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Danh mục</a>
                            </li>
                           
                        </ol>
              
                <!-- /.row -->
                <?php if (isset($success)) {
                     echo "<div class='alert alert-success' role='alert'>
                                 ".$success." </div>";
                } ?>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                       <form action="#" method="POST">
                            <div class="form-group">
                                <?php $data = $db->fetchID('users',$id); ?>
                                <label>Email</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $data['email'] ?>" readonly = "true">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="newpass" value="<?php if (isset($newpass)) echo $newpass ?>" >

                            </div>
                            <?php if (isset($error['newpass'])) {
                                echo "<p class = 'text-danger'> Bạn chưa nhập mật khẩu </p>";
                            } ?>
                            <div class="form-group">
                                <label>Retype Password</label>
                                <input type="password" class="form-control" name="repass">
                            </div>
                            <?php if (isset($error['repassEmpty']))
                                {
                                    echo "<p class = 'text-danger'> ".$error['repassEmpty']." </p>";
                                }

                            elseif (isset($error['repass'])) {
                                echo "<p class = 'text-danger'> Bạn nhập mật khẩu không trùng </p>";
                            } ?>

                            <input type="submit" class="btn btn-info" value="Đổi mật khẩu" name="submit">
                       </form>
                    </div>
                </div>
                      
                </div>
             
                <!-- /.row -->
            <!-- /.container-fluid -->

<?php require "../../layouts/footer.php" ?>