<?php

// includes
include SRC . '/models/Database.php';
include SRC . '/models/Sample.php';

$sample = new Sample();
$title = "Sample";

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

    <?php

    $setup = $sample->setup();
    print_r($setup);

    $result = $sample->insertOne('äpple');
    print_r($result);


    $data = $sample->selectAll();
    print_r($data);

    new DisplayDBVersion();

    ?>

    <?php include ROOT . '/views/partials/footer.php'; ?>

</body>

</html>