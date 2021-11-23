<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $product['description'] ?>">
    <meta itemprop="name" content="<?php echo $product['title'] ?>">
    <meta itemprop="description" content="<?php echo $product['description'] ?>">
    <meta itemprop="image" content="<?php echo Func::getCurrentURL(false) . '/' . $product['thumb'] ?>">
    <meta property="og:title" content="<?php echo $product['title'] ?>"/>
    <meta property="og:image" content="<?php echo Func::getCurrentURL(false) . '/' . $product['thumb'] ?>"/>
    <meta property="og:description" content="<?php echo $product['description'] ?>"/>
    <meta property="og:url" content="<?php echo Func::getCurrentURL() ?>" />
    <?php include './common/css.php'; ?>
</head>

<body>

    <?php include './common/header.php'; ?>

    <main>
        <div class="toanbo">
            
            <?php
                include './common/breadcrumb.php';
            ?>
            <section>
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-lg-8 col-md-12 col-sm-12 mt-3">
                            <div class="card card1">
                                <div class="card-img">
                                    <img id="anhsanpham" src="<?php echo $product['thumb'] ?>" alt="" width="100%">  
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <div>
                                        <button type="button" class="bi bi-share"> Chia sẻ :</button>
                                        <a class="bi bi-facebook me-2"
                                            href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Func::getCurrentURL() ?>"
                                            target="_blank"> Facebook</a>
                                        <a class="bi bi-linkedin me-2"
                                            href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo Func::getCurrentURL() ?>"
                                            target="_blank"> Linkedin</a>
                                        <a class="bi bi-reddit me-2"
                                            href="http://www.reddit.com/submit?url=<?php echo Func::getCurrentURL() ?>"
                                            target="_blank"> Reddit</a>
                                        <a class="bi bi-twitter"
                                            href="https://twitter.com/intent/tweet?url=<?php echo Func::getCurrentURL() ?>"
                                            target="_blank"> Twitter</a>
                                    </div>
                                    
                                    <?php if (Func::isLogged() && $_SESSION['user_id'] == $product['user_id']) { ?>
                                    <div>
                                        <a href="<?php echo ROUTES['product_edit'] . '&id=' . $product['id'] ?>" class="btn btn-warning">Chỉnh sửa</a>
                                        <a href="<?php echo ROUTES['product_delete'] . '&id=' . $product['id'] ?>" class="btn btn-danger">Xóa</a>
                                    </div>
                                    <?php } ?>
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
                                <div class="alert alert-success text-center">
                                    <i><?php echo Func::getDotPrice($product['price']) ?> VND</i>
                                </div>
                                <div class="card-footer rightfooter" >
                                    <a href="<?php echo ROUTES['payment_add'].'&id='.$product['id'] ?>" class="btn btn__theme">
                                        <i class="bi bi-cart-check-fill"> Thêm vào giỏ hàng</i>
                                    </a>
                                </div>
                            </div>
                            <div class="card author mt-4">
                                <div class="card-header">
                                    Thông tin người bán
                                </div>
                                <div class="card-body">
                                    <p><img src="<?php echo $product['avatar'] ?>" alt=""></p>
                                    <p>Tham gia từ tháng <?php echo date('m, Y', $product['join_time']) ?></p>
                                    <p class="bi bi-person-circle"> <?php echo $product['fullname'] ?></p>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn__theme" href="<?php echo ROUTES['user'] . '&id=' . $product['user_id'] ?>"><i class="bi bi-binoculars-fill"> Xem hồ sơ</i></a></button>
                                </div>
                            </div>
                            <div class="card danhgia mt-3">
                                <div class="card-body">
                                    <div class="yeuthich text-center">
                                        <?php echo Func::displayStars($product['rating'] != 0 ? $product['rating']/$product['bought'] : 5) ?>
                                        <i> (<?php echo $product['bought'] ?> đánh giá) </i>
                                    </div>
                                    <div class="yeuthich"><i class="bi bi-cart2"> Đã bán </i><i class="conso"><?php echo $product['bought'] ?></i></div>
                                    <div class="yeuthich"><i class="bi bi-heart"> Lượt xem </i><i class="conso"><?php echo $product['views'] ?></i></div>
                                    <div class="yeuthich"><i class="bi bi-bookmarks"></i> Thư mục: <?php echo $product['name'] ?></div>        
                                    <div class="yeuthich"><i class="bi bi-clock"></i> Đăng ngày: <?php echo date('d/m/Y', $product['released']) ?></div>
                                    <div class="yeuthich"><i class="bi bi-clock-history"></i> Chỉnh sửa: <?php echo date('d/m/Y', $product['updated']) ?></div>      
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-area" >
                <!-- phan2 -->
                    <div class="container-fluid mt-4">
                        <div class="related_items">
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="text-center">
                                        <h2>Sản Phẩm Liên Quan</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                        foreach($related_products as $item)
                                        {
                                            echo '
                                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                                    <div class="item__item">
                                                        <div class="item__thumb">
                                                            <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '"><img src="' . $item['thumb'] . '" class="item__thumbnail"></a>
                                                        </div>
                                                        <div class="item__info">
                                                            <div class="item__title">
                                                                <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '">' . $item['title'] . '</a>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="item__star">
                                                                    ' . Func::displayStars($item['rating'] != 0 ? $item['rating']/$item['bought'] : 5) . '
                                                                </span>
                                                                <span class="item__cart"><i class="bi bi-bag-check"></i> ' . $item['bought'] . '</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="item__more d-flex justify-content-between">
                                                            <div class="item__price">' . Func::getShortPrice($item['price']) . '</div>
                                                            <div class="item__category">
                                                                <a href="' . ROUTES['product'] . '&category=' . $item['category_id'] . '">
                                                                    <i class="bi bi-bookmarks"></i> ' . $item['name'] . '
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    ?>
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