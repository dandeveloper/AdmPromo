<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public $IdUsuario;

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'usuarios');
        $validar = $this->session->userdata('usuario', 'senha', 'logado');
        if (!$validar) {
            $this->session->sess_destroy();
            redirect(base_url('index.php/login'));
        }
    }
    
    public function index() {
        $this->load->library('table');
        $dados['usuarios'] = $this->usuarios->getall_usuarios();
        $this->load->view('usuarios', $dados);
    }
    
    public function detalhes_usuario() {
        $id = $this->uri->segment(3);
        $data['dados_usuario'] = $this->usuarios->get_usuario($id);
        $this->load->view('detalhes_usuario', $data);
    }
    
    public function deleta_usuario() {
        $this->IdUsuario = $this->uri->segment(3);
        if ($this->usuarios->deleta_usuario($this->IdUsuario)) {
            $this->session->set_flashdata('deletaok', 'Usuário Deletado com Sucesso!');
            redirect(base_url('index.php/usuarios'));
        } else {
            $this->session->set_flashdata('deletaerro', 'Não foi possível Deletar o Usuário!');
            redirect(base_url('index.php/usuarios'));
        }
    }
    
    public function atualiza_usuario() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('SenhaUsuario', 'Senha', 'trim|required|min_length[5]|max_length[32]');
        $this->form_validation->set_rules('confirma_senha', 'Confirme a Senha', 'trim|required|min_length[5]|max_length[32]|matches[SenhaUsuario]');
        if ($this->form_validation->run() != false) {
            $dadosForm = $this->input->post();
            $this->usuarios->do_update($dadosForm, array('IdUsuario' => $this->input->post('id')));
            $this->session->set_flashdata('atualizaok', 'Usuário Atualizado com Sucesso!');
            redirect(base_url('index.php/usuarios/detalhes_usuario/' . $this->input->post('id')));            
        } else {
            $this->session->set_flashdata('atualizaerro', 'Não foi possível Atualizar o Usuário!');
            $id = $this->uri->segment(3);
            $data['dados_usuario'] = $this->usuarios->get_usuario($this->IdUsuario);
            $this->load->view('detalhes_usuario', $data);
        }
    }
}