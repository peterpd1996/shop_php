<?php require "lib/database.php";
    require "lib/function.php";
     session_start();
    $db = new database;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
   
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>website máy tính</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="public/fontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="public/fontend/css/bootstrap.min.css">

        <script  src="public/fontend/js/jquery-3.2.1.min.js"></script>
        <script  src="public/fontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="public/fontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="public/fontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="public/fontend/css/style.css">
       
    </head>
    <body>
 <div id="wrapper">
        <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Tùng Dương</a><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['nameUser'])) { ?>
                                            Xin chào <?php echo $_SESSION['nameUser']  ?> 
                                        <li>
                                            <a href=""><i class="fa fa-user"></i>  My account<i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Contact</a></li>
                                                <li><a href="">Cart</a></li>
                                                <li><a href="dangxuat.php">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                        <?php } else { ?>
                                        <li>
                                            <a href="index.php?p=dangnhap"><i class="fa fa-unlock"></i> Đăng nhập </a>
                                        </li>
                                        <li>
                                            <a href="index.php?p=dangki"><i class="fa fa-user"></i> Đăng kí <i class="fa fa-caret-down"></i></a>
                                          
                                        </li>
                                        <?php } ?>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> All Category</option>
                                            <option> Dell </option>
                                            <option> Hp </option>
                                            <option> Asuc </option>
                                            <option> Apper </option>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="images/logo-default.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0986420994</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>