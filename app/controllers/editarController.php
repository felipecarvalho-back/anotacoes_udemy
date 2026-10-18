<?php

use function Anotacoes\models\editar\getAnotacao;
use function Anotacoes\models\editar\insertAnotacao;
use function Anotacoes\models\editar\updateAnotacao;

if (! defined('curso'))
    exit;

require_once(dirname(__DIR__).'/models/editar.php');

$sID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sNome = filter_input(INPUT_POST, 'nome');
    $sAnotacao = filter_input(INPUT_POST, 'anotacao');

    if (empty($sID)) {
        insertAnotacao($sNome, addslashes($sAnotacao));
        header('Location: /');
        exit;
    } else {
        updateAnotacao($sID, $sNome, addslashes($sAnotacao));
        header('Location: /');
    }
}

if (! empty($sID)) {
    $dados = getAnotacao($sID);
    extract($dados);
}

include_once(dirname(__DIR__).'/views/editar.php');