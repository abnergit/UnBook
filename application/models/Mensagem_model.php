<?php

/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 31/05/2017
 * Time: 16:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem_model extends CI_Model {

    public function getMensagens($idforum){

        $sql = "select 
                  dsc_nome, dsc_mensagem 
                from 
                  pessoa p 
                inner join 
                  mensagem m 
                on 
                  p.idn_pessoa = m.pessoa_idn_pessoa 
                where 
                  forum_idn_forum = $idforum;";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function insertMensagens($idnPessoa,$mensagem,$idnForum){
        $data = array
        (
            'pessoa_idn_pessoa' => $idnPessoa,
            'dsc_mensagem' => $mensagem,
            'forum_idn_forum' => $idnForum
        );
        $this->db->insert('mensagem', $data);
        return 0;
    }
}


