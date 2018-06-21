<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

class Kalkulasils extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level')=="1") {
            redirect('admin/dashboard');
        } else if ($this->session->userdata('level')=="3") {
            redirect('instruktur/dashboard');
        } else if ($this->session->userdata('level') == NULL) {
            redirect('');
        } else {
            if($this->session->userdata('ls') == 0){
                redirect('siswa/kuesioner_ls');
            }
            else if($this->session->userdata('tr') == 0){
                redirect('siswa/kuesioner_tr');
            }
        }
    }

    public function kalkulasi($tipels){
        $dataLS = M_Learning_Style::where('usr_id',$this->session->userdata('id'))->first();
        $content_visit = $dataLS->ls_content_visit;
        $ques_graph = $dataLS->ls_ques_graphics;
        $ques_text = $dataLS->ls_ques_text;
        $forum_visit = $dataLS->ls_forum_visit;
        $forum_stay = $dataLS->ls_forum_stay;
        $forum_post = $dataLS->ls_forum_post;

        $ls = "";

        //Sensing INtuitive
        if($norm < 5){
            $ls = $ls.'s';
        }else{
            $ls = $ls.'n';
        }

        $cv_nilai = $this->calc($content_visit,20,10,13,16);
        $qg_nilai = $this->calc($ques_graph,10,5,6,8);
        $qt_nilai = $this->calc($ques_text,10,5,6,8);

        //Visual Verbal
        $sum = $cv_nilai + $qg_nilai + $qt_nilai;
        $hasil = $sum/6;

        $norm = ($hasil-1)/2;
        if($norm < 5){
            $ls = $ls.'v';
        }else{
            $ls = $ls.'a';
        }

        //ACtive Reflective
        if($norm < 5){
            $ls = $ls.'c';
        }else{
            $ls = $ls.'r';
        }

        //Sequential Global
        if($norm < 5){
            $ls = $ls.'q';
        }else{
            $ls = $ls.'g';
        }

        if($ls == 'svcq'){
            $this->svcq($lsn_id);
        }else if(){

        }
    }


    public function calc($value,$max,$min,$nilai1,$nilai2){
        if($value < $min){
            $a = 0; 
        }else if($value > $min && $value < $nilai1){
            $a = 1;
        }else if($value > $nilai1 && $value < $nilai2){
            $a = 2;
        }else {
            $a = 3;
        }
        return $a;
    }
}