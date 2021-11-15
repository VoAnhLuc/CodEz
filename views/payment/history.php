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

        <section class="history">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 mt-4">
                        <div class="content__list">
                            <div class="content__title">
                                <i class="bi bi-cart-check"></i>
                                Lịch Sử Mua Hàng
                            </div>
                            <div class="content__body">
                                <?php
                                    foreach ($carts as $item)
                                    {
                                        echo '<div class="content__item d-flex">
                                                <div class="col-6 m-auto">
                                                    <i class="bi bi-award color--green"></i>
                                                    <a href="' . ROUTES['product_detail'] . '&id=' . $item['product_id'] . '">' . $item['title'] . '</a>
                                                </div>
                                                <div class="col-3 d-none d-lg-block text-center m-auto color--instagram">
                                                    <i class="bi bi-cash"></i> ' . Func::getDotPrice($item['price']) . ' VND
                                                </div>
                                                <div class="col-auto color--star m-auto cursor--pointer">';
                                              
                                        for($i = 1; $i <= 5; $i++)
                                        {
                                            echo '<a href="' . ROUTES['payment_rating'] . '&id=' . $item['id'] . '&rating=' . $i . '">
                                                    <i class="bi bi-star' . ($i <= $item['rate'] ? '-fill' : '') . '"></i>
                                                    </a>';
                                        }
                                        
                                        echo '</div>
                                                    <div class="col-1 m-auto item__download">
                                                        <a href="' . $item['link_code'] . '">
                                                            <i class="bi bi-cloud-arrow-down"></i>
                                                        </a>
                                                    </div>';
                                        echo '</div>';
                                    }
                                ?>
                                
                                <?php echo $pageInfo->displayPager(ROUTES['payment_history']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-4">
                        <div class="content__list">
                            <div class="content__title">
                                <i class="bi bi-bar-chart-line-fill"></i>
                                Thống Kê
                            </div>
                            <div class="content__body">
                                <div class="content__item">
                                    <p><i class="bi bi-piggy-bank color--instagram"></i> Tổng tiền đã tiêu: <b class="color--instagram"><?php echo Func::getDotPrice($totalPrices) ?> VNĐ</b></p>
                                    <p><i class="bi bi-file-earmark-code color--green"></i> Tổng sản phẩm đã mua: <b class="color--green"><?php echo $pageInfo->getTotalItems() ?> sản phẩm</b></p>
                                </div>
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