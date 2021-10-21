<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./lib/css/reset.css">
    <link rel="stylesheet" href="./lib/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
        <section class="sectionEmpty"></section>
        <section class="sectionCartOrdered">
            <div class="container orderedAndMethod">
                <div class="row">
                    <div class="col-md-6 col-sm-12 cart_order">
                        <div class="card">
                            <div class="card-header">
                                <h4>Order Summary</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                    foreach($products as $value) {
                                    echo '<div class="orderedItem">
                                            <a href="#">'.$value[0].'</a>
                                                <i class="itemPrice">'.$value[1].''." ".'INR</i>
                                            </div><hr/>
                                            ';
                                    $total = array_sum(array_column($products, 1));
                                }
                                    echo '<div class="orderedItem">
                                        <h4>Total<i class="itemPrice">'.$total.''." ".'INR</i></h4>
                                        </div>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 cart_order">
                        <div class="card">
                            <div class="card-header">
                                <h4>Select Payment Method</h4>
                            </div>
                            <div class="card-body">
                                <div class="orderedItem">
                                    <p>
                                        <input class="form-check-input" type="radio" name="typeOfPayment"> 
                                        <i class="itemPrice"><img src="./images/paypal.png" alt="Paypal"></i>
                                        Paypal
                                    </p>
                                </div><hr class="hrClass1"/>
                                <div class="orderedItem">
                                    <p><input class="form-check-input" type="radio" name="typeOfPayment"> <i class="itemPrice"><img src="./images/wallet.png" alt="Wallet"></i>
                                        Wallet
                                    </p><hr class="hrClass2"/>
                                </div>
                                
                                <div class="btn btn-danger buttonBack"><a href="index.php?controller=payment&action=cart"  style="color:white"><h6>Back</h6></a></div>  
                                <div class="btn btn-success buttonConfirm"><h6>Confirm Order</h6></div>                                  
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