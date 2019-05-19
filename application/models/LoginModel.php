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
    
    public function getAll() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert('usuario', $data);
        return $this->db->affected_rows();
    }

    public function getOne($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('usuario');
        return $query->row(0);
    }
    
    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update('usuario', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('usuario');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
