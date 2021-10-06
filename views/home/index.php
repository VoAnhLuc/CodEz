<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeZ.Shop - Coding is hard? Just buy it.</title>
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
                                    <option>PHP</option>
                                    <option>HTML/CSS</option>
                                    <option>Javascript</option>
                                    <option>Java</option>
                                    <option>Python</option>
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
                        <h2><i class="bi bi-file-earmark-plus-fill color--blue"></i> Newest Items</h2>
                    </div>

                    <?php
                        for($i=1;$i<9;$i++) {
                            echo '
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="item__item">
                                        <div class="item__thumb">
                                            <a href="index.php?controller=product&action=detail"><img src="./images/items/item-' . $i . '.jpg" class="item__thumbnail"></a>
                                        </div>
                                        <div class="item__info">
                                            <div class="item__title">
                                                <a href="index.php?controller=product&action=detail">Full Source Code Forum PHP...</a>
                                            </div>
                                            <div class="item__user">
                                                    <img src="./images/user-1.png" class="item__author">
                                                    <a href="">NoNotMe</a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <ul class="item__star">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                </ul>
                                                <span class="item__cart"><i class="bi bi-cart2"></i> 5</span>
                                            </div>
                                        </div>
                                        
                                        <div class="item__more d-flex justify-content-between">
                                            <div class="item__price">120 USD</div>
                                            <div class="item__category"><i class="bi bi-bookmarks"></i> PHP</div>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                    ?>

                    <div class="col-12 text-center mb-3">
                        <div class="btn btn-sm btn__theme p-2"><a style="color: white" href="index.php?controller=product">View More Newest Items</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3 mb-2">
                        <h2><i class="bi bi-lightning-fill color--red"></i> Popular Items</h2>
                    </div>

                    <?php
                        for($i=1;$i<9;$i++) {
                            echo '
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="item__item">
                                        <div class="item__thumb">
                                            <a href="index.php?controller=product&action=detail"><img src="./images/items/item-' . $i . '.jpg" class="item__thumbnail"></a>
                                        </div>
                                        <div class="item__info">
                                            <div class="item__title">
                                                <a href="index.php?controller=product&action=detail">Full Source Code Forum PHP...</a>
                                            </div>
                                            <div class="item__user">
                                                    <img src="./images/user-1.png" class="item__author">
                                                    <a href="">NoNotMe</a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <ul class="item__star">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                </ul>
                                                <span class="item__cart"><i class="bi bi-cart2"></i> 5</span>
                                            </div>
                                        </div>
                                        
                                        <div class="item__more d-flex justify-content-between">
                                            <div class="item__price">120 USD</div>
                                            <div class="item__category"><i class="bi bi-bookmarks"></i> PHP</div>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                    ?>

                    <div class="col-12 text-center mb-3">
                        <div class="btn btn-sm btn__theme p-2"><a style="color: white" href="index.php?controller=product">View More Popular Items</a></div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>