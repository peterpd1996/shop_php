 <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Mobile</a>
                            </li>
                            <li>
                                <a href="">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="index.php?p=giohang"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                            <?php if (isset($_SESSION['cart'])) {
                                echo "<p>".count($_SESSION['cart'])."</p>";
                            } ?>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>