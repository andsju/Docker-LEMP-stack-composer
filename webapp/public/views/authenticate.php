<?php

// includes
// include core if direct file access
if (str_contains($_SERVER['REQUEST_URI'], '/views/')) {
    include_once '../inc.core.php';
};

$title = "Authenticate";

?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/styles/style.css">
</head>

<body>

    <?php include ROOT . '/views/partials/header.php'; ?>

    <main>
        <h1><?php echo $title; ?></h1>

        <p>
            <a href="/signout.php">Sign out</a>
        </p>

        <p>
            <span>Office 365</span> <a href="/signin">Sign in</a>

            <?php
            // create hidden inputs if authorized - use in client side JavaScript requests
            if (isset($_SESSION['azureAccessToken'])) {
                echo '<input type="hidden" value=' . $_SESSION['azureAccessToken'] . ' id="azureAccessToken">';
                echo '<input type="hidden" value="' . $_SESSION['azureUserId'] . '" id="azureUserId">';
            }
            ?>
        </p>

        <?php

        // composer autoloading 
        require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

        // authorization code should be in the "code" query param
        $authCode = isset($_GET['code']) ? $_GET['code'] : '';

        // use authorization code to get a token access
        if (strlen($authCode) > 0) {

            include SRC . '/models/AuthenticateControllerAzure.php';

            $authenticate = new AuthenticateControllerAzure();
            $authenticate->callback($authCode);

        }

        if (isset($_SESSION['azureDisplayName'])) {
            echo '<p>'. $_SESSION['azureDisplayName'] . ' is authenticated (Office365 Azure AD)</p><span id="authenticationToken" class="hidden"></span>';

            echo '<button id="btnAzureUserEvents">Get Office 365 events</button>';
            echo '<div id="azureContent"></div>';
    
        } 

        ?>


    </main>

    <?php include ROOT . '/views/partials/footer.php'; ?>

    <script src="/js/code.js?date=<?php echo time(); ?>"></script>

</body>

</html>