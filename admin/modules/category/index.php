<?php
require "../../autoload/autoload.php";
$category = 'category';
 require "../../layouts/header.php"; 
 ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <div class="alert alert-info" role="alert">
                              Danh sách danh mục
                            </div>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
            <div class="row">
             <?php if (isset($_SESSION['success'])) {
                                 echo "<div class='alert alert-success' role='alert'>
                                 ".$_SESSION['success']." </div>";
                                 unset($_SESSION['success']);
                             } ?>
             <?php if (isset($_SESSION['error'])) {
                                 echo "<div class='alert alert-danger' role='alert'>
                                 ".$_SESSION['error']." </div>";
                                 unset($_SESSION['error']);
                             } ?>

                <div class="col-lg-12">
                    <div class="text-right"><a href="add.php" class="btn btn-info">Thêm mới</a></div>
                    <table class="table table-hover table-striped">
                        <thead>
                          
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>TÊN KHÔNG DẤU</th>
                                <th>&nbsp HOME</th>
                                <th>TRẠNG THÁI</th>
                                <th>CREATE</th>
                                 <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php 
                                $db = new Database;
                                $data = $db -> fetchAll('category');
                                $i = 1;
                                foreach ($data as $item) {
                             ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $item['id'] ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td><?php  if ($item['home'] == 1) {
                                  echo "<p class='btn-primary text-center'>Hiện thị</p>";
                                }else{
                                  echo "<p class='btn-default text-center'>Ẩn đi</p>";
                                }
                                ?>
                                </td>
                                <td><?php echo $item['status'] ?></td>
                                <td><?php echo $item['created_at'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $item['id']; ?>" style ="padding-right:10px" class = 'btn btn-primary' ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
                                    <a href="delete.php?id=<?php echo $item['id']; ?>"  onclick = "return confirm('Bạn có muốn xóa danh mục này không ??') " class = 'btn btn-danger'><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>

                                </td>
                            </tr>
                            <?php  $i++; } ?>
                            
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </li>
                              </ul>
                        </nav>
                    </div>
                </div>
            </div>
           .
            

              
                   
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->

<?php require "../../layouts/footer.php" ?>