<?php

// require composer autoload
$envRoot = getenv('MPDF_ROOT');
$path = $envRoot ?: __DIR__;

require_once $path . '/vendor/autoload.php';

?>