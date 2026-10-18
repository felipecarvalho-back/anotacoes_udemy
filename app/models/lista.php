<?php

namespace Anotacoes\models\lista;

function getAnotacoes(): array
{
    global $dbConfig;

    $dados = [];

    try {
        $conexao = mysqli_connect($dbConfig['servidor'], $dbConfig['usuario'], $dbConfig['senha'], $dbConfig['dbNome'], $dbConfig['porta']);

        if (mysqli_connect_errno()) {
            throw new \Exception(mysqli_connect_error());
        }

        mysqli_set_charset($conexao, 'utf8mb4');

        if ($result = mysqli_query($conexao, 'SELECT * FROM anotacoes')) {
            $dados = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);
        }

        mysqli_close($conexao);

    } catch (\mysqli_sql_exception | \Exception $e) {
        echo $e;
    }

    return $dados;
}

function delAnotacao(int $id)
{
    global $dbConfig;

    try {
        $conexao = mysqli_connect($dbConfig['servidor'], $dbConfig['usuario'], $dbConfig['senha'], $dbConfig['dbNome'], $dbConfig['porta']);

        if (mysqli_connect_errno()) {
            throw new \Exception(mysqli_connect_error());
        }

        mysqli_set_charset($conexao, 'utf8mb4');

        if ($result = mysqli_prepare($conexao, 'DELETE FROM anotacos WHERE id=?')) {
            mysqli_stmt_bind_param($result, 'i', $id);
            mysqli_stmt_execute($result);
            mysqli_stmt_close($result);
        }

        mysqli_close($conexao);
    } catch (\mysqli_sql_exception | \Exception $e) {
        echo $e;
    }
}