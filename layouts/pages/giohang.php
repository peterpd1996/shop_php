<h3 class="title-main" style="text-align: left;margin-bottom: 30px"><a href="#"> Giỏ hàng </a> </h3> 
<?php $sum = 0; ?>
            
      <?php if (!isset($_SESSION['idUser'])) {

          echo "<script>alert('Bần cần đăng nhập trước khi mua hàng');location.href = 'index.php?p=dangnhap' </script>";
          
      } ?>
    
     <?php if (isset($_SESSION['cart']))  {  
     
      ?>

        <table class="table table-hover" id="cart">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>TÊN</th>
                    <th>HÌNH ẢNH</th>
                    <th>SỐ LƯỢNG</th>
                    <th>TỔNG TIỀN</th>
                    <th>THAO TÁC</th>

                    
                </tr>
            </thead>
            <tbody >
               
                    
                <?php $stt = 1; foreach ($_SESSION['cart'] as $key => $item) { ?>
                        
                <tr>
                    
                    
                    <td style="vertical-align: middle;"><?php echo $stt ?></td>
                    <td style="vertical-align: middle;"><?php echo $item['name'] ?></td>
                    <td style="vertical-align: middle;"><img width="90px" height="90px" src="public/upload/product/<?php echo $item['img'] ?>" alt=""></td>
                    <td style="vertical-align: middle;">
                        
                        
                        <form method="POST">
                          <span style="display: flex;">
                          <input class="form-control sl_duong" style="width: 80px" min="1" type="number" value="<?php echo $item['number'] ?>" size ='20px' name = "number" id="duong_<?php echo $key  ?>" onchange="update(<?php echo $key ?>)" >
                          
                        </span>
                      
                        </form>



                    </td>
                    <td style="vertical-align: middle;"><?php echo format_number($item['price'] * $item['number']) ?></td>
                    <td style="vertical-align: middle;">
                        
                        <a href="deleteCart.php?id=<?php echo $key ?>" class="btn btn-danger">Xóa</a>
                    </td>
                    
                   
                </tr>
                 <?php $sum+=$item['price']*$item['number'];  $stt++; } ?>
                 <?php $_SESSION['sum'] = $sum; ?>
                 <tr>
                    <td colspan="6">
                          <div class="col-md-6 pull-right">
        <ul class="list-group">
            <li class="list-group-item"><h1>ĐƠN HÀNG</h1></li>
            <li class="list-group-item">10% thuế VAT</li>
            <li class="list-group-item">Tổng tiền: <?php echo format_number($sum) ?></li>
            <li class="list-group-item">
                <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
                <a href="index.php?p=thanhtoan" class="btn btn-primary">Thanh toán</a>
            </li>
        </ul>
        </div>
                    </td>
                 </tr>
            </tbody>
        </table>
        
      </div> 
      </div>
  <?php } else {
    echo "<p class = 'alert alert-warning'>Giỏ hàng bạn không có sản phẩm nào </p>;

            
                <a href='index.php' class='btn btn-primary'>Đi mua hàng</a>
           
            ";
        
  } ?>
  <script>

       function update(id){
  
          $(document).on("change",'#duong_'+id,function(){
          let sl = $(this).val();
         $.ajax({
          url:"updateSl.php",
          method:"POST",
          data:{id:id,sl:sl},
          success:function(){
            $("#cart").load("index.php?p=giohang #cart"); 
          }
        })
        })
  }
  </script>


<!-- /.row -->
<!-- /.container-fluid -->
