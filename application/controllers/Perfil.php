<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
		
	public function index()
    {
        $this->load->library('session');
        $this->load->model('home_model');
        $dados = $this->session->userdata('login');

        // carrega o cabeçalho da página, bootstrap, javascript e etc...
        $this->load->view('comum/header');
        $this->load->view('comum/menuLogged');
        echo "<br><br><br><br><br><br>";
        echo "<article class=\"row\"><div id=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1\"><div class=well>";
        echo "<ul>";
        foreach ($dados[0] as $dado)
        {
            echo "<h5>".$dado."</h5></br>";
        }
        echo "</ul>                </div>
            </div>
        </div>
    </div></article>";
        // carrega o footer da página, por enquanto sem nada
        $this->load->view('comum/footer');
	}
}
