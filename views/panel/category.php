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
                <?php
                echo '
                <div class="col-12 col-lg-10 right-panel">
                    <div class="col-12 right-panel__form">
                        <form method="GET">
                            <div class="right-panel__search">
                                <div class="col-12 col-lg-6">
                                    <a href="' .ROUTES['category_create']. '" class="btn btn__theme">Thêm mới</a>
                                </div>
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
                    </div>'
                    ?>
                    <div class="right-panel__item">
                        <table class="table table-striped bg--white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên thư mục</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($category as $key) {
                            echo '
                            <tbody>
                                <tr>
                                    <th scope="row">'.$key['id'].'</th>
                                    <td>'.$key['name'].'</td>
                                    <td>'.$key['description'].'</td>
                                    <td>
                                        <a href="' . ROUTES['category_fix'] . '&id=' . $key['id'] . '">Sửa</a> -
                                        <a href="' . ROUTES['category_delete'] . '&id=' . $key['id'] .'">Xóa</a>
                                    </td>
                                </tr>
                            </tbody>
                            ';
                            }
                            ?>
                        </table>
                    </div>

                    <div class="right-panel__pager">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
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