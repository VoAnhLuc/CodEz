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
                                    for($i = 1; $i <= 5; $i++)
                                    {
                                        $defaultRank = rand(1, 5);
                                        echo '<div class="content__item d-flex">
                                                <div class="col-6 m-auto">
                                                    <i class="bi bi-award color--green"></i>
                                                    <a href="">MySQL Insert Multiple Rows</a>
                                                </div>
                                                <div class="col-3 d-none d-lg-block m-auto color--instagram">
                                                    <i class="bi bi-cash"></i> 123.000.000
                                                </div>
                                                <div class="col-auto d-flex color--star cursor--pointer">';
                                              
                                        echo '<span id="star-' . $i . '" onmouseout="resetStarColor(\'star-' . $i . '\', ' . $defaultRank . ')">';
                                        for($j = 1; $j <= 5; $j++)
                                        {
                                            echo '<span id="star-' . $i . '-' . $j . '" onmouseover="changeStarColor(\'star-' . $i . '\', ' . $j . ')">
                                                    <i class="bi bi-star' . ($j <= $defaultRank ? '-fill' : '') . '"></i>
                                                    </span>';
                                        }
                                        echo '</span>';

                                        echo '</div>
                                                    <div class="col-1 m-auto item__download">
                                                        <a href="">
                                                            <i class="bi bi-cloud-arrow-down"></i>
                                                        </a>
                                                    </div>';
                                        echo '</div>';
                                    }
                                ?>
                                
                                <nav class="mt-5 d-flex justify-content-center" aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item active">
                                        <span class="page-link">
                                          2
                                        </span>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav>
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
                                    <p><i class="bi bi-piggy-bank color--instagram"></i> Tổng tiền đã tiêu: <b class="color--instagram">434.563.000 VNĐ</b></p>
                                    <p><i class="bi bi-file-earmark-code color--green"></i> Tổng sản phẩm đã mua: <b class="color--green">12 sản phẩm</b></p>
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