<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public $IdUSuario;
    public $LoginUsuario;
    public $SenhaUsuario;

    function __construct() {
        parent::__construct();
    }

    public function getall_usuarios() {
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    public function validar_login($usuario, $senha) {
        $this->db->where('LoginUsuario', $usuario);
        $this->db->where('SenhaUsuario', $senha);
        $this->db->where('Ativo', 1);
        $query = $this->db->get('usuarios');
        if ($query->num_rows == 1 && $query->row()->Ativo == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleta_usuario($id = NULL) {
        if ($id != NULL) {
            $this->db->where('IdUsuario', $id);
            $this->db->delete('usuarios');
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_usuario($id) {
        $this->db->where('IdUsuario', $id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->result();
    }

    public function do_update($dados = NULL, $condicao = NULL) {
        if ($dados != NULL) {
            $this->db->update('usuarios', $dados, $condicao);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}