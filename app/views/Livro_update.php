<div>
    <form action="./?class=Livro&action=update&id=<?= $livro->id?>" method="post">
        <label for="autores">Titulo</label>
        <input type="text" id="titulo" name="titulo" value="<?= $livro->titulo ?>" required/>

        <label for="autores">Autores</label>
        <input type="text" id="autores" name="autores" value="<?= $livro->autores ?>"required />

        <input type="submit" value="Alterar Livro">

        <a href="./" class="alter">Voltar</a>
    </form>
</div>