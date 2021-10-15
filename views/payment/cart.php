<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./lib/css/reset.css">
    <link rel="stylesheet" href="./lib/css/style.css">
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <link rel="stylesheet" href="./lib/css/responsive.css">
    <link rel="stylesheet" href="./lib/css/common.css">
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
                <div class="col-md-3 d-none d-md-block special"><h4>Product Items</h4></div>
                <div class="col-md-5 d-none d-md-block special"><h4>Price</h4></div>
                <div class="col-md-4 d-none d-md-block special"><h4>Remove</h4></div>
            </div>
            <?php
                $total_money = 0;
                foreach($carts as $item){
                    $total_money += $item['price'];
                    echo '
                        <div class="row">
                            <div class="col-md-12 col-sm-12 information">
                                <div class=" col-md-3 col-sm-6 v_middle">
                                    <div class="product_description">
                                        <a href="index.php?controller=product">
                                            <img src="' . $item['thumb'] . '" alt="Image" class="cart-thumb" style="width : 100px ; height : 100px;">
                                        </a>
                                        <div class="short_desc">
                                            <a href="' . ROUTES['product_detail'] . '&id=' . $item['product_id'] . '">
                                                ' . $item['title'] . '
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-3 v_middle d-flex">
                                    <div class="col-md-4 col-sm-4"></div>
                                    <div class="item_price1 col-md-4 col-sm-4">
                                        <div class="item_price">
                                            <p>' . $item['price'] . ' VND</p>  
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-2"></div>
                                </div>
                                <div class="col-md-4 col-sm-1 v_middle">
                                        <div class="item_action">     
                                            <button>
                                            <p class="bi bi-trash"></p>
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                        ';
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
                                    <button type="submit" class="btn btn-primary">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-0"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 thanhtoan">
                    <div class="cart-subtotal">
                        <p><span>Cart Subtotal:</span><?php echo $total_money ?></p>
                   </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-0"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 thanhtoan">
                    <div class="cart-subtotal">
                        <p><span>Total:</span><?php echo $total_money ?></p>
                   </div>
                   <div class="cart-subtotalspecial">
                    <button type="submit" class="btn btn-success"><a style="color:white"  href="index.php?controller=payment&action=checkout">Proceed To Checkout</a></button>
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