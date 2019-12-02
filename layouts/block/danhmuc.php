  <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php 
                                    
                                    $category = $db -> fetchAll("category");
                                   foreach ($category as $item) {

                                 ?>
                                <li>
                                    <a href="index.php?p=danhMucSanPham&id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></span></a>
                                </li>
                                <?php                                        
                                   } ?>
                               
                            </ul>