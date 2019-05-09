<?php

defined('BASEPATH')OR exit('No direct script access allowed');

class Equipe extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
        $this->LoginModel->verificaLogin();
    }
    
    public function index(){
        $this->listaEquipe();
    }
    
    public function listaEquipe(){
        $this->load->model('EquipeModel', 'em');
        $data['equipe'] = $this->em->getAll();
        
        $this->load->view('Header');
        $this->load->view('ListaEquipe', $data);
        $this->load->view('Footer');
    }
    
    public function cadastro(){
        $this->form_validation->set_rules('nome', 'nome', 'required');
        
        if($this->form_validation->rum() == false){
            $this->load->view('Header');
            $this->load->view('FormEquipe');
            $this->load->view('Footer');
        }else{
            $this->load->model('EquipeModel');
            
            $data = array(
                'nome' => $this->input->post('nome')
            );
            
            if($this->EquipeModel->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Equipe cadastrada.');
                redirect('Equipe/listaEquipe');
            }else{
                
            }
        }
    }
}
