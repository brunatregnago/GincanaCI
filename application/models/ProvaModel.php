<?php

/**
 * model
 * 15/04/2019
 * @author b
 */
class ProvaModel extends CI_Model {

    public function getAll() {
        //nome da tabela no DB
        $query = $this->db->get('prova');
        return $query->result();
    }

    public function inserir($dados = array()) {
        $this->db->insert('prova', $dados);
        return $this->db->affected_rows();
    }

    public function getOne($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('prova');
        return $query->row(0);
    }

    public function update($id, $dados = array()) {
        if ($id > 0) {
            //filtra o cliente que será alterado 
            $this->db->where('id', $id);
            //altera os dados de acordo com o recebido por parametro
            $this->db->update('prova', $dados);
            //retorno do número de linhas afetadas
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('prova');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}