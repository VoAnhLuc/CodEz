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
                            <li><a href="">Start Selling</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Help</a></li>
                            <li><a href="<?php echo ROUTES['payment_cart'] ?>"><i class="bi bi-cart2"></i></a></li>
                        </ul>
                        <?php
                            if(!isset($_SESSION["login"]))
                            {
                                echo '<span class="d-none d-sm-block header__btn btn btn-secondary">
                                        <a href="' .ROUTES['user_register'] .'">Đăng ký</a>
                                    </span>';
                            }
                        ?>                        
                        <span class="header__btn btn btn-secondary">
                            <a href="<?php echo ROUTES['user_login'] ?>"><?php echo (isset($_SESSION["login"]) ? 'Hello! ' . $_SESSION["login"]['username'] : "Đăng nhập");?></a>
                        </span>
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
                                <a class="nav-link" href="#">PHP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">C#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">HTML/CSS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Javascript</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Java</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Python</a>
                            </li>
                        </ul>
                        <form class="d-flex ">
                            <input class="form-control me-2" type="text" placeholder="Nhập từ khóa" aria-label="Search">
                            <button class="btn btn-sm btn__theme" type="submit">Tìm</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</header>