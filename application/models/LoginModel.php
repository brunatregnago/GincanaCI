<?php

class LoginModel extends CI_Model {
   public function getUsuario($email, $senha){
        $this->db->where('email', $email);
        $this->db->where('senha', sha1($senha . 'brunaSENAC'));

        $query = $this->db->get('usuario');
        return $query->row(0);        
    }

    public function verificaLogin(){
        $logado    = $this->session->userdata('logado');
        $idUsuario = $this->session->userdata('idUsuario');
        if ((!isset($logado)) || ($logado != true) || ($idUsuario <= 0)) {
            redirect($this->config->base_url() . 'Usuario/login');
        }
    }
}
