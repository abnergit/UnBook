<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getPessoas()
	{
		return $this->db->get('pessoa')->result();
	}

	public function getPessoa($email)
    {
        $this->db->select('*');
        $this->db->from('pessoa');
        return $this->db->where('dsc_email',$email);

    }
}
