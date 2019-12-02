 <?php if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min-range' =>1))) {
                            $id = $_GET['id'];
                            $category = $db -> fetchID("category",$id);
                            if ($category != NULL) {
                                $sql = "SELECT * FROM product where category_id = $id";
                                $product = $db -> fetchsql($sql);

                            }
                            else{
                                echo "<p class = 'alert alert-warning'>KHÔNG TỒN TẠI DANH MỤC SẢN PHẨM </p>";
                                exit();
                            }
                        } 
                        else{
                             echo "<p class = 'alert alert-warning'>KHÔNG TỒN TẠI DANH MỤC SẢN PHẨM </p>";
                                exit();
                        }
                        ?>
                                              
                         <h3 class="title-main" style="text-align: left;"><a href="#"> <?php echo $category['name'] ?> </a> </h3>   
                               <div class="showitem">
                                <?php foreach ($product as $item): ?>
                                    <div class="col-md-3 item-product bor">
                                        <a href="index.php?p=chiTietSanPham&id=<?php echo $item['id'] ?>">
                                            <img src="public/upload/product/<?php echo $item['thumbar'] ?>" class="" width="100%" height="180">
                                        </a>
                                        <div class="info-item">
                                            <a href=""><?php echo $item['name_product'] ?></a>
                                            <?php if ($item['sale'] > 0) { ?>
                                               <p><strike class="sale"><?php echo format_number($item['price']) ?></strike> &nbsp<b class="price"><?php echo format_priceSale($item['price'],$item['sale']) ?></b></p>
                                           <?php }else {?>
                                            <p><b class="price"><?php echo format_number($item['price']) ?></b></p>
                                        <?php } ?>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href=""><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>  
                            <?php endforeach ?>
                        </div>

                        


