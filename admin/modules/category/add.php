<?php
ob_start();
require "../../autoload/autoload.php";
$category = 'active';
require "../../layouts/header.php";
    $db = new Database;
    if (isset($_POST['submit'])) {
        $danhmuc = postInput('danhmuc');
        $home = postInput('home');

        $data = [
            "name" => $danhmuc,
            "slug" => slug_url($danhmuc),
            "home" => $home
        ];
        $error = [];

        if ($danhmuc == '') {
            $error['danhmuc'] = 0;
        }
        if (empty($error)) {
            $categ = $db -> insert("category",$data);
            if ($categ > 0) {
                $_SESSION['success'] = "Thêm mới thành công !!";
                header('location:index.php');
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
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                       <form action="#" method="POST">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" name="danhmuc">
                            </div>
                            <?php if (isset($error['danhmuc'])) {
                                echo "<p class = 'text-danger'> Bạn chưa nhập tên danh mục </p> ";
                            } ?>
                               
                             <div class="form-group">    
                                 <label style="display: block;">Home</label> 
                                  <label class="radio-inline"><input type="radio" value="1"  name = "home" checked=""> Hiện thị </label> 
                                  <label class="radio-inline"><input type="radio" value="0" name = "home"> Ẩn đi </label> 
                                </div>
                           

                            <input type="submit" class="btn btn-info" value="Thêm mới" name="submit">
                       </form>
                    </div>
                </div>
                      
                </div>
             
                <!-- /.row -->
            <!-- /.container-fluid -->

<?php require "../../layouts/footer.php" ?>