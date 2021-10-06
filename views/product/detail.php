<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['title']; ?></title>
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
        <div class="toanbo">
            
            <?php
                include './common/breadcrumb.php';
            ?>
            
            <section>
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-lg-8 col-md-12 col-sm-12 mt-3">
                            <div class="card card1">
                                <div class="card-img">
                                    <img id="anhsanpham" src="https://codesjungle.com/public/storage/items/1621798175252.jpg" alt="" width="100%">  
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-primary nutnhan"><i class="bi bi-heart"></i> Add To Favorites</button>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="bi bi-share"> Share With :</button>
                                    <button type="button" class="bi bi-facebook"> Facebook</button>
                                    <button type="button" class="bi bi-instagram"> Instagram</button>
                                    <button type="button" class="bi bi-linkedin"> Linkedin</button>
                                    <button type="button" class="bi bi-reddit" > Reddit</button>
                                    <button type="button" class="bi bi-twitter"> Twitter</button>
                                </div>
                            </div>  
                            <div class="card cardcontent mt-4">    
                                <div class="card-body gioithieusp mt-4">
                                    <h2><?php echo $product['title'] ?></h2>
                                    <?php echo $product['content'] ?>
                                </div>

                            </div>                
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-3">
                            <div class="card cardright">
                                <div class="card-header">
                                    <i>Prices : <?php echo $product['price'] ?></i>
                                </div>
                                <div class="card-body" >
                                    <i class="bi bi-check-circle"> Quality checked - Buy Code, Scripts, Themes, Plugins and More</i><br>
                                    <i class="bi bi-check-circle"> Future updates</i><br>
                                    <i class="bi bi-check-circle"> 6 months support from cyte</i>
                                </div>
                                <hr>
                                <div class="card-body card2body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">Regular License</label>
                                    </div>
                                    <div class="form-check  form2check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">Extended License</label>
                                    </div>
                                </div>
                                <div class="card-footer rightfooter" >
                                    <button class="btn btn-primary btn"><i class="bi bi-cart-check-fill"> Buy Now</i></button>
                                </div>
                            </div>
                            <div class="card mt-3 card-creat">
                                <div class="card-body">
                                    <i class="bi bi-tools"> This item was featured on :</i><br>
                                    <b>Codez - Buy Code, Scripts, Themes, Plugins and More.</b>
                                </div>
                            </div>
                            <div class="card author mt-4">
                                <div class="card-header">
                                    <i>Author Information</i>
                                </div>
                                <div class="card-body">
                                    <img src="./images/logo.png" alt=""><br>
                                    <div class="member"><i>Member Since 2021</i><br></div>
                                    <div class="member">
                                        <i class="bi bi-person-circle"> Hoàng </i>
                                        <i class="bi bi-person-circle"> Hoài </i>
                                        <i class="bi bi-person-circle"> Lực </i>
                                        <i class="bi bi-person-circle"> Hùng </i>
                                        <i class="bi bi-person-circle"> Thắng </i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary"><i class="bi bi-binoculars-fill"> View Profile</i></button>
                                </div>
                            </div>
                            <div class="card danhgia mt-3">
                                <div class="card-body">
                                    <div class="yeuthich"><i class="bi bi-cart2"> Total Sales </i><i class="conso">5</i></div>
                                    <div class="yeuthich"><i class="bi bi-heart"> Favourites </i><i class="conso">4</i>  </div>
                                    <div class="yeuthich"><i class="bi bi-heart"> Comments</i><i class="conso">3</i></div>
                                    <div class="yeuthich">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i> ( 5 Ratings ) </i>
                                    </div>
                                </div>
                            </div>
                            <div class="card infitem mt-3">
                                <div class="card-header">
                                    <i>Item Infomation</i>
                                </div>
                                <div class="card-body">
                                    <div class="inf"><b>Released :</b><i> 1 October 2021</i></div>
                                    <div class="inf"><b>Updated :</b><i> 1 September 2021</i></div>
                                    <div class="inf"><b>Categort :</b><i> Android</i></div>
                                    <div class="inf"><b>Item Type :</b><i> Mobiel Apps</i></div>
                                    <div class="inf"><b>Package :</b><i> .apk, .dex, .so, .dat, .db, .java, .xml, La</i></div>
                                    <div class="inf"><b>Includes :</b><i> PNG, Layered PSD, JavaScript JS, CSS, PHP, HTML</i></div>                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="breadcrumb-area" >
                <!-- phan2 -->
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 abcd">
                            <div class="container mt-4  moreitem">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h2>More Related Items</h4>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                        <div class="card cardfooter">
                                            <div class="card-img">
                                                <img id="anhsanpham" src="./images/anhcode.jpg" alt="" width="100%">  
                                            </div>
                                            <div class="card-body">
                                                    <b>Digital Visiting Card Maker PHP Script</b><br>
                                                    <i class="bi bi-journals">Script</i>
                                            </div>                           
                                            <div class="card-footer">
                                            <i>400$</i>
                                            <i class="bi bi-heart biok" > 3</i>
                                            <i class="bi bi-star-fill bistar"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-cart-check bibuy"> 3</i>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                        <div class="card cardfooter">
                                            <div class="card-img">
                                                <img id="anhsanpham" src="./images/anhcode.jpg" alt="" width="100%">  
                                            </div>
                                            <div class="card-body">
                                                <b>URL CYTE URL Shorter : Logger-Url-Tracker</b><br>
                                                <i class="bi bi-journals">Script</i>
                                            </div>
                                            <div class="card-footer">
                                                <i>500$</i>
                                                <i class="bi bi-heart biok"> 3</i>
                                                <i class="bi bi-star-fill bistar"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-cart-check bibuy"> 5</i>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 sanphamthem">
                                        <div class="card cardfooter">
                                            <div class="card-img">
                                                <img id="anhsanpham" src="./images/anhcode.jpg" alt="" width="100%">  
                                            </div>
                                            <div class="card-body">
                                                <b>WILL VPN App - VPN App With Admin Panel</b> <br>
                                                <i class="bi bi-journals">Script</i> 
                                            </div>
                                            <div class="card-footer">
                                                <i>600$</i>
                                                <i class="bi bi-heart biok"> 5</i>
                                                <i class="bi bi-star-fill bistar"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-cart-check bibuy"> 6</i>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>