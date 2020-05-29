<?php

/**
 * 
 *
 * @author Mateus
 */


require_once 'Crud.php';
class Imagem extends Crud{
    
    protected $table = 'Imagem';
    private $idImagem;
    private $caminho;
    
    
    function getIdImagem() {
        return $this->idImg;
    }

    function setIdImagem($idImagem) {
        $this->idImagem = $idImagem;
    }

        

    function getCaminho() {
        return $this->caminho;
    }

    function setCaminho($caminho) {
        $this->caminho = $caminho;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (caminho) VALUES(:caminho)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':caminho', $this->caminho);
        return $stmt->execute();        
    }

    //Método não será utilizado, porém, não apague
    //Function will be not used, but, don't delete
    public function update($id) {}

}
