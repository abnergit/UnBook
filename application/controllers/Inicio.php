<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
		
	public function index()
	{
        $this->load->library('session');
	    $dados = $this->session->userdata('login');
        // carrega o cabeçalho da página, bootstrap, javascript e etc...
        $this->load->view('comum/header');
        $this->load->view('comum/menuLogged');
        // carrega a view de cadastro
        $this->load->view('inicio', array('data'=> $dados));
        // carrega o footer da página, por enquanto sem nada
        $this->load->view('comum/footer');
	}
}
?>