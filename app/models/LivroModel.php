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
            echo ('<h5>Ops algo deu errado ao conectar-se com a base de dados<h5>');
            die();
        }
    }
    //Listar todos
    public function readAll()
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
    public function readOne()
    {
        $sql = $this->conn->prepare(
            "SELECT * FROM livro WHERE id=?"
        );
        echo("Seu id é :".$this->id);
        $sql->execute([$this->id]);
        $row = $sql->fetchObject();
        return $row;

    }
    //criar novo livro
    public function create()
    {
        var_dump($this->getTitulo());
        $sql = $this->conn->prepare("INSERT INTO livro (titulo, autores) VALUES(?,?)");
        //passando this.getTitulo() e this.getAutores() como parametros para a function execute
        $sql->execute([$this->getTitulo(), $this->getAutores()]);
    }
    //alterar livro
    public function update(){
        var_dump($this->getId());
        $sql = $this->conn->prepare(
            "UPDATE livro SET titulo=?, autores=? WHERE id=?"
        );
        $sql->execute([$this->getTitulo(), $this->getAutores(), $this->getId()]);
    }
    //deletar livro
    public function delete()
    {
        $sql = $this->conn->prepare("DELETE FROM livro WHERE id = ?");
        $sql->execute([$this->id]);
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
