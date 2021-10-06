<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
        <?php include './common/breadcrumb.php'; ?>
        <section class="filter-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-bar filter--bar2 jplist-panel">
                            <div class="pull-left">
                                <div class="filter__option">
                                    <form class="d-flex">
                                        <input class="form-control me-2" type="text" placeholder="Press something..."
                                            aria-label="Search">
                                        <button class="btn btn-sm btn__theme" type="submit">Find</button>
                                    </form>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select class="form-control">
                                            <option>Price : Low to High</option>
                                            <option>Price : High to low</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select class="form-control">
                                            <option>Popular Items</option>
                                            <option>New Items</option>
                                            <option>Free Items</option>
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
                                        Item Type
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>
                                <div class="collapsible-content collapse show" id="collapse1">
                                    <div class="jplist-panel">
                                        <div class="jplist-group" data-control-type="button-text-filter-group"
                                            data-control-action="filter" data-control-name="button-text-filter-group-1">
                                            <ul class="card-content">
                                                <li>
                                                    <a href="#">PHP</a>
                                                </li>
                                                <li>
                                                    <a href="#">C#</a>
                                                </li>
                                                <li>
                                                    <a href="#">HTML/CSS</a>
                                                </li>
                                                <li>
                                                    <a href="#">Javascript</a>
                                                </li>
                                                <li>
                                                    <a href="#">Java</a>
                                                </li>
                                                <li>
                                                    <a href="#">Python</a>
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
                                for($i=1;$i<9;$i++) {
                                    echo '
                                        <div class="col-md-4 col-sm-6">
                                            <div class="item__item">
                                                <div class="item__thumb">
                                                    <a href="index.php?controller=product&action=detail"><img src="./images/items/item-' . $i . '.jpg" class="item__thumbnail"></a>
                                                </div>
                                                <div class="item__info">
                                                    <div class="item__title">
                                                        <a href="detail.php">Full Source Code Forum PHP...</a>
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
                            <nav class="mt-4" aria-label="Page navigation sample">
                                <ul class="pagination" style="justify-content:end">
                                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>>
        </section>    
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>