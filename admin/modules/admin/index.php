<?php
require "../../autoload/autoload.php";
$admin = 'active';
 require "../../layouts/header.php";
      ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <div class="alert alert-info" role="alert">
                              Danh sách thành viên
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
                                <th>ID</th>
                                <th>TÊN</th>
                               
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>EMAIL</th>
                               
                                <th> STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php 
                                $db = new Database;
                                $data = $db -> fetchAll('users');
                               
                                foreach ($data as $item) {
                             ?>
                            <tr>
  
                                <td><?php echo $item['id'] ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['phone'] ?></td>
                                <td><?php echo $item['email'] ?></td>
                                
                                <td>
                                    <a href="edit.php?id=<?php echo $item['id']; ?>" style ="padding-right:10px" class = 'btn btn-primary' ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
                                    <a href="delete.php?id=<?php echo $item['id']; ?>"  onclick = "return confirm('Bạn có muốn xóa tài khoản này ??') " class = 'btn btn-danger'><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                    <a href="repass.php?id=<?php echo $item['id']; ?>" class = 'btn btn-info'><i class="fa fa-key" aria-hidden="true"></i> Reset Pass</a>

                                </td>
                            </tr>
                            <?php   } ?>
                            
                        </tbody>
                    </table>
             
                </div>
            </div>
       
            

              
                   
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->

<?php require "../../layouts/footer.php" ?>