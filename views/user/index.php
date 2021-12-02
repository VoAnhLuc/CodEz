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
        <div class="toanbo">
            
            <?php
                include './common/breadcrumb.php';
            ?>

            <section class="sectionprofile">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                            <div class="card cardprofile">
                                <div class="card-body bodyprofile">
                                    <img src="<?php echo $user['avatar'] ?>" alt="" class="imgnouser"><br>
                                    <b><?php echo $user['fullname']; ?></b>
                                    <div class="gtuser"><i>Tham gia từ tháng <?php echo date('m, Y', $user['join_time']) ?></i></div>
                                </div>   
                            </div>

                            <div class="card cardsociallink mt-4">
                                <div class="card-header headersociallink">
                                    <i class="headerurltext">Mạng Xã Hội</i>
                                </div>
                                <div class="card-body bodysociallink">
                                    <div class="iconprofile">
                                        <a class="me-2" href="<?php echo $user['website'] ?>">
                                            <i class="bi bi-person-circle size--2rem"></i>
                                        </a>
                                        <a class="me-2" href="<?php echo $user['facebook'] ?>">
                                            <i class="bi bi-facebook size--2rem color--facebook"></i>
                                        </a>
                                        <a class="me-2" href="<?php echo $user['instagram'] ?>">
                                            <i class="bi bi-instagram size--2rem color--instagram"></i>
                                        </a>
                                        <a class="me-2" href="<?php echo $user['twitter'] ?>">
                                            <i class="bi bi-twitter size--2rem color--blue"></i>
                                        </a>
                                    </div>                                                            
                                </div>
                            </div> 
                        </div>     
                        <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                            <div class="row">
                                <img class="profile__banner" src="<?php echo $user['cover'] ?>" alt="">
                            </div>  
                            <?php if (!empty($user['heading'])) { ?>
                            <div class="row mt-4">  
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card cardservice">
                                        <div class="card-body bodycardservice">
                                            <div class="servicehead text-center">
                                                <i><?php echo $user['heading'] ?></i>                                                       
                                            </div>
                                            <div class="servicestatus text-center">
                                                <i><?php echo $user['about'] ?></i>                                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>                                     
                            </div>
                            <?php } if ($user['is_vendor']) { ?>
                                <div class="row mt-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card carditemprofile">
                                            <div class="card-header headercarditemprofile">
                                                <i>Sản phẩm đã đăng</i>
                                            </div>
                                            <div class="card-body">
                                                <?php
                                                    foreach ($products->getItems() as $item)
                                                    {
                                                        echo '
                                                            <div class="row align-items-center">
                                                                <div class="col-auto d-none d-md-block">
                                                                    <img class="product__image" src="' . $item['thumb'] . '"/>
                                                                </div>
                                                                <div class="col-12 col-md-10">
                                                                    <a href="' . ROUTES['product_detail'] . '&id=' .$item['id'] . '">' . $item['title'] . '</a><br/>
                                                                    <span class="color--gray size--14px">' . $item['description'] . '</span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        ';
                                                    }

                                                    echo $products->displayPager(ROUTES['user'] . '&id=' . $user['id']);
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>                 
                    </div>
                </div>
            </section>
        </div>
    </main>   

    <?php include './common/footer.php'; ?>

</body>

</html>