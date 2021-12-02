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
        <?php include './common/breadcrumb.php'; ?>
        <section class="filter-area">
            <div class="container">
                <form class="row justify-content-between" method="GET">
                    <input type="hidden" name="controller" value="product"/>
                    <input type="hidden" name="category" value="<?php echo $params['category'] ?>"/>
                    <div class="col-12 col-md-6 d-flex p-3">
                        <input style="width: 50%" class="form-control me-3" type="text" name="keyword"
                            value="<?php echo $params['keyword'] ?>"    
                            placeholder="Tìm kiếm theo tên..."/>
                        <button class="btn btn__theme" type="submit">Tìm kiếm</button>
                    </div>
                    <div class="col-12 col-md-4 d-flex p-3">
                        <select class="form-select me-3" name="order_price">
                            <option value="1" <?php echo $params['order_price'] == 1 ? "selected" : "" ?>>Giá tăng dần</option>
                            <option value="2" <?php echo $params['order_price'] == 2 ? "selected" : "" ?>>Giá giảm dần</option>
                        </select>
                        <select class="form-select" name="order_type">
                            <option value="0" <?php echo $params['order_type'] == 0 ? "selected" : "" ?>>Mới nhất</option>
                            <option value="1" <?php echo $params['order_type'] == 1 ? "selected" : "" ?>>Phổ biến nhất</option>
                            <option value="2" <?php echo $params['order_type'] == 2 ? "selected" : "" ?>>Miễn phí</option>
                        </select>
                    </div>
                </form>
            </div>
        </section>
        <section class="products section--padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <aside class="sidebar product--sidebar">
                            <div class="sidebar-card card--category">
                                <div class="card-title">
                                    <h4>Phân Loại</h4>
                                </div>
                                <div class="collapsible-content">
                                    <ul class="card-content">
                                        <?php
                                            foreach ($categories as $cat) 
                                            {
                                                echo '<li><a href="' . ROUTES['product'] . '&category=' . $cat['id'] . '">' . $cat['name'] . '</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-10 d-flex justify-content-center flex-wrap">
                        <div class="row" style="width: 100%;">
                            <?php
                                foreach($products->getItems() as $item) {
                                    echo '
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
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

                                if ($products->getTotalItems() == 0)
                                {
                                    echo '<div class="p-4 text-center color--instagram"><h3>Chưa có sản phẩm nào.</h3></div>';
                                }
                            ?>
                            <div>
                                <?php 
                                    echo $products->displayPager(ROUTES['product'] . $params['url']);
                                ?>
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