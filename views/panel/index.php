<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php include './common/css.php'; ?>
</head>

<body>

    <?php include './common/header.php'; ?>

    <main>
        <section class="panel">
            <div class="container-fluid d-lg-flex p-0">

                <?php include 'leftpanel.php' ?>
                
                <div class="col-12 col-lg-10 right-panel">
                    <div class="col-12 right-panel__form">
                        <form method="GET">
                            <div class="right-panel__search">
                                <div class="col-12 col-lg-6 my-search-box">
                                    <input type="text" class="my-search-box__input" name="q"
                                        placeholder="Tìm kiếm bằng từ khóa" />
                                    <div class="my-search-box__icon-wrapper">
                                        <span class="clear-search-btn me-1">
                                            <i class="bi bi-x-lg"></i>
                                        </span>
                                        <button class="search-btn d-flex align-items-center">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="right-panel__item">
                        <?php
                            foreach($products as $item) {
                                echo '
                                <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                                    <div class="item__item">
                                        <div class="item__thumb">
                                            <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '"><img src="' . $item['thumb'] . '" class="item__thumbnail"></a>
                                        </div>
                                        <div class="item__info">
                                            <div class="item__title">
                                                <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '">' . $item['title'] . '</a>
                                            </div>
                                            <div class="item__user">
                                                <img src="/images/defaults/cover.jpg" class="item__author">
                                                <a href="">NoNotMe</a>
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

                    <div class="right-panel__pager">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>