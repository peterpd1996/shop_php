<?php
require "../../autoload/autoload.php";
$product = 'active';
 require "../../layouts/header.php"; 

 ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <div class="alert alert-info" role="alert">
                              Danh sách sản phẩm
                            </div>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                   
                             <?php if (isset($_SESSION['success'])) {
                                 echo "<div class='alert alert-success' role='alert'>
                                 ".$_SESSION['success']." </div>";
                                 unset($_SESSION['success']);
                             } ?>
                           
                      <div class="col-lg-12">
                        <div class="text-right"><a href="add.php" class="btn btn-info">Thêm mới</a></div>
                        <table class="table table-hover table-striped">
                        <thead>
                          
                            <tr>
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>IMAGES</th>
                                <th>TÊN KHÔNG DẤU</th>
                                <th>NỘI DUNG</th>
                                <th>&ensp;&ensp; THÔNG TIN</th>
                                <th>STATUS</th>

                            </tr>
                        </thead>
                        <tbody>
                              <?php 
                                $db = new Database;
                                $sql = "SELECT product.*,category.name FROM product,category WHERE product.category_id = category.id ORDER BY id DESC";
                                $data = $db -> fetchsql($sql);
                                foreach ($data as $item) {
                             ?>
                            <tr>
                                <td><?php echo $item['id'] ?></td>
                                <td><?php echo $item['name_product'] ?></td>
                                <td><img width="80px" height="80px" src="../../../public/upload/product/<?php echo $item['thumbar'] ?>" alt=""></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td width="300px"><?php echo $item['content'] ?></td>
                                <td><ul>
                                    <li>Giá: <?php echo format_number($item['price'])?></li>
                                    <li>Số lương: <?php echo $item['number'] ?> </li>
                                    <li>Sale: <?php echo $item['sale'] ?>%</li>
                                    <li>Danh mục: <?php echo $item['name'] ?></li>
                                </ul></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $item['id']; ?>" style ="padding-right:10px" class = 'btn btn-primary' ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
                                    <a href="delete.php?id=<?php echo $item['id']; ?>"  onclick = "return confirm('Bạn có muốn xóa sản phẩm này không ??') " class = 'btn btn-danger'><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>

                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php require "../../layouts/footer.php" ?>
