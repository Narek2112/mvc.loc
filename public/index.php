<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config/constants.php';
session_start();
require_once CONF.'/functions.php';
require_once CONF.'/routes.php';
use Core\Framework\App;
$app = new App();
