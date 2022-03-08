<?php

$title = "Home";

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <?php include ROOT . '/views/partials/header.php'; ?>


    <?php include ROOT . '/views/partials/footer.php'; ?>
    
    <script src="js/code.js"></script>

    <?php phpinfo(); ?>

</body>
</html>