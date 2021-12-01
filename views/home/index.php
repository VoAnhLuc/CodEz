<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <meta itemprop="image" content="<?php echo Func::getCurrentURL(false) . '/images/logo.jpg' ?>">
    <?php include './common/css.php'; ?>
</head>

<body>
    
    <?php include './common/header.php'; ?>

    <main>
        <section class="info">
            <div class="container">
                <div class="row">
                    <div class="info__hero m-auto">
                        <div class="info__title">
                            Khó Khăn Trong Việc Code? Hãy Mua Nó!
                        </div>
                        <div class="info__description">
                            CodEz cung cấp dịch vu mua và bán mã nguồn, hoàn toàn miễn phí để sử dụng.
                        </div>
                        <form method="GET" action="<?php echo ROUTES['product'] ?>">
                            <input type="hidden" name="controller" value="product" />
                            <div class="info__searchbox col-8 mt-4 d-md-flex">
                                <div class="col-md-6">
                                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm...">
                                </div>
                                <div class="col-md-4">
                                    <select name="category">
                                        <?php
                                            foreach ($categories as $category)
                                            {
                                                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input class="info__button" type="submit" value="Tìm ngay">
                                </div>
                            </div>
                        </form>
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
                        if (count($newest_products) == 0)
                        {
                            echo '<div class="alert alert-light">Chưa có sản phẩm nào được đăng bán.</div>';
                        }
                        foreach ($newest_products as $item)
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

                    <div class="col-12 text-center mb-3 <?php echo count($newest_products) == 8 ? '' : 'd-none' ?>">
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
                        if (count($newest_products) == 0)
                        {
                            echo '<div class="alert alert-light">Chưa có sản phẩm nào được đăng bán.</div>';
                        }
                        foreach ($popular_products as $item)
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

                    <div class="col-12 text-center mb-3 <?php echo count($newest_products) == 8 ? '' : 'd-none' ?>">
                        <div class="btn btn-sm btn__theme p-2"><a style="color: white" href="<?php echo ROUTES['product'] ?>">Xem thêm sản phẩm phổ biến</a></div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>