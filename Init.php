<?php

define("DEBUG" , 1);
define("WWW" , ROOT.'/public' );
define("CACHE" , ROOT.'/tmp/cache' );
define("CONF",  ROOT.'/config');
define("CORE", ROOT. '/vendor/core');
define('APP', ROOT. '/app');

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#",'', $app_path);
$app_path = str_replace( '/public/', '', $app_path);
define("PATH", $app_path);

require_once ROOT. '/vendor/autoload.php';  