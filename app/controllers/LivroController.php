<?php
require_once 'app/models/LivroModel.php';

class LivroController
{
    public function readAll()
    {

        $obj = new Livro();
        $livros = $obj->readAll();

        include 'app/views/Livro_read.php';
    }
    public function readOne()
    {
        $obj = new Livro();
        $obj->setId($_GET['id']);
        $obj->readOn();
    }

    public function create()
    {

        include 'app/views/Livro_create.php';
        //instancia classe User do UserModel.php
        $obj = new Livro();

        if (isset($_POST["titulo"]) && isset($_POST["autores"])) {

            $obj->setTitulo($_POST["titulo"]);
            $obj->setAutores($_POST["autores"]);
            $obj->create();
            echo "<script>alert('Livro cadastrado com sucesso.');</script>";
        } else {
        }
    }
    public function update()
    {

        $obj = new Livro();
        $obj->setId($_GET['id']);

        if (isset($_POST['titulo']) && isset($_POST['autores'])) {

            $obj->setTitulo($_POST['titulo']);
            $obj->setAutores($_POST['autores']);
            $obj->update();

            echo "<script>alert('Livro Alterado com sucesso.');</script>";
        }
        $livro = $obj->readOne();

        include 'app/views/Livro_update.php';
    }

    public function delete()
    {
        $obj = new Livro();
        $obj->setId($_GET['id']);
        $livro = $obj->delete();
    }
}
