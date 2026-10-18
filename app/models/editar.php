<?php
namespace Anotacoes\models\editar;

function getAnotacao(int $id): array
{
    global $dbConfig;

    $dados = [];

    try {
        $conexao = mysqli_connect($dbConfig['servidor'], $dbConfig['usuario'], $dbConfig['senha'], $dbConfig['dbNome'], $dbConfig['porta']);

        if (mysqli_connect_errno()) {
            throw new \Exception(mysqli_connect_error());
        }

        mysqli_set_charset($conexao, 'utf8mb4');

        if ($result = mysqli_prepare($conexao, 'SELECT * FROM anotacoes WHERE id=?')) {
            mysqli_stmt_bind_param($result, 'i', $id);
            mysqli_stmt_execute($result);

            if ($query = mysqli_stmt_get_result($result)) {
                $dados = mysqli_fetch_array($query, MYSQLI_ASSOC);
            }

            mysqli_free_result($query);
            mysqli_stmt_close($result);
        }

        mysqli_close($conexao);

    } catch (\mysqli_sql_exception | \Exception $e) {
        echo $e;
    }

    return $dados;
}

function insertAnotacao(string $nome, string $anotacao)
{
    global $dbConfig;

    try {
        $conexao = mysqli_connect($dbConfig['servidor'], $dbConfig['usuario'], $dbConfig['senha'], $dbConfig['dbNome'], $dbConfig['porta']);

        if (mysqli_connect_errno()) {
            throw new \Exception(mysqli_connect_error());
        }

        mysqli_set_charset($conexao, 'utf8mb4');

        if ($result = mysqli_prepare($conexao, 'INSERT INTO anotacoes SET nome=?, anotacao=?')) {
            mysqli_stmt_bind_param($result, 'ss', $nome, $anotacao);
            mysqli_stmt_execute($result);
            mysqli_stmt_close($result);
        }

        mysqli_close($conexao);

    } catch (\mysqli_sql_exception | \Exception $e) {
        echo $e;
    }
}

function updateAnotacao(int $id, string $nome, string $anotacao)
{
    global $dbConfig;

    try {
        $conexao = mysqli_connect($dbConfig['servidor'], $dbConfig['usuario'], $dbConfig['senha'], $dbConfig['dbNome'], $dbConfig['porta']);

        if (mysqli_connect_errno()) {
            throw new \Exception(mysqli_connect_error());
        }

        mysqli_set_charset($conexao, 'utf8mb4');

        if ($result = mysqli_prepare($conexao, 'UPDATE anotacoes SET nome=?, anotacao=? WHERE id=?')) {
            mysqli_stmt_bind_param($result, 'ssi', $nome, $anotacao, $id);
            mysqli_stmt_execute($result);
            mysqli_stmt_close($result);
        }

        mysqli_close($conexao);

    } catch (\mysqli_sql_exception | \Exception $e) {
        echo $e;
    }
}

