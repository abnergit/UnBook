<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Carrega a biblioteca de teste
        $this->load->library('unit_test');
        // Carrega o model de cadastro
        $this->load->model('cadastro_model');
    }
    
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


        $objModel = new cadastro_model();
        $cadastro = $objModel->cadastraPessoa($nome,$cpf,$email,$senha,$matricula);
        if($cadastro == 0 ){
            redirect(base_url());
        }
        else{
            redirect('cadastro');
        }
    }
    /* Como executar a função de teste
        1 - Vá ao terminal e navegue até o diretorio da pasta /projeto
        2 - Execute o comando php index.php <nome_da_classe> <nome_da_funçao_de_teste>
        Ex: php index.php Cadastro realizaCadastroTeste
    */
    public function realizaCadastroTeste(){
	    // Testa a função cadastraPessoa que retorna 0 se cadastramos um cpf que não existe no banco
        $objModel = new cadastro_model();
        $test = $objModel->cadastraPessoa('Luiz','04274488161','lp.lobofilho@gmail.com','algumaSenha' ,12000);
        $expected_result = 0  ;
        $test_name = 'Cadastrar novo usuário no banco';
        $str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} | {result}'.PHP_EOL.'{/rows}';
        $this->unit->set_template($str_template);
        echo $this->unit->run($test, $expected_result, $test_name);
    }


}
