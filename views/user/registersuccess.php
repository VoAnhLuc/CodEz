<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Success</title>
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
        <div>
            <?php
                include './common/breadcrumb.php';
            ?>
            <section class="scdangky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 d-flex m-auto">
                            <div class="box alert alert-success m-5">
                                <h2> You have successfully registered </h2><br/>
                                <h3> Please, <a href="<?php echo ROUTES['user_login'] ?>">Click here to Log In </a></h3>  
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