<h3 class="title-main" style="text-align: left;margin-bottom: 30px"><a href="#"> Thanh toán </a> </h3> 
<?php
        // kiểm tra xem các ô có trống hay không
        $user = $db->fetchID("users",$_SESSION['idUser']);

        if (isset($_POST['submit'])) {
            $data = [
                "user_id" => $_SESSION['idUser'],
                "total"   => $_SESSION['sum'],
            ];
            $id_transac = $db->insert("transaction",$data);
           
            if ($id_transac > 0) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    $data2 = [
                        "transaction_id" => $id_transac,
                        "product_id"     => $key,
                        "number"         => $item['number'],
                        "price"          => $item['price']
                    ];
                  $rs =  $db -> insert("`bill`",$data2);
                }
                unset($_SESSION['cart']);
                $_SESSION['successOrder'] = "Lưu thông tin thành công chúng tôi sẽ liên hệ với bạn sớm nhất!!!";
                header('location:index.php?p=thongbao');
            }
        }
     ?>

 
        <form action="#" method="POST" >
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Họ và tên</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="name" value="<?php if(isset($user['name'])) echo $user['name'] ?>">
                    </div>
                </div>
            </div>
                <div style="margin-bottom: 25px"></div>
             <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Số điện thoại</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="name" value="<?php if(isset($user['phone'])) echo $user['phone'] ?>">
                    </div>
                </div>
            </div>
                <div style="margin-bottom: 25px"></div>
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Email</label>
                    <div class=" col-md-6">
                        <input type="email" class="form-control" name="email"  value="<?php if(isset($user['email'])) echo $user['email'] ?>">
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 25px"></div>
             <div class="row">
                <div class="form-group">
                    <label class="col-md-2">Địa chỉ</label>
                    <div class=" col-md-6">
                        <input type="text" class="form-control" name="name" value="<?php if(isset($user['address'])) echo $user['address'] ?>">
                    </div>
                </div>
            </div>
                <div style="margin-bottom: 25px"></div>
            <input type="submit" class="btn btn-info col-md-2 col-md-offset-4" style="margin-bottom: 10px" value="Thanh toán" name="submit">
        </form>

<!-- /.row -->
<!-- /.container-fluid -->
