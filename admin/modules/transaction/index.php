<?php
   require "../../autoload/autoload.php";

$transaction = 'active';
 require "../../layouts/header.php"; 
 ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <div class="alert alert-info" role="alert">
                              Danh sách Đơn hàng
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
                        <table class="table table-hover table-striped">
                        <thead>
                          
                            <tr>
                                <th>ID ĐƠN HÀNG</th>
                                <th>THÔNG TIN KHÁCH HÀNG</th>
                                <th>THÔNG TIN SẢN PHẨM</th>
                                <th>SỐ LƯỢNG MUA</th>
                                <th>STATUS</th>
                                <th>ACTION</th>

                            </tr>
                        </thead>
                        <tbody>
                              <?php 
                                $db = new Database;
                                $sql = "SELECT transaction.id,transaction.status, users.name,users.phone,users.email,bill.price,bill.number,product.name_product,product.thumbar FROM bill,transaction,users,product WHERE bill.transaction_id = transaction.id AND transaction.user_id = users.id AND bill.product_id = product.id";
                                $data = $db -> fetchsql($sql);
                                $stt = 1;
                                foreach ($data as $item) {
                             ?>
                            <tr>
                                <td style="vertical-align: middle;"> <?php echo $item['id'] ?></td>
                                <td>
                                    <ul>
                                        <li>Tên: <?php echo $item['name'] ?> </li>
                                        <li>Số điện thoại: <?php echo $item['phone'] ?></li>
                                        <li>Email:<?php echo $item['email'] ?></li>
                                    </ul>
                                </td >
                                <td style="vertical-align: middle;">
                                    <ul>
                                        <li><?php echo $item['name_product'] ?></li>
                                        <li><img width="80px" height="80px" src="../../../public/upload/product/<?php echo $item['thumbar'] ?>" alt=""></li>
                                    </ul>

                                </td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $item['number'] ?></td>
                                <td style="vertical-align: middle;"><a href="status.php?id=<?php echo $item['id'] ?>" class="btn <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-success'  ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a></td>

                                <td style="vertical-align: middle;">
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