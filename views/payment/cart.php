<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php include './common/css.php'; ?>
</head>

<body>

    <?php include './common/header.php'; ?>

    <main>  
        <?php
            include './common/breadcrumb.php';
        ?>
        
        <section class="sect2"></section>
        <section class="sect3">
        <div class="container container1">
            <div class="row totalInfo">
                <div class="col-md-4 d-none d-md-block special"><h4>Sản Phẩm</h4></div>
                <div class="col-md-4 d-none d-md-block special"><h4>Đơn Giá</h4></div>
                <div class="col-md-4 d-none d-md-block special"><h4>Xóa</h4></div>
            </div>
            <?php
                    $total_money = 0;
                    if ($carts != null)
                    {
                        foreach($carts as $key => $item){
                            $total_money += $item['price'];
                            $delete_id = Func::isLogged() ? $item['id'] : $key;
                            echo '
                                <div class="row">
                                    <div class="information">
                                        <div class="col-md-4 col-8 v_middle">
                                            <div class="product_description d-flex align-items-center">
                                                <a href="' . ROUTES['product_detail'] . '&id=' . $item['product_id'] . '">
                                                    <img src="' . $item['thumb'] . '" alt="Image" class="item__thumbnail" style="width : 100px ; height : 100px;">
                                                </a>
                                                <div class="short_desc">
                                                    <a href="' . ROUTES['product_detail'] . '&id=' . $item['product_id'] . '">
                                                        ' . $item['title'] . '
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-3 v_middle d-flex justify-content-center">
                                            <div class="item_price p-2">
                                                <p>' . Func::getDotPrice($item['price']) . ' VND</p>  
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-1 v_middle">
                                                <div class="item_action">                          
                                                    <a href="' . ROUTES['payment_delete'] . '&id=' . $delete_id . '">
                                                    <p class="bi bi-trash"></p>
                                                    </a>                                     
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                    }
                ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-0"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 thanhtoan">
                        <div class="cart-subtotal">
                            <div class="coupon-block">
                                <div>
                                    <input type="text" class="form-control" id="coupon" name="coupon" value="" required="">
                                    
                                </div>    
                                
                                <div>
                                    <button type="submit" class="btn btn-primary">Áp Dụng Giảm Giá</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-0"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 thanhtoan">
                    <div class="cart-subtotal">
                        <p><span>Tổng phụ giỏ hàng:</span><?php echo Func::getDotPrice($total_money) ?> VND</p>
                   </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-0"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 thanhtoan">
                    <div class="cart-subtotal">
                        <p><span>Tổng Tiền:</span><?php echo  Func::getDotPrice($total_money)  ?> VND</p>
                    </div>
                    <div class="cart-subtotalspecial">
                        <?php
                            echo Func::isLogged()
                                ? '<a class="btn btn-success" style="color:white"  href="' . ROUTES['payment_checkout'] . '">Tiến Hành Thanh Toán</a>'
                                : '<a class="btn btn-danger" style="color:white"  href="' . ROUTES['user_login'] . '">Đăng nhập để thanh toán</a>'
                        ?>
                    </div>
                </div>
            </div>
            
          
        </div>
      </section>
      <section class="sect2"></section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>