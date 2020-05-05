<div class="container">
    <a href="./?class=Livro&action=create" class="btn btn-outline-light">Novo Usuário</a>

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

                        <a href="./?class=Livro&action=update&id=<?= $livro->id ?>" class="btn btn-info">Alterar</a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-confirmar" data-id="<?= $livro->id ?>">
                            excluir
                        </button>

                    </td>
                </tr>
                <!-- MODAL -->
                <div class="modal fade" id="modal-confirmar" tabindex="-1" role="dialog" aria-labelledby="modal-confirmar" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Deseja mesmo excluir esse registro?<?= $livro->id ?></h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="./?class=Livro&action=delete&id=<?= $livro->id ?>" type="button" class="btn btn-primary">Sim</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </tbody>

    </table>
</div>
<!-- MODAL -->