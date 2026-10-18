<?php
// router.php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Se o arquivo solicitado existir fisicamente dentro de public, sirva-o diretamente
if ($uri !== '/' && is_file(__DIR__ . '/public' . $uri)) {
    return false;
}

// Caso contrário, redireciona toda a requisição para o index.php
require_once __DIR__ . '/public/index.php';