<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inscritos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $validar = $this->session->userdata('usuario', 'senha', 'logado');
        if (!$validar) {
            $this->session->sess_destroy();
            redirect(base_url('index.php/login'));
        }
    }

    public function index() {
        $this->load->model('inscritos_model', 'inscritos');        
        $dados['total_inscritos'] = $this->inscritos->total_inscritos();
        $config['base_url'] = base_url('index.php/inscritos/index/');
        $config['total_rows'] = $this->inscritos->total_inscritos();
        $config['per_page'] = 20;
        $config['uri_segment']  = 3;
        $config['first_link'] = 'Primeiro';
        $config['last_link'] = 'Último';
        $config['prev_link']   = "<";
        $config['next_link']    = ">";
        $this->pagination->initialize($config);
        $dados['paginacao'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados['results'] = $this->inscritos->listar_inscritos($config['per_page'], $page);
        $this->load->view('inscritos', $dados);        
    }

}