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
        <section class="info">
            <div class="container">
                <div class="row">
                    <div class="info__hero m-auto">
                        <div class="info__title">
                            Easy Way To Sell Digital Goods
                        </div>
                        <div class="info__description">
                            Buy premium scripts, app templates, themes and plugins and create amazing websites &
                            apps.
                        </div>
                        <div class="info__searchbox col-8 mt-4 d-md-flex">
                            <div class="col-md-6">
                                <input type="text" placeholder="Search your products..">
                            </div>
                            <div class="col-md-4">
                                <select>
                                    <?php
                                        foreach ($categories as $category)
                                        {
                                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input class="info__button" type="submit" value="Search Now">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="newest">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3 mb-2">
                        <h2><i class="bi bi-file-earmark-plus-fill color--blue"></i> Sản phẩm mới nhất</h2>
                    </div>

                    <?php
                        foreach ($newest_products as $item)
                        {
                            echo '
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="item__item">
                                        <div class="item__thumb">
                                            <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '"><img src="' . $item['thumb'] . '" class="item__thumbnail"></a>
                                        </div>
                                        <div class="item__info">
                                            <div class="item__title">
                                                <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '">' . substr($item['title'], 0, 29) . '</a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <ul class="item__star">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                </ul>
                                                <span class="item__cart"><i class="bi bi-bag-check"></i> 5</span>
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

                    <div class="col-12 text-center mb-3 <?php echo count($newest_products) > 8 ? '' : 'd-none' ?>">
                        <div class="btn btn-sm btn__theme p-2"><a style="color: white" href="<?php echo ROUTES['product'] ?>">Xem thêm sản phẩm mới</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3 mb-2">
                        <h2><i class="bi bi-lightning-fill color--red"></i> Sản phẩm phổ biến</h2>
                    </div>

                    <?php
                        foreach ($popular_products as $item)
                        {
                            echo '
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="item__item">
                                        <div class="item__thumb">
                                            <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '"><img src="' . $item['thumb'] . '" class="item__thumbnail"></a>
                                        </div>
                                        <div class="item__info">
                                            <div class="item__title">
                                                <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '">' . substr($item['title'], 0, 29) . '</a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <ul class="item__star">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                </ul>
                                                <span class="item__cart"><i class="bi bi-bag-check"></i> 5</span>
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

                    <div class="col-12 text-center mb-3 <?php echo count($newest_products) > 8 ? '' : 'd-none' ?>">
                        <div class="btn btn-sm btn__theme p-2"><a style="color: white" href="<?php echo ROUTES['product'] ?>">Xem thêm sản phẩm phổ biến</a></div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>