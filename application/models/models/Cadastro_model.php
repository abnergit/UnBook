<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_model extends CI_Model {
		
	public function cadastraPessoa($nome,$cpf,$email,$senha,$matricula)
	{
        $cpf = str_replace('-','',$cpf);
        $cpf = str_replace('.','',$cpf);


        $sql = "SELECT * from pessoa WHERE nu_cpf = '$cpf'";
        // consulta se o cpf já existe no banco
        $query = $this->db->query($sql);

        if($query->result_array() == null ) {
            $data =
                array(
                    'dsc_nome' => $nome,
                    'nu_cpf' => $cpf,
                    'dsc_email' => $email,
                    'senha' => $senha,
                    'nu_matricula' => $matricula
                );
            // executa o insert na tabela pessoa
            $this->db->insert('pessoa', $data);
            return 0;
        }
        else{
            return 1;
        }

    }
}
