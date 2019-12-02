<?php
    ob_start();
    require "../../autoload/autoload.php";
    $admin = 'active';
    require "../../layouts/header.php";
        $db = new Database;
        if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min-range' =>1))) {
        $id = $_GET['id'];
        $data = $db->fetchID('users',$id);
        $prem = explode("-",$data['premission']);
        }
        else
        {
            header('location:index.php');
        }



        // kiểm tra xem các ô có trống hay không
        if (isset($_POST['submit'])) {
            $error = [];
            if ($_POST['name']=='') {
                $error['name'] = "Bạn chưa nhập họ tên";
            } else{
                $name = $_POST['name'];
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
    
         
            
        // không có lỗi thì bắt đầu insert
            if (empty($error)) {
                $data = [
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone,
                    
                ];
                 $rs = $db-> update("admin",$data,array("id" => $id));
                 if ($rs > 0) {
                     $_SESSION['success'] = "Sửa thành công";
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
                        <input type="text" class="form-control" name="name" value="<?php echo $data['name']  ?>">
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
                        <input type="email" class="form-control" name="email" value="<?php echo $data['email']  ?>">
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
                        <input type="text" class="form-control" name="phone" value="<?php echo $data['phone']  ?>">
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
                         <?php
                         // duyet trong mảng quyền mình lấy được trong database kiểm tra xem value có trùng voi quyen nào không 
                            foreach ($prem as $item){
                                    
                                $item = explode(",",$item);
                                $ok = 0;
                                     if (trim($value['title']) == trim($item[0]))
                                        {  // chỉ cần kiểm tra phần tử trong mảng có khong nếu có break luôn 
                                            $ok = 1;
                                            break;
                                        }
                            }

                            ?>
                                
                             <input type="checkbox" name="checkpre[]" value=" <?php echo $value['title'].",".$value['link_add'].",".$value['link_edit'].",".$value['link_delete'].",".$value['link_index'] ?> " class ='check' <?php if ($ok==1) {
                                 echo "checked";
                             } ?>
                             >
                            <label><?php echo $value['title']; ?></label>         
                           
                             
                            
                        </div>
                    </div>
                 <?php  endforeach; ?>
            <div style="margin-bottom: 25px"></div>
            <input type="submit" class="btn btn-info" value="Sửa" name="submit">
        </form>
    </div>
</div>
<!-- /.row -->
<!-- /.container-fluid -->
<?php require "../../layouts/footer.php" ?>