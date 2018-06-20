<?php
define('APPLICATION_PATH', dirname((__FILE__)));
$app = new Yaf_Application( APPLICATION_PATH . "/conf/app.ini");
$app->bootstrap()->run();
