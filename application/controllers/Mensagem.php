
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Carrega a biblioteca de teste
        $this->load->library('unit_test');
        // Carrega o model de cadastro
        $this->load->model('mensagem_model');
        // Carrega as variáveis de sessão
        $this->load->library('session');

    }

    public function index()
    {
        $idforum = $this->input->get('id');
        $dscforum = $this->input->get('forum');
        $this->load->model('Mensagem_model');

        // cria o objeto que recebe os dados da model
        $objModel = new mensagem_model();
        $mensagens = $objModel->getMensagens($idforum);
        $this->load->view('comum/header');
        $this->load->view('comum/menuLogged');
        $this->load->view('mensagem',array('mensagens' => $mensagens, 'tituloForum' => $dscforum, 'idForum' => $idforum));

    }

    public function inserirMensagem()
    {
        $mensagem = $this->input->post('inputMensagem');
        $login = $this->session->userdata('login');
        $idForum = $this->input->post('inputForum');
        $idnPessoa = $login[0]['idn_pessoa'];
        $objModel = new mensagem_model;
        $insert = $objModel->insertMensagens($idnPessoa,$mensagem,$idForum);
        if($insert == 0 ){
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

    }

}



