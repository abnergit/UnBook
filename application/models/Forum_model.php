<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {
    // Retorna todos os fóruns do banco
    public function getForuns(){
        return $this->db->get('forum')->result();
    }
    // Inseri novos fóruns cadastrados
    public function insertForum($titulo,$descricao){
        $titulo = trim($titulo);
        $descricao = trim($descricao);
        // consulta para saber se já existe um fórum com esse título
        $sql = "SELECT * from forum WHERE dsc_titulo_forum  = '$titulo'";
        $query = $this->db->query($sql);
        if($query->num_rows() == 0 ){
            $data = array (
                'dsc_titulo_forum' =>$titulo,
                'dsc_forum' => $descricao
                );
            $this->db->insert('forum',$data);
        }
        return 0;
    }
    public function deleteForum($idforum){
        $array = array (
            'idn_forum' => $idforum
        );
        $this->db->delete('forum',$array);
    }
}