<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
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
        <div class="toanbo">
            
            <?php
                include './common/breadcrumb.php';
            ?>
            <form action="<?php echo ROUTES['payment_add'].'&id='.$product['id'] ?>" method="post" >
            <section>
                <div class="container">
                    <div class="row mt-4">
                            <div class="col-lg-8 col-md-12 col-sm-12 mt-3">
                                <div class="card card1">
                                    <div class="card-img">
                                        <img id="anhsanpham" src="<?php echo $product['thumb'] ?>" alt="" width="100%">  
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-primary nutnhan"><i class="bi bi-heart"></i> Add To Favorites</button>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="bi bi-share"> Share With :</button>
                                        <button type="button" class="bi bi-facebook"> Facebook</button>
                                        <button type="button" class="bi bi-instagram"> Instagram</button>
                                        <button type="button" class="bi bi-linkedin"> Linkedin</button>
                                        <button type="button" class="bi bi-reddit" > Reddit</button>
                                        <button type="button" class="bi bi-twitter"> Twitter</button>
                                    </div>
                                </div>  
                                <div class="card cardcontent mt-4">    
                                    <div class="card-body gioithieusp mt-4">
                                        <h2><?php echo $product['title'] ?></h2>
                                        <?php echo htmlspecialchars_decode($product['content']) ?>
                                    </div>

                                </div>                
                            </div>
                        
                            <div class="col-lg-4 col-md-12 col-sm-12 mt-3">
                                <div class="card cardright">
                                    <div class="alert alert-success">
                                        <i>Prices : <?php echo $product['price'] ?> VND</i>
                                    </div>
                                    <div class="card-footer rightfooter" >
                                        <button class="btn btn-primary btn" name="addproducttocart" id="addproducttocart"><i class="bi bi-cart-check-fill"> Add To Cart</i></button>
                                    </div>
                                </div>
                                <div class="card author mt-4">
                                    <div class="card-header">
                                        <i>Author Information</i>
                                    </div>
                                    <div class="card-body">
                                        <img src="./images/logo.png" alt=""><br>
                                        <div class="member"><i>Member Since 2021</i><br></div>
                                        <div class="member">
                                            <i class="bi bi-person-circle"> Hoàng </i>
                                            <i class="bi bi-person-circle"> Hoài </i>
                                            <i class="bi bi-person-circle"> Lực </i>
                                            <i class="bi bi-person-circle"> Hùng </i>
                                            <i class="bi bi-person-circle"> Thắng </i>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary"><i class="bi bi-binoculars-fill"> View Profile</i></button>
                                    </div>
                                </div>
                                <div class="card danhgia mt-3">
                                    <div class="card-body">
                                        <div class="yeuthich text-center">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i> ( 5 Ratings ) </i>
                                        </div>
                                        <div class="yeuthich"><i class="bi bi-cart2"> Total Sales </i><i class="conso">5</i></div>
                                        <div class="yeuthich"><i class="bi bi-heart"> Favourites </i><i class="conso">4</i>  </div>
                                        <div class="yeuthich"><i class="bi bi-heart"> Comments</i><i class="conso">3</i></div>
                                    </div>
                                </div>
                                <div class="card infitem mt-3">
                                    <div class="card-header">
                                        <i>Item Infomation</i>
                                    </div>
                                    <div class="card-body">
                                        <div class="inf"><b>Category:</b> <?php echo $category ?></div>        
                                        <div class="inf"><b>Released:</b> <?php echo date('d/m/Y', $product['released']) ?></div>
                                        <div class="inf"><b>Updated:</b> <?php echo date('d/m/Y', $product['released']) ?></div>          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
                <section class="breadcrumb-area" >
                <!-- phan2 -->
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 abcd">
                            <div class="container mt-4  moreitem">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h2>More Related Items</h4>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                        <div class="card cardfooter">
                                            <div class="card-img">
                                                <img id="anhsanpham" src="./images/anhcode.jpg" alt="" width="100%">  
                                            </div>
                                            <div class="card-body">
                                                    <b>Digital Visiting Card Maker PHP Script</b><br>
                                                    <i class="bi bi-journals">Script</i>
                                            </div>                           
                                            <div class="card-footer">
                                            <i>400$</i>
                                            <i class="bi bi-heart biok" > 3</i>
                                            <i class="bi bi-star-fill bistar"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-cart-check bibuy"> 3</i>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                        <div class="card cardfooter">
                                            <div class="card-img">
                                                <img id="anhsanpham" src="./images/anhcode.jpg" alt="" width="100%">  
                                            </div>
                                            <div class="card-body">
                                                <b>URL CYTE URL Shorter : Logger-Url-Tracker</b><br>
                                                <i class="bi bi-journals">Script</i>
                                            </div>
                                            <div class="card-footer">
                                                <i>500$</i>
                                                <i class="bi bi-heart biok"> 3</i>
                                                <i class="bi bi-star-fill bistar"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-cart-check bibuy"> 5</i>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                        <div class="card cardfooter">
                                            <div class="card-img">
                                                <img id="anhsanpham" src="./images/anhcode.jpg" alt="" width="100%">  
                                            </div>
                                            <div class="card-body">
                                                <b>WILL VPN App - VPN App With Admin Panel</b> <br>
                                                <i class="bi bi-journals">Script</i> 
                                            </div>
                                            <div class="card-footer">
                                                <i>600$</i>
                                                <i class="bi bi-heart biok"> 5</i>
                                                <i class="bi bi-star-fill bistar"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-cart-check bibuy"> 6</i>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>