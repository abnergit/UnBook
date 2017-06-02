<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {
    public function getForuns(){
        return $this->db->get('forum')->result();
    }

}