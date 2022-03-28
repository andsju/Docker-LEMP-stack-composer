<?php

// use sessions 
session_start();

// live or development
define("LIVE", true);

// prevent direct access to files
define("VALID_INCLUDE", true);

// root folder - public
define("ROOT", $_SERVER['DOCUMENT_ROOT']);

// src folder
define("SRC", substr(ROOT, 0, strripos(ROOT, '/')).'/src');

?>