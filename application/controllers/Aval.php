<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aval  extends CI_Controller {

    public function index()
    {
        // carrega o cabeçalho da página, bootstrap, javascript e etc...
        $this->load->view('comum/header');
        $this->load->view('comum/menuLogged');
        $this->load->model('aval_model');
        // cria o objeto que recebe os dados da model
        $objModel = new aval_model();
        $dadosAval = $objModel->getAvals();
        // carrega a view de Aval
        $this->load->view('aval', array('dados' => $dadosAval) );
        // carrega o footer da página, por enquanto sem nada
        $this->load->view('comum/footer');
    }
    public function cadastrarAval () {
        $titulo = $this->input->post('inputTituloAval');
        $descricao = $this->input->post('inputDscAval');
        $this->load->model('aval_model');
        $objModel = new aval_model();
        $return = $objModel->insertAval($titulo,$descricao);
        if($return == 0 ){
            redirect('/aval');
        }
    }
    public function deletarAval(){
        $idaval = $this->input->get('id');
        print_r($idaval);
        $this->load->model('aval_model');
        // cria o objeto que recebe os dados da model
        $objModel = new aval_model();
        $objModel->deleteAval($idaval);
        redirect('/aval');

    }
}
