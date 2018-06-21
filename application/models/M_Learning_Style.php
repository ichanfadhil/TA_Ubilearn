<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Learning_Style extends Eloquent
{
    protected $table = 'learning_style';
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
    protected $primaryKey = 'ls_id';

    public function user()
    {
        return $this->belongsTo('M_User', 'usr_id');
    }

    public function insert($data)
    {
        $insert = new M_Learning_Style;
        $insert->usr_id = $data['usr_id'];
        return $insert->save();
    }

    public function kalkulasi(){
        // $dataLS = M_Learning_Style::where('usr_id',$this->session->userdata('id'))->first();
        // $content_visit = $dataLS->ls_content_visit;
        // $ques_graph = $dataLS->ls_ques_graphics;
        // $ques_text = $dataLS->ls_ques_text;
        // $forum_visit = $dataLS->ls_forum_visit;
        // $forum_stay = $dataLS->ls_forum_stay;
        // $forum_post = $dataLS->ls_forum_post;

        $ls = "";

        //Sensing INtuitive
        $sum = 8 + 4 + 7;
        $hasil = $sum/5;

        $norm1 = ($hasil-1)/2;
        if($norm1 < 5){
            $ls = $ls.'s';
        }else{
            $ls = $ls.'n';
        }

        // $cv_nilai = $this->calc($content_visit,20,10,13,16);
        // $qg_nilai = $this->calc($ques_graph,10,5,6,8);
        // $qt_nilai = $this->calc($ques_text,10,5,6,8);

        //Visual Verbal
        // $cv_nilai = $this->calc($content_visit,20,10,13,16);
        // $qg_nilai = $this->calc($ques_graph,10,5,6,8);
        // $qt_nilai = $this->calc($ques_text,10,5,6,8);

        // $sum = $cv_nilai + $qg_nilai + $qt_nilai;
        // $hasil = $sum/6;

        // $norm = ($hasil-1)/2;
        $sum = 9 + 4 + 2;
        $hasil = $sum/3;

        $norm2 = ($hasil-1)/2;

        if($norm2 < 6){
            $ls = $ls.'v';
        }else{
            $ls = $ls.'a';
        }

        //ACtive Reflective
        $sum = 4 + 1 + 8;
        $hasil = $sum/6;

        $norm3 = ($hasil-1)/2;

        if($norm3 < 1){
            $ls = $ls.'c';
        }else{
            $ls = $ls.'r';
        }

        //Sequential Global
        $sum = 3 + 9 + 1;
        $hasil = $sum/4;

        $norm4 = ($hasil-1)/2;

        if($norm4 < 3){
            $ls = $ls.'q';
        }else{
            $ls = $ls.'g';
        }
        return $ls;
        // if($ls == 'svcq'){
        //     $this->svcq($lsn_id);
        // }else if(){

        // }
    }


}

?>