<?php
    $url = $_SERVER['PHP_SELF'];
?>

<section class="breadcrumb-area" id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $url ?>"><?php echo $title ?></a></li>
                    </ol>
                </div>
            </div>
            <div class="nd">  
                <h2><?php echo $title ?></h2>
            </div>
        </div>
    </div>
</section>