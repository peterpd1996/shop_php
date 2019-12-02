
                <section id="slide" class="text-center" >
                            <img src="images/slide/sl3.jpg" class="img-thumbnail">
                        </section>


                <section class="box-main1">
                            <?php 
                            $sql = "SELECT id,name FROM category WHERE home = 1 ORDER BY updated_at DESC";

                            $homeActive = $db -> fetchsql($sql);
                            $data = [];
                            foreach ($homeActive as $home) {
                                $cateId = $home['id'];
                                $sql =  "SELECT * FROM product WHERE category_id = $cateId ";
                                $productHome = $db -> fetchsql($sql);
                                        // mình lưu vào một mảng luôn sẽ cho key là tên danh mục
                                $data[$home['name']] = $productHome;

                            }
                            

                            ?>
                            <?php foreach ($data as $key => $value): ?>


                               <h3 class="title-main" style="text-align: left;"><a href="#"> <?php echo $key ?> </a> </h3>   



                               <div class="showitem">
                                 <?php foreach ($value  as $item): ?>
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
                    <?php endforeach ?>
            </section>


