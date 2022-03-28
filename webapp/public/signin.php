<?php

include_once 'inc.core.php';
include SRC . '/models/AuthenticateControllerAzure.php';

$authenticate = new AuthenticateControllerAzure();
$authenticate->signin();

?>