<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aval_model extends CI_Model {
    // Retorna todos os fóruns do banco
    public function getAvals(){
        return $this->db->get('aval')->result();
    }
    // Inseri novos fóruns cadastrados
    public function insertAval($titulo,$descricao){
        $titulo = trim($titulo);
        $descricao = trim($descricao);
        // consulta para saber se já existe um fórum com esse título
        $sql = "SELECT * from aval WHERE dsc_titulo_aval  = '$titulo'";
        $query = $this->db->query($sql);
        if($query->num_rows() == 0 ){
            $data = array (
                'dsc_titulo_aval' =>$titulo,
                'dsc_aval' => $descricao
                );
            $this->db->insert('aval',$data);
        }
        return 0;
    }
    public function deleteAval($idaval){
        $array = array (
            'idn_aval' => $idaval
        );
        $this->db->delete('aval',$array);
    }
}
