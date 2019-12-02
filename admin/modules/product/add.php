<?php
    ob_start();
    require "../../autoload/autoload.php";
    $product = 'active';
    require "../../layouts/header.php";
        $db = new Database;
        // kiểm tra xem các ô có trống hay không
        if (isset($_POST['submit'])) {
            $error = [];
            if ($_POST['name']=='') {
                $error['name'] = "Bạn chưa nhập tên sản phẩm";
            } else{
                $name = $_POST['name'];
            }
            if ($_POST['category_id'] == 0) {
                $error['category_id'] = "Bạn chưa chọn danh mục cho sản phẩm";
            } else{
                $category = $_POST['category_id'];
            }

            if ($_POST['price']=='') {
                $error['price'] = "Bạn chưa nhập giá sản phẩm";
            } else{
                $price = $_POST['price'];
            }

            if ($_POST['number']=='') {
                $error['number'] = "Bạn chưa nhập số lượng sản phẩm";
            } else{
                $number = $_POST['number'];
            }

            $sale = $_POST['sale'];

            if (trim($_POST['content'])=='') {
                $error['content'] = "Bạn chưa nhập nội dung";
            } else{
                $content = $_POST['content'];
            }
        // kiểm tra file ảnh
            if (isset($_FILES['thumbar'])) {
                $fileName = strtolower($_FILES['thumbar']['type']);
                $fileSize = $_FILES['thumbar']['size'];
                if ($fileSize > 2000000 ) {
                    $error['imgSize'] = "File bạn chọn kích thước quá 2M";
                }
                elseif($fileName != 'image/png' && $fileName != 'image/jpeg' && $fileName != 'image/jpg')
                {
                    $error['fileName'] = "Chỉ cho phép file jpg,pgn,jepg";
                }
                else
                {
                    $thumbar = $_FILES['thumbar']['name'];
                    
                    move_uploaded_file($_FILES['thumbar']['tmp_name'],"../../../public/upload/product/".$_FILES['thumbar']['name']);
                }
                
            }
        // không có lỗi thì bắt đầu insert
            if (empty($error)) {
                $data = [
                    "name_product" => $name,
                    "slug" => slug_url($name),
                    "price" => $price,
                    "sale" => $sale,
                    "thumbar" => $thumbar,
                    "category_id" => $category,
                    "content" => trim($content),
                    "number"  => $number
                ];
                 $rs = $db-> insert("product",$data);
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
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label">Tên danh mục</label>
                    <div class=" col-md-6">
                        <select name="category_id" class="form-control" id="">
                            <option value="0">-- Mời bạn chonh danh mục --</option>
                            <?php 
                                $data = $db -> fetchAll("category");
                                foreach ($data as $item) {
                             ?>
                             <option value="<?php echo $item['id']?>"><?php echo $item['name']  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php if (isset($error['category_id'])) { ?>
                   <p class = 'text-danger'><?php echo $error['category_id'] ?></p>
                <?php  } ?>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Tên sản phẩm</label>
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
                    <label class="col-md-2">Giá</label>
                    <div class=" col-md-6">
                        <input type="number" class="form-control" name="price">
                    </div>
                </div>
               <?php if (isset($error['price'])) { ?>
                   <p class = 'text-danger'><?php echo $error['price'] ?></p> 
                <?php  } ?>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Giảm giá</label>
                    <div class=" col-md-3">
                        <input type="number" class="form-control" name="sale">
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Số lượng</label>
                    <div class=" col-md-3">
                        <input type="number" class="form-control" name="number">
                    </div>
                </div>
                  <?php if (isset($error['number'])) { ?>
                   <p class = 'text-danger'><?php echo $error['number'] ?></p> 
                <?php  } ?>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Hình ảnh</label>
                    <div class=" col-md-3">
                        <input type="file" class="form-control" name="thumbar" required="true"> 
                    </div>
                </div>
                <?php if (isset($error['imgSize'])) { 
                  echo "<p class ='text-danger'> ".$error['imgSize']." </p>";
                 } elseif (isset($error['fileName'])) {
                    echo "<p class ='text-danger'> ".$error['fileName']." </p>";
                 } 
                 ?>
            </div>
            <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Nội dung</label>
                    <div class=" col-md-6">
                        <textarea class="form-control" rows="4" name="content">
                        </textarea>
                    </div>
                   <?php if (isset($error['content'])) { ?>
                   <p class = 'text-danger'><?php echo $error['content'] ?></p> 
                <?php  } ?>
                </div>
            </div>
            <div style="margin-bottom: 25px"></div>
            <input type="submit" class="btn btn-info" value="Thêm mới" name="submit">
        </form>
    </div>
</div>
<!-- /.row -->
<!-- /.container-fluid -->
<?php require "../../layouts/footer.php" ?>