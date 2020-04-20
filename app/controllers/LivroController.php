<?php
require_once 'app/models/LivroModel.php';

class LivroController
{
    public function read()
    {

        $obj = new Livro();
        $livros = $obj->findAll();

        include 'app/views/Livro_read.php';
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
        } else {
            
        }
    }
    public function alter()
    {
        include 'app/views/Livro_alter.php';
    }
    
    public function delete()
    {

    }


}
