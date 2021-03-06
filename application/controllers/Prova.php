<?php

/**
 * Class Prova do controller 
 * 15/04/2019
 * @author b
 */
defined('BASEPATH')OR exit('No direct script access allowed');

class Prova extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
        $this->LoginModel->verificaLogin();
        
        $this->load->model('ProvaModel');
    }

    public function index() {//método padrão para chamar quando nenhum outro é solicitado
        $this->lista();
    }

    public function lista() {
        $dados['provas'] = $this->ProvaModel->getAll();
        $this->load->view('Header');
        $this->load->view('ListaProva', $dados);
        $this->load->view('Footer');
    }

    public function cadastro() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('tempo', 'tempo', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('NIntegrantes', 'NIntegrantes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormProva');
            $this->load->view('Footer');
        } else {

            $dados = array(
                'nome' => $this->input->post('nome'),
                'tempo' => $this->input->post('tempo'),
                'descricao' => $this->input->post('descricao'),
                'NIntegrantes' => $this->input->post('NIntegrantes')
            );

            if ($this->ProvaModel->inserir($dados)) {
                $this->session->set_flashdata('mensagem', 'Prova cadastrada.');
                redirect('Prova/lista');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar');
                redirect('Prova/cadastro');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('tempo', 'tempo', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');
            $this->form_validation->set_rules('NIntegrantes', 'NIntegrantes', 'required');

            if ($this->form_validation->run() == false) {
                $dados['provas'] = $this->ProvaModel->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormProva', $dados);
                $this->load->view('Footer');
            } else {
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'tempo' => $this->input->post('tempo'),
                    'descricao' => $this->input->post('descricao'),
                    'NIntegrantes' => $this->input->post('NIntegrantes')
                );
                if ($this->ProvaModel->update($id, $dados)) {
                    $this->session->set_flashdata('mensagem', 'Alterado com sucesso.');
                    redirect('Prova/lista');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar prova.');
                    redirect('Prova/alterar/' . $id);
                }
            }
        }
    }
    public function deletar($id) {
        if ($id > 0) {
            if ($this->ProvaModel->delete($id > 0)) {
                $this->session->set_flashdata('mensagem', 'Prova deletada.');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar.');
            }
        }
        redirect('Prova/lista');
    }

}
