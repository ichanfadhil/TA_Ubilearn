<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level')=="2") {
            redirect('siswa/dashboard');
        } else if ($this->session->userdata('level')=="3") {
            redirect('instruktur/dashboard');
        } else if ($this->session->userdata('level') == NULL) {
            redirect('');
        }
        $this->load->model("ajax_m");  
    }

    public function ajax_button()
    {
        $data = array(
        "usr_id" => $this->session->userdata("id"),
        "mode" => $this->input->post("databutton")
        );
        $this->ajax_m->insert($data);
        dd($data["mode"]);
        $this->load->view('layout_admin/master', $data);

    }

}
