<?php
if (! defined('curso'))
    exit;

require_once(__DIR__.'/config.php');

$sPart = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

if (empty($sPart)) {
    require_once(dirname(__DIR__).'/controllers/listaController.php');
} else {
    require_once(dirname(__DIR__).'/controllers/editarController.php');
}