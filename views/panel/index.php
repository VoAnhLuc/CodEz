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
                        <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                            <div class="item__item">
                                <div class="item__thumb">
                                    <a href="index.php?controller=product&amp;action=detail"><img
                                            src="/images/defaults/cover.jpg" class="item__thumbnail"></a>
                                </div>
                                <div class="item__info">
                                    <div class="item__title">
                                        <a href="detail.php">Full Source Code Forum PHP...</a>
                                    </div>
                                    <div class="item__user">
                                        <img src="/images/defaults/cover.jpg" class="item__author">
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
                        <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                            <div class="item__item">
                                <div class="item__thumb">
                                    <a href="index.php?controller=product&amp;action=detail"><img
                                            src="/images/defaults/cover.jpg" class="item__thumbnail"></a>
                                </div>
                                <div class="item__info">
                                    <div class="item__title">
                                        <a href="detail.php">Full Source Code Forum PHP...</a>
                                    </div>
                                    <div class="item__user">
                                        <img src="/images/defaults/cover.jpg" class="item__author">
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
                        <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                            <div class="item__item">
                                <div class="item__thumb">
                                    <a href="index.php?controller=product&amp;action=detail"><img
                                            src="/images/defaults/cover.jpg" class="item__thumbnail"></a>
                                </div>
                                <div class="item__info">
                                    <div class="item__title">
                                        <a href="detail.php">Full Source Code Forum PHP...</a>
                                    </div>
                                    <div class="item__user">
                                        <img src="/images/defaults/cover.jpg" class="item__author">
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
                        <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                            <div class="item__item">
                                <div class="item__thumb">
                                    <a href="index.php?controller=product&amp;action=detail"><img
                                            src="/images/defaults/cover.jpg" class="item__thumbnail"></a>
                                </div>
                                <div class="item__info">
                                    <div class="item__title">
                                        <a href="detail.php">Full Source Code Forum PHP...</a>
                                    </div>
                                    <div class="item__user">
                                        <img src="/images/defaults/cover.jpg" class="item__author">
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
                        <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                            <div class="item__item">
                                <div class="item__thumb">
                                    <a href="index.php?controller=product&amp;action=detail"><img
                                            src="/images/defaults/cover.jpg" class="item__thumbnail"></a>
                                </div>
                                <div class="item__info">
                                    <div class="item__title">
                                        <a href="detail.php">Full Source Code Forum PHP...</a>
                                    </div>
                                    <div class="item__user">
                                        <img src="/images/defaults/cover.jpg" class="item__author">
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
                        <div class="col-lg-3 col-md-4 col-12 p-3 pt-0">
                            <div class="item__item">
                                <div class="item__thumb">
                                    <a href="index.php?controller=product&amp;action=detail"><img
                                            src="/images/defaults/cover.jpg" class="item__thumbnail"></a>
                                </div>
                                <div class="item__info">
                                    <div class="item__title">
                                        <a href="detail.php">Full Source Code Forum PHP...</a>
                                    </div>
                                    <div class="item__user">
                                        <img src="/images/defaults/cover.jpg" class="item__author">
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