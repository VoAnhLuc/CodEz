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
                        <form method="POST">
                            <div class="right-panel__search">
                                <div class="col-12 col-lg-6 my-search-box">
                                    <input type="text" class="my-search-box__input" name="q"
                                        value="<?php echo $keyword ?>"
                                        placeholder="Tìm kiếm bằng từ khóa" />
                                    <div class="my-search-box__icon-wrapper">
                                        <span onclick="clearSearchBox()" class="clear-search-btn me-1">
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
                            foreach($pagedResults->getItems() as $item) {
                                echo '
                                <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                                    <div class="item__item">
                                        <div class="panel__icon-product dropstart">
                                            <i class="bi bi-three-dots" id="dropdownProduct' . $item['id'] . '" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownProduct' . $item['id'] . '">
                                                <li><a href="' . ROUTES['product_edit'] . '&id=' . $item['id'] . '" class="dropdown-item" type="button">Sửa sản phẩm</a></li>
                                                <li><a href="' . ROUTES['product_delete'] . '&id=' . $item['id'] . '" class="dropdown-item" type="button">Xóa sản phẩm</a></li>
                                            </ul>
                                        </div>
                                        <div class="item__thumb">
                                            <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '"><img src="' . $item['thumb'] . '" class="item__thumbnail"></a>
                                        </div>
                                        <div class="item__info">
                                            <div class="item__title">
                                                <a href="' . ROUTES['product_detail'] . '&id=' . $item['id'] . '">' . $item['title'] . '</a>
                                            </div>
                                            <div class="item__user">
                                                <img src="' . $item['avatar'] . '" class="item__author">
                                                <a href="' . ROUTES['user'] . '&id=' . $item['user_id'] . '">' . $item['fullname'] . '</a>
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
                        <?php echo $pagedResults->displayPager(ROUTES['panel']) ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>