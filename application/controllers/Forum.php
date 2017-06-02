<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forum  extends CI_Controller {

    public function index()
    {
        // carrega o cabeçalho da página, bootstrap, javascript e etc...
        $this->load->view('comum/header');
        $this->load->view('comum/menuLogged');
        $this->load->model('forum_model');
        // cria o objeto que recebe os dados da model
        $objModel = new forum_model();
        $dadosForum = $objModel->getForuns();
        // carrega a view de forum
        $this->load->view('forum', array('dados' => $dadosForum) );
        // carrega o footer da página, por enquanto sem nada
        $this->load->view('comum/footer');
    }

}