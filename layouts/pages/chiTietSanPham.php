<?php      if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min-range' =>1))) {
                            $id = $_GET['id'];
                            $detailProduct = $db -> fetchID("product",$id);
                            if ($detailProduct == NULL) {
                                
                                echo "<p class = 'alert alert-warning'>KHÔNG TỒN TẠI DANH MỤC SẢN PHẨM </p>";
                                exit();
                            }
                            
                        } 
                        else{
                             echo "<p class = 'alert alert-warning'>KHÔNG TỒN TẠI SẢN PHẨM </p>";
                                exit();
                        }
                        ?>
                         <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="public/upload/product/<?php echo $detailProduct['thumbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                                <ul class="text-center bor clearfix" id="imgdetail">
                                    <li>
                                        <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3> <?php echo $detailProduct['name_product'] ?> </h3></li>
                                   
                                    <?php if ($detailProduct['sale'] > 0) { ?>
                                               <p  style="margin-left: 10px;"><strike class="sale"><?php echo format_number($detailProduct['price']) ?></strike> &nbsp<b class="price"><?php echo format_priceSale($detailProduct['price'],$detailProduct['sale']) ?></b></p>
                                           <?php }else {?>
                                            <p><b class="price" style="margin-left: 10px;">Price: <?php echo format_number($detailProduct['price']) ?></b></p>
                                        <?php } ?>





                                    <li><a href="addcart.php?id=<?php echo $id ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></li>
                               </ul>
                            </div>

                        </section>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                                    <li><a data-toggle="tab" href="#menu1">Bình luận </a></li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Nội dung</h3>
                                        <p><?php echo $detailProduct['content'] ?></p>
                                    </div>
                                <div id="menu1" class="tab-pane fade">
                                    
                                <div class="container">
                                <div class="row">
                                    <!-- Blog Post Content Column -->
                                    <div class="col-lg-8">
                                        <?php if (isset($_SESSION['idUser'])) {
                                            
                                         ?>
                                        <div class="well">
                                            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                                            <form role="form">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="content" rows="3"></textarea>
                                                </div>
                                                <div  class="btn btn-primary" id="sent">Gửi</div>
                                            </form>
                                        </div>
                                    <?php } else { echo "<p class = 'text-primary'>Bạn phải đăng nhập để bình luận..</p>"; }?>
                                        <hr>
                                        <!-- Posted Comments -->
                                        <!-- Comment -->
                                        
                                        <ul class="list-unstyled listcomment">
                                             <p id="aaa"></p>
                                            <?php 
                                                $query = "SELECT * FROM comment WHERE id_sanpham = $id ORDER BY id DESC";
                                                $result = $db->fetchsql($query);
                                        foreach ($result as $value):
                                            $id_user = $value['id_user'];
                                            $query = "SELECT name FROM users WHERE id = $id_user";
                                                $name = $db->fetchsql($query);
                                                
                                             ?>

                                            <li class="media">
                                            <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $name[0]['name']; ?>
                                                    <small> <?php echo date("d/m/Y  H:i ",strtotime($value['created_at']));  ?></small>
                                                </h4>
                                                <?php echo $value['cmt'] ;?> 
                                            </div>
                                         </li>
                                        <?php 
                                            endforeach; 
                                         ?>
                                        <!-- Comment -->

                                        </ul>
                                    </div>
                                    <!-- Blog Sidebar Widgets Column -->
                                </div>
                                <!-- /.row -->
                            </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
<script>
    
        $(document).ready(function function_name(argument) {
                 $('#sent').on('click', function(event){
                    event.preventDefault();
                    
                    var cmt = $("#content").val();
                    var id_sanpham = <?php echo $id; ?>;
                    $.ajax({
                        url:"comment.php",
                        method:"POST",
                        data:{id_sanpham:id_sanpham,comment:cmt},
                        success:function(data){
                            $("#content").val('');
                            $("#aaa").before(data);
                        }
                    })
                   

                
                });
        })

</script>