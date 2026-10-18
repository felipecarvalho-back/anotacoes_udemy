<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Anotações</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <!-- ════════════ HEADER ════════════ -->
    <header class="header">
        <div class="header-inner">
            <h1>Minhas Anotações</h1>
            <div class="header-actions">
                <a href="/editar/" class="btn btn-primary">+ Nova Anotação</a>
            </div>
        </div>
    </header>

    <!-- ════════════ LISTAGEM ════════════ -->
    <main class="container">
        <div class="notes-grid">
            <?php
            if (isset($dados)) :
                foreach ($dados as $row) :
                    ?>
                    <article class="note-card">
                        <h2 class="note-title"><?php echo $row['nome'] ?? ''; ?></h2>
                        <div class="note-meta">
                            <span class="note-date">Criado em <?php echo $row['criado_em'] ?? ''; ?></span>
                            <div class="note-actions">
                                <a href="/editar/?id=<?php echo $row['id']; ?>" class="btn btn-edit">Editar</a>
                                <button type="button" onclick="excluir(<?php echo $row['id']; ?>)"
                                    class="btn btn-delete">Excluir</button>
                            </div>
                        </div>
                    </article>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </main>

    <script>
        function excluir(id) {
            if (confirm('Deseja excluir?')) {
                location.assign(`/?id=${id}`);
            }
        }
    </script>
</body>

</html>