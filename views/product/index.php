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
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-bar filter--bar2 jplist-panel">
                            <div class="pull-left">
                                <div class="filter__option">
                                <form class="d-flex" method="post">
                                        <input name="productname" class="form-control me-2" type="text" placeholder="Nhập Tên Sản Phẩm"
                                            aria-label="Search">
                                        <button name="productsubmit" class="btn btn-sm btn__theme" type="submit">Tìm Kiếm</button>
                                </form>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select class="form-control">
                                            <option name="IPrice">Giá : Thấp đến Cao</option>
                                            <option name="DPrice">Giá : Cao đến thấp</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select class="form-control">
                                            <option>Phổ Biến</option>
                                            <option>Mới Nhất</option>
                                            <option>Miễn Phí</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="products section--padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <aside class="sidebar product--sidebar">
                            <div class="sidebar-card card--category">
                                <a class="card-title" href="#collapse1" role="button" data-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse1">
                                    <h4>
                                        Phân Loại
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>
                                <div class="collapsible-content collapse show" id="collapse1">
                                    <div class="jplist-panel">
                                        <div class="jplist-group" data-control-type="button-text-filter-group"
                                            data-control-action="filter" data-control-name="button-text-filter-group-1">
                                            <ul class="card-content">
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=1">HTML/CSS</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=2">Javascript</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=3">C#/.NET</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=4">Java</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=5">C/C++</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=6">Python</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=7">PHP & MySQL</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?controller=product&action=index&category_id=8">The Others</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-10 d-flex flex-wrap">
                        <div class="row">
                            <?php
                                echo (isset($notfound) ? '<i style="color:red;"> *' .$notfound. '</i>' : '');
                                foreach($productsearch->getItems() as $item) {
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
                            ?>
                            <div>
                                <?php 
                                    echo $productsearch->displayPager(ROUTES['product']);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>>
        </section>    
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>