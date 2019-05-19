<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->LoginModel->verificaLogin();
    }
    
    public function index() {
        $this->lista();
    }

    public function lista() {
        $this->load->model('RankingModel');
        $data['ranking'] = $this->RankingModel->getAll();
        $this->load->view('Header');
        $this->load->view('ListaRanking', $data);
        $this->load->view('Footer');
    }

}
