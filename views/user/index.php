<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['fullname']; ?></title>
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
                                        <img src="./images/no-user.png" alt="" class="imgnouser"><br>
                                        <b><?php echo $user['fullname']; ?></b>
                                        <div class="gtuser"><i>Member since September 2021</i></div>
                                    </div>   
                                </div>

                                <div class="card cardsociallink mt-4">
                                    <div class="card-header headersociallink">
                                        <i class="headerurltext">Social Links</i>
                                    </div>
                                    <div class="card-body bodysociallink">
                                        <div class="iconprofile">
                                            <i class="bi bi-facebook size--2rem color--facebook"></i>
                                            <i class="bi bi-instagram biinstagram size--2rem color--instagram"></i>
                                            <i class="bi bi-twitter bitwitter size--2rem color--blue"></i>
                                        </div>                                                            
                                    </div>
                                </div> 
                            </div>     
                            <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="card cardtotalitem">
                                                <div class="card-body bodytotalitem">
                                                    <i>Total Iteams</i><br>
                                                    <div  class="itemnum"><i>0</i> </div>           
                                                </div>   
                                            </div>    
                                        </div>           
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="card cardtotalsale">
                                                <div class="card-body bodytotalsale">
                                                    <i>Total Sales</i><br>
                                                    <div  class="salenum"><i>0</i> </div>                                                                                  
                                                </div>   
                                            </div>    
                                        </div>         
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="card cardtotalrating">
                                                <div class="card-body bodytotalrating">
                                                    <i >Total Ratings</i><br>
                                                    <div class="ratingnum"><i>0</i></div> 
                                                </div>   
                                            </div>    
                                        </div>                  
                                    </div>
                                    <!-- image profile   -->
                                    <div class="row rowimgprofile">
                                        <img class="imgprofile" src="./images/imgprofile.jpg" alt="">
                                    </div>  
                                    <!-- end image profile   -->

                                    <!-- service -->
                                    <div class="row mt-4">  
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card cardservice">
                                                <div class="card-body bodycardservice">
                                                    <div class="servicehead">
                                                        <i>Web Development Service</i>                                                       
                                                    </div>
                                                    <div class="servicestatus">
                                                        <i>Web Development Service</i>                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                     
                                    </div>
                                    <!-- end service -->
                                    <div class="row mt-4">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card carditemprofile">
                                                <div class="card-header headercarditemprofile">
                                                    <i>Product Items</i>
                                                </div>
                                                <div class="card-body bodycarditemprofile">
                                                    <i>No Results</i>
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