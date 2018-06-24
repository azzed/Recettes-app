<?php


ini_set('display_errors', -1);
const APP_ROOT = __DIR__;
define('BOOTSTRAP', $_SERVER['SCRIPT_NAME']);
define('PUBLIC_DIR', BOOTSTRAP."/../public/");
require_once('vendor/autoload.php');
require_once('bootstrap.php');
