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
        <section class="error__404">
            <div class="container">
                <?php if ($is_success) { ?>
                <div class="alert alert-success mt-3">
                    <h1><?php echo MESSAGES['payment_success'] ?></h1>
                    <p><?php echo MESSAGES['payment_success_message'] ?></p>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger mt-3">
                    <h1><?php echo MESSAGES['payment_failed'] ?></h1>
                    <p><?php echo MESSAGES['payment_failed_message'] ?></p>
                </div>
                <?php } ?>
            </div>
        </section>
    </main>

    <?php include './common/footer.php'; ?>

</body>

</html>