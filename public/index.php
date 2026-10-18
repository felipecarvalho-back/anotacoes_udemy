<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
if (ini_get('zlib.output_compression') == 'Off') {
    if (extension_loaded('zlib')) {
        ob_start('ob_gzhandler');
    }
}

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0');
header('Pragma: no-cache');

date_default_timezone_set('America/Sao_Paulo');

define('curso', true);

require_once(dirname(__DIR__).'/app/core/app.php');