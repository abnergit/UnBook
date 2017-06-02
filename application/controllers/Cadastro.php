<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
		
	public function index()
	{
		// carrega o cabeçalho da página, bootstrap, javascript e etc...
		$this->load->view('comum/header');
		// carrega o modelo com os dados do banco 
		$this->load->model('cadastro_model');
		// carrega a view de cadastro 	
		$this->load->view('cadastro');
		// carrega o footer da página, por enquanto sem nada 
		$this->load->view('comum/footer');
	}

	public function realizaCadastro(){
	    // recebe o valor do campo nome
	    $nome = $this->input->post('dsc_nome');
	    // recebe o valor do campo cpf
	    $cpf = $this->input->post('nu_cpf');
	    // recebe o valor do campo email
	    $email = $this->input->post('dsc_email');
	    // recebe o valor do campo senha
	    $senha = $this->input->post('senha');
	    // recebe o valor do campo matricula
	    $matricula = $this->input->post('nu_matricula');

	    $this->load->model('cadastro_model');

        $objModel = new cadastro_model();
        $cadastro = $objModel->cadastraPessoa($nome,$cpf,$email,$senha,$matricula);
        if($cadastro == 0 ){
            redirect(base_url());
        }
        else{
            redirect('cadastro');
        }
    }

}
