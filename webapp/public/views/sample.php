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

    <?php

    /* 
    OAUTH_APP_ID=813f1273-e6d4-489f-baff-c4271b8ed979
    OAUTH_APP_PASSWORD=oECX5022~?;wxpihiNMGF3;
    OAUTH_REDIRECT_URI=http://localhost:3000/auth/callback
    OAUTH_SCOPES='profile offline_access user.read calendars.read'
    OAUTH_AUTHORITY=https://login.microsoftonline.com/common/
    OAUTH_ID_METADATA=v2.0/.well-known/openid-configuration
    OAUTH_AUTHORIZE_ENDPOINT=oauth2/v2.0/authorize
    OAUTH_TOKEN_ENDPOINT=oauth2/v2.0/token */
/* 
    $clientId = '813f1273-e6d4-489f-baff-c4271b8ed979';
    $clientSecret = 'oECX5022~?;wxpihiNMGF3;';
    $guzzle = new \GuzzleHttp\Client();
    // $url = 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/token?api-version=1.0';
    $url = 'https://login.microsoftonline.com/common/';
    $token = json_decode($guzzle->post($url, [
        'form_params' => [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'resource' => 'https://graph.microsoft.com/',
            'grant_type' => 'client_credentials',
        ],
    ])->getBody()->getContents());
    $accessToken = $token->access_token;
    print_r($accessToken);
 */
    ?>






    <?php include ROOT . '/views/partials/footer.php'; ?>

</body>

</html>