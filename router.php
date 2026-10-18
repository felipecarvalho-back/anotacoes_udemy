<?php
// router.php

// Se o arquivo ou diretório solicitado existir fisicamente, sirva-o diretamente
if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false; 
}

// Caso contrário, redireciona toda a requisição para o index.php
require_once __DIR__ . '/public/index.php';