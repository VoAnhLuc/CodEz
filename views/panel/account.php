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
                        <table class="table table-striped bg--white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Họ và Tên</th>
                                    <th scope="col">Số dư</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($pagedResults->getItems() as $item)
                                    {
                                        echo '
                                            <tr>
                                                <th scope="row">' . $item['id'] . '</th>
                                                <td>' . $item['username'] . '</td>
                                                <td>' . $item['fullname'] . '</td>
                                                <td>' . $item['money'] . '</td>
                                                <td>
                                                    <a href="' . ROUTES['user_approve'] . '&id=' . $item['id'] . '">Sửa</a> -
                                                    <a href="' . ROUTES['user_delete'] . '&id=' . $item['id'] . '">Xóa</a>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="right-panel__pager">
                        <?php echo $pagedResults->displayPager(ROUTES['panel_account']) ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>