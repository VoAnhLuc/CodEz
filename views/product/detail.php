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
    <meta property="og:title" content="<?php echo $product['title'] ?>"/>
    <meta property="og:image" content="<?php echo $product['thumb'] ?>"/>
    <meta property="og:description" content="<?php echo $product['description'] ?>"/>
    <meta property="og:url" content="<?php echo Func::getURL() ?>" />
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
                                <div class="card-footer">
                                    <button type="button" class="bi bi-share"> Share With :</button>
                                    <a class="bi bi-facebook me-2"
                                        href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Func::getURL() ?>"
                                        target="_blank"> Facebook</a>
                                    <a class="bi bi-linkedin me-2"
                                        href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo Func::getURL() ?>"
                                        target="_blank"> Linkedin</a>
                                    <a class="bi bi-reddit me-2"
                                        href="http://www.reddit.com/submit?url=<?php echo Func::getURL() ?>"
                                        target="_blank"> Reddit</a>
                                    <a class="bi bi-twitter"
                                        href="https://twitter.com/intent/tweet?url=<?php echo Func::getURL() ?>"
                                        target="_blank"> Twitter</a>
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
                                    <button class="btn btn-primary btn" name="addproducttocart" id="addproducttocart"><i class="bi bi-cart-check-fill"> Add To Carts</i></button>
                                </div>
                            </div>
                            <div class="card author mt-4">
                                <div class="card-header">
                                    Author Information
                                </div>
                                <div class="card-body">
                                    <p><img src="<?php echo $product['avatar'] ?>" alt=""></p>
                                    <p>Member Since 2021</p>
                                    <p class="bi bi-person-circle"> <?php echo $product['fullname'] ?></p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary"><a href="<?php echo ROUTES['user'] . '&id=' . $product['user_id'] ?>"><i class="bi bi-binoculars-fill"> View Profile</i></a></button>
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
                                    <div class="yeuthich"><i class="bi bi-heart"> Views </i><i class="conso"><?php echo $product['views'] ?></i>  </div>
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
                                <div class="card-body">
                                    <div class="inf"><i class="bi bi-bookmarks"></i> Category: <?php echo $product['name'] ?></div>        
                                    <div class="inf"><i class="bi bi-clock"></i> Released: <?php echo date('d/m/Y', $product['released']) ?></div>
                                    <div class="inf"><i class="bi bi-clock-history"></i> Updated: <?php echo date('d/m/Y', $product['updated']) ?></div>          
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
                                    <?php
                                        foreach($related_products as $item)
                                        {
                                            echo '
                                                <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                                    <div class="card cardfooter">
                                                        <div class="card-img">
                                                            <a href="' . ROUTES['product_detail'] . '&id=' . $product['id'] . '">
                                                                <img id="anhsanpham" src="' . $item['thumb'] . '" alt="" width="100%">
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <a href="' . ROUTES['product_detail'] . '&id=' . $product['id'] . '">
                                                                <b>' . $item['title'] . '</b>
                                                            </a><br>
                                                            <i class="bi bi-journals"> ' . $product['name'] . '</i>
                                                        </div>
                                                        <div class="card-footer">
                                                            <i>' . $item['price'] . '</i>
                                                            <i class="bi bi-heart biok"> 3</i>
                                                            <i class="bi bi-star-fill bistar"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star"></i>
                                                            <i class="bi bi-cart-check bibuy"> 5</i>
                                                        </div>
                                                    </div>  
                                                </div>';
                                        }
                                    ?>
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