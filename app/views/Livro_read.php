<div class="container">
    <div class="users-visible">
        <div class="users">
            <a href="./?class=Livro&action=create" class="new">Novo Usuário</a>

            <table id="tabela">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>titulo</th>
                        <th>autores</th>
                    </tr>

                </thead>

                <tbody>
                    <!-- Listando todos-->
                    <?php foreach ($livros as $livro) { ?>
                        <tr>
                            <td>
                                <h5> <?= $livro->id ?></h5>
                            </td>

                            <td>
                                <h5> <?= $livro->titulo ?></h5>
                            </td>

                            <td>
                                <h5> <?= $livro->autores ?></h5>
                            </td>

                            <td>
                                <a href="./?class=User&action=delete" class="excluir">Excluir</a>
                                <a href="./?class=User&action=alter" class="alter">Alterar</a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>