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
        <section class="sectionEmpty"></section>
        <section class="sectionCartOrdered">
            <div class="container orderedAndMethod">
                <div class="row">
                    <div class="col-md-6 col-sm-12 cart_order">
                        <div class="card">
                            <div class="card-header">
                                <h4>Đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                    foreach($carts as $item) {
                                    echo '<div class="row orderedItem">
                                            <div class="col-9"><a href="' . ROUTES['product_detail'] . '&id=' . $item['product_id'] . '">'.$item['title'].'</a></div>
                                            <div class="col-3"><i class="itemPrice">' . Func::getDotPrice($item['price']) . ' VND</i></div>
                                            </div><hr/>
                                            ';
                                    }
                                    $total = count($carts) > 0 ? array_sum(array_column($carts, 'price')) : 0;
                                    echo '<div class="orderedItem">
                                        <h4>Tổng tiền <i class="itemPrice">' . Func::getDotPrice($total) . ' VND</i></h4>
                                        </div>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 cart_order">
                        <div class="card">
                            <div class="card-header">
                                <h4>Chọn phương thức thanh toán</h4>
                            </div>
                            <div class="card-body">
                                <div class="orderedItem">
                                    <p>
                                        <input class="form-check-input" type="radio" name="typeOfPayment" value="paypal" disabled> 
                                        <i class="itemPrice"><img src="./images/paypal.png" alt="Paypal"></i>
                                        Paypal
                                    </p>
                                </div><hr class="hrClass1"/>
                                <div class="orderedItem">
                                    <p><input class="form-check-input" type="radio" name="typeOfPayment" value="money" checked> <i class="itemPrice"><img src="./images/wallet.png" alt="Wallet"></i>
                                        Ví tiền hệ thống
                                    </p><hr class="hrClass2"/>
                                </div>
                                <form method="post">
                                    <a class="btn btn-danger buttonBack" href="<?php echo ROUTES['payment'] ?>"  style="color:white">Quay lại</a>
                                    <button type="submit" name="confirmOrder" class="btn btn-success buttonConfirm">Thanh toán</button>    
                                </form>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>