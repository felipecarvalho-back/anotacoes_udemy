<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anotação</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <!-- ════════════ HEADER ════════════ -->
    <header class="header">
        <div class="header-inner">
            <h1>Anotações</h1>
            <a href="/lista/" class="btn btn-back">← Voltar</a>
        </div>
    </header>

    <!-- ════════════ FORMULÁRIO ════════════ -->
    <main class="container">
        <div class="form-card">
            <h2 class="page-title"><span>Editar</span> Anotação</h2>

            <form action="/editar/?id=<?php echo empty($id) ? '' : $id ?>" method="post">

                <div class="form-group">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-input" type="text" id="nome" name="nome" placeholder="Digite o nome da anotação"
                        value="<?php echo empty($nome) ? '' : $nome ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="anotacao">Anotação</label>
                    <textarea class="form-input" id="anotacao" name="anotacao"
                        placeholder="Escreva sua anotação aqui..."
                        required><?php echo empty($anotacao) ? '' : stripcslashes($anotacao); ?></textarea>
                    <p class="form-hint">Use este campo para registrar suas ideias, lembretes ou informações
                        importantes.</p>
                </div>

                <hr class="form-divider">

                <div class="form-footer">
                    <a href="/" class="btn btn-cancel">Cancelar</a>
                    <button type="submit" class="btn btn-submit">Salvar</button>
                </div>

            </form>
        </div>
    </main>

</body>

</html>