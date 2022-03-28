<?php

    // require_once __DIR__ . '/vendor/autoload.php'; 
    

    // include file defining entry points and some overall settings
    include_once 'inc.core.php';

    // simple routing in php

    // if querystring redirect to index.html
    $query_string = $_SERVER['QUERY_STRING'];
    if (strlen($query_string) > 0) {
        header('Location: /index.html');
    }

    // get path from REQUEST_URI
    $path = strtok($_SERVER["REQUEST_URI"], '?');

    switch ($path) {

        case '/':
            case '/home':
    
                require __DIR__ . '/views/home.php';
                break;

        case '/sample':
        
            require __DIR__ . '/views/sample.php';
            break;

        case '/phpinfo':
    
            header('Location: /phpinfo.php'); 
            break;

        default:
            
            header('Location: /index.html');
            break;
    }
