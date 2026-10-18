<?php

use function Anotacoes\models\lista\delAnotacao;
use function Anotacoes\models\lista\getAnotacoes;

if (! defined('curso'))
    exit;

require_once(dirname(__DIR__).'/models/lista.php');

$sID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($sID) {
    delAnotacao($sID);
    header('Location /');
    exit;
}

$dados = getAnotacoes();
include_once(dirname(__DIR__).'/views/lista.php');