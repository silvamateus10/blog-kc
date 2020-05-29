<?php

/**
 * Description of Artigo
 *
 * @author Mateus
 */

require_once 'Crud.php';

class Artigo extends Crud{
   
    protected $table = 'artigo';
    private $idArtigo;
    private $titulo;
    private $subtitulo;
    private $descricao;   
    private $img;
    private $conteudo;
    private $autor;

    function getIdArtigo() {
        return $this->idArtigo;
    }

        function getTitulo() {
        return $this->titulo;
    }

    function getSubtitulo() {
        return $this->subtitulo;
    }
    
    function getDescricao() {
        return $this->descricao;
    }
    
    function getImg() {
        return $this->img;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getAutor() {
        return $this->autor;
    }

  
    function setIdArtigo($idArtigo) {
        $this->idArtigo = $idArtigo;
    }


    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    
     function setDescricao($descricao) {
        $this->descricao = $descricao;
    }


    function setImg($img) {
        $this->img = $img;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (titulo, subtitulo, descricao, img, conteudo, autor) VALUES (:titulo, :subtitulo, :descricao, :img,  :conteudo, :autor)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':subtitulo', $this->subtitulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':img', $this->img);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':autor', $this->autor);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET titulo = :titulo, subtitulo = :subtitulo, descricao = :descricao, img = :img, conteudo = :conteudo, autor = :autor WHERE idArtigo = :idArtigo";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':subtitulo', $this->subtitulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':img', $this->img);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':idArtigo', $id);        
        return $stmt->execute();
    }

}
