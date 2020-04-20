
<div>
    <form action="./?class=User&action=alter" method="put">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="<?= $obj->getNome() ?>" required/>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="<?= $obj->getEmail() ?>"required />

        <input type="submit" value="Alterar Usuário">
    </form>
</div>