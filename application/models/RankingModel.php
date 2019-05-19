<?php

class RankingModel extends CI_Model {
    
    public function getAll() {
        $this->db->select('id_equipe');
        $this->db->select_sum('pontos');
        $this->db->group_by('id_equipe');
        $this->db->order_by('sum(pontos)','desc');
        $query = $this->db->get('pontuacao');
        return $query->result();
    }
    
}
