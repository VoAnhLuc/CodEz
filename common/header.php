<header>
    <section class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 m-auto">
                    <div class="header__logo">
                        <a href="."><img width="150" src="./images/logo.png"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-6 m-auto">
                    <div class="header__info">
                        <ul class="d-none d-lg-flex header__list">
                            <li><a href="#">Trở thành người bán</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Trợ giúp</a></li>
                        </ul>
                        <span class="header__cart">
                            <a href="<?php echo ROUTES['payment_cart'] ?>"><i class="bi bi-cart2"></i></a>
                            <span class="header__cart-number"><?php echo isset($_SESSION['total_cart']) ? $_SESSION['total_cart'] : 0 ?></span>
                        </span>
                        <?php
                            if (!isset($_SESSION['is_logged']) || !$_SESSION['is_logged'])
                            {
                                echo '
                                    <span class="d-none d-sm-block header__btn">
                                        <a class="btn btn-secondary" href="' .ROUTES['user_register'] .'">Đăng ký</a>
                                    </span>                
                                    <span class="header__btn">
                                        <a class="btn btn-secondary" href="' . ROUTES['user_login'] . '">Đăng nhập</a>
                                    </span>
                                ';
                            }
                            else
                            {
                                echo '
                                    <span id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" class="text--bold color--white cursor--pointer me-3">' . $_SESSION['fullname'] . '</span>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                        <li><a class="dropdown-item color--instagram" href="#"><i class="bi bi-wallet2"></i> ' . Func::getDotPrice($_SESSION['user']['money']) . ' VND</a></li>
                                        <li><a class="dropdown-item" href="' . ROUTES['payment'] . '">Giỏ hàng</a></li>
                                        <li><a class="dropdown-item" href="' . ROUTES['user'] . '">Thông tin cá nhân</a></li>
                                        <li><a class="dropdown-item" href="' . ROUTES['payment_history'] . '">Lịch sử mua hàng</a></li>
                                        <li><a class="dropdown-item" href="' . ROUTES['user_edit'] . '">Chỉnh sửa thông tin</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        ' . (Func::isCurrentUserVendor() ? '<li><a class="dropdown-item" href="' . ROUTES['product_create'] . '">Đăng bán sản phẩm</a></li>' : '') . '
                                        ' . (Func::isRoleAdmin() ? '<li><a class="dropdown-item color--red" href="' . ROUTES['panel'] . '">Admin Panel</a></li>' : '') . '
                                        <li><a class="dropdown-item" href="' . ROUTES['user_logout'] . '">Đăng xuất</a></li>
                                    </ul>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header__navbar">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-md navbar-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href=".">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROUTES['product'] ?>&category=7">PHP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROUTES['product'] ?>&category=3">C#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROUTES['product'] ?>&category=1">HTML/CSS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROUTES['product'] ?>&category=2">Javascript</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROUTES['product'] ?>&category=4">Java</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROUTES['product'] ?>&category=6">Python</a>
                            </li>
                        </ul>
                        <form class="d-flex" method="GET" action="<?php echo ROUTES['product'] ?>">
                            <input type="hidden" name="controller" value="product" />
                            <input name="keyword" class="form-control me-2" type="text" placeholder="Nhập từ khóa" aria-label="Search">
                            <button class="btn btn-sm btn__theme" type="submit">Tìm</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</header>