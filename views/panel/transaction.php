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
                                <div class="col-12 col-lg-6">
                                    <a href="" class="btn btn__theme">Thêm mới</a>
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
                    </div>

                    <div class="right-panel__item">
                        <table class="table table-striped bg--white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ID Tài Khoản</th>
                                    <th scope="col">Tên Tài Khoản</th>
                                    <th scope="col">Họ Và Tên</th>
                                    <th scope="col">Loại Giao Dịch</th>
                                    <th scope="col">Số Tiền</th>
                                    <th scope="col">Mô Tả</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>NoNotMe</td>
                                    <td>Trần Văn Hoài</td>
                                    <td>Nạp tiền</td>
                                    <td>150.000</td>
                                    <td>Chuyển khoản Momo - 0382124399</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <a href="">Chấp thuận</a> -
                                        <a href="">Hủy bỏ</a> -
                                        <a href="">Xóa</a>
                                    </td>
                                </tr>
                            </tbody>
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