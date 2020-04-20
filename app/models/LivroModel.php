<?php


class Livro
{
    //vars
    private $id;
    private $titulo;
    private $autores;
    private $conn;

    //construtor
    public function __construct($id = null)
    {
        require_once('config/config.php');
        $this->id = $id;
        //abrir coneccao com as constantes definidas em config/config.php
        try {
            $this->conn = new PDO(SVR, USR, PWD);
        } catch (\Throwable $th) {
            echo ('Ops algo deu errado ao conectar-se com a base de dados');
            die();
        }
    }
    //Listar todos
    public function findAll()
    {
        $sql = $this->conn->prepare("SELECT
        l.id,
        l.titulo,
        l.autores
        
        FROM livro l");

        $sql->execute();

        $rows = $sql->fetchAll(PDO::FETCH_CLASS);

        return $rows;
    }
    //Achar por id
    public function findOne($id)
    {
        $sql = $this->conn->prepare(
            "SELECT l.id, l.titulo, l.autores
            FROM livro l WHERE l.id = $id"
        );
        $sql->execute();

        $rows = $sql->fetchObject(PDO::FETCH_CLASS);
    }

    public function create()
    {
        $sql = $this->conn->prepare("INSERT INTO livro (titulo, autores) VALUES(?,?)");
        //passando this.getTitulo() e this.getAutores() como parametros para a function execute
        $sql->execute([$this->getTitulo(), $this->getAutores()]);
    }

    public function delete($id)
    {

        $sql = $this->conn->prepare("DELETE FROM usuario WHERE id = $id");
        $sql->execute();
    }

    //getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAutores()
    {
        return $this->autores;
    }

    public function setAutores($autores)
    {
        $this->autores = $autores;
    }
}
