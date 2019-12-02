
            <?php if (isset($_GET['p'])) {
                $p = $_GET['p'];

            }else{
                $p="";
            }

             ?>
  <?php  ?>
            <!---->
            <!--HEADER-->
            <?php require "layouts/header.php" ?>
            <!--END HEADER-->

            <!--MENUNAV-->
           <?php require "layouts/menu.php"  ?>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                          <?php require "layouts/block/danhmuc.php" ?>
                        </div>
                    <!-- end danh mục -->
                        <div class="box-left box-menu">
                            <!--<?php //require "layouts/block/sanphammoi.php" ?> -->
                            
                        </div>
                        <!-- end sản phẩm mới -->
                        <div class="box-left box-menu">
                          <!--   <?php //require "layouts/block/sanphamhot.php" ?>-->
                        
                        </div>
                        <!-- end sản phẩm hot -->
                    </div>
                     <!-- nội dùng main và slile -->
                    <div class="col-md-9 bor">
                       <?php 
                        switch ($p) {
                            case 'chiTietSanPham':
                                 require "layouts/pages/chiTietSanPham.php";
                                 break;
                            case 'danhMucSanPham':
                                require "layouts/pages/danhMucSanPham.php";
                                break;
                            case 'dangki':
                                require "layouts/pages/dangki.php";
                                break;
                            case 'dangnhap':
                                require "layouts/pages/dangnhap.php";
                                break;
                             case 'giohang':
                                require "layouts/pages/giohang.php";
                                break; 
                            case 'thanhtoan':
                                require "layouts/pages/thanhtoan.php";
                                break;  
                            case 'thongbao':
                                require "layouts/pages/thongbao.php";
                                break;    
                            default:
                                require "layouts/pages/home.php";
                                break;
                        }
                      

                        ?>
                            
                       

                    </div>
                     <!-- nội dùng main và slile -->
                </div>
<?php require "layouts/footer.php" ?>
