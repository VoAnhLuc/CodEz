<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
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
        <?php
            include './common/breadcrumb.php';
        ?>
        <section class="login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <form method="post" class="login__form">
                            <div class="login__title">
                                <h3>Welcome Back</h3>
                                <p>You can sign in with your username.</p>
                            </div>
                            <div class="login__body">
                                <div class="login__group">
                                    <label for="username" class="mb-2">E-Mail Address / Username</label>
                                    <input id="username" type="text" class="form-control " name="username" placeholder="Enter your username" required autocomplete="username">
                                </div>
                                <div class="login__group">
                                    <label for="password" class="mb-2">Password</label>
                                    <input id="password" type="text" class="form-control " name="password" placeholder="Enter your username" required autocomplete="password">
                                </div>
                                <div class="login__group">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label for="remember" class="label_text">Remember Me</label>
                                </div>
                                <div class="login__group">
                                    <button type="submit" class="btn btn-sm btn__theme">Đăng nhập</button>
                                </div>
                                <div class="login__assist">
                                    <p><a href="./forgot.php">Forgot Your Password?</a></p>
                                    <p>Don't have an <a href="./register.php">account</a>?</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>   

    <?php include './common/footer.php'; ?>

</body>

</html>