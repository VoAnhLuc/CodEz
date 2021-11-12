<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo MESSAGES['error_404'] ?> | CodEz</title>
    <?php include './common/css.php'; ?>
</head>

<body>
    
    <?php include './common/header.php'; ?>

    <main>
        <section class="error__404">
            <div class="container">
                <div class="alert alert-danger mt-3">
                    <h1><?php echo MESSAGES['error_404'] ?></h1>
                    <p><?php echo MESSAGES['error_404_message'] ?></p>
                </div>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>