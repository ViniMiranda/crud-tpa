<div class="container text-white">
    <form action="./?class=Livro&action=create" method="post">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="autores">Autores</label>
            <input type="text" id="autores" name="autores" class="form-control" required />
        </div>
        <div class="form-group">
            <input class="btn btn-success"type="submit" value="Enviar">
            <a href="./" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</div>