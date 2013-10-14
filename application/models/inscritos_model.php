<?php

class Inscritos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listar_inscritos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('participantes');
        return $query->result();
    }
    
    public function total_inscritos() {
        $query = $this->db->get('participantes');
        return $this->db->count_all('participantes');
    }
    
    public function listar_todos(){
        $query = $this->db->get('participantes');
        return $query;
    }
}