<?php

if (!defined("VALID_INCLUDE")) {
    die;
}

// define application credentials

// database 
define("DB_HOST", "");
define("DB_NAME", "");
define("DB_USER", "");
define("DB_PASSWORD", "");

// authentication
define("AZURE_CLIENT_ID", "");
define("AZURE_CLIENT_SECRET", "");
define("AZURE_REDIRECT_URI", "");
define("AZURE_URL_AUTHORIZE", "https://login.microsoftonline.com/common/oauth2/v2.0/authorize");
define("AZURE_ACCESS_TOKEN", "https://login.microsoftonline.com/common/oauth2/v2.0/token");
define("AZURE_URL_RESOURCE_OWNER_DETAILS", "");
define("AZURE_SCOPES", "User.Read");

?>