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


    // public function kalkulasi(){
    //     // $dataLS = M_Learning_Style::where('usr_id',$this->session->userdata('id'))->first();
    //     // $content_visit = $dataLS->ls_content_visit;
    //     // $ques_graph = $dataLS->ls_ques_graphics;
    //     // $ques_text = $dataLS->ls_ques_text;
    //     // $forum_visit = $dataLS->ls_forum_visit;
    //     // $forum_stay = $dataLS->ls_forum_stay;
    //     // $forum_post = $dataLS->ls_forum_post;

    //     $ls = "";

    //     //Sensing INtuitive
    //     $sum = 8 + 4 + 7;
    //     $hasil = $sum/5;

    //     $norm1 = ($hasil-1)/2;
    //     if($norm1 > 2){
    //         $ls = $ls.'s';
    //     }else{
    //         $ls = $ls.'n';
    //     }

    //     // $cv_nilai = $this->calc($content_visit,20,10,13,16);
    //     // $qg_nilai = $this->calc($ques_graph,10,5,6,8);
    //     // $qt_nilai = $this->calc($ques_text,10,5,6,8);

    //     //Visual Verbal
    //     // $cv_nilai = $this->calc($content_visit,20,10,13,16);
    //     // $qg_nilai = $this->calc($ques_graph,10,5,6,8);
    //     // $qt_nilai = $this->calc($ques_text,10,5,6,8);

    //     // $sum = $cv_nilai + $qg_nilai + $qt_nilai;
    //     // $hasil = $sum/6;

    //     // $norm = ($hasil-1)/2;
    //     $sum = 9 + 4 + 2;
    //     $hasil = $sum/3;

    //     $norm2 = ($hasil-1)/2;

    //     if($norm2 < 3){
    //         $ls = $ls.'v';
    //     }else{
    //         $ls = $ls.'a';
    //     }

    //     //ACtive Reflective
    //     $sum = 4 + 1 + 8;
    //     $hasil = $sum/6;

    //     $norm3 = ($hasil-1)/2;

    //     if($norm3 > 1){
    //         $ls = $ls.'c';
    //     }else{
    //         $ls = $ls.'r';
    //     }

    //     //Sequential Global
    //     $sum = 3 + 9 + 1;
    //     $hasil = $sum/4;

    //     $norm4 = ($hasil-1)/2;

    //     if($norm4 < 1){
    //         $ls = $ls.'q';
    //     }else{
    //         $ls = $ls.'g';
    //     }
    //     return $ls;
        
    // }
    public function kalkulasi($id){
        $dataLS = M_Learning_Style::where('usr_id',$id)->first();
        $content_visit = $dataLS->ls_content_visit;
        $content_stay = $dataLS->ls_content_stay;
        $outline_visit = $dataLS->ls_outline_visit;
        $outline_stay = $dataLS->ls_outline_stay;
        $example_visit = $dataLS->ls_example_visit;
		$example_stay = $dataLS->ls_example_stay;
		$selfass_visit = $dataLS->ls_selfass_visit;
		$selfass_stay = $dataLS->ls_selfass_stay;
		$exercise_visit = $dataLS->ls_exercise_visit;
		$exercise_stay = $dataLS->ls_exercise_stay;
        $ques_graph = $dataLS->ls_ques_graphics;
        $ques_text = $dataLS->ls_ques_text;
        $ques_detail = $dataLS->ls_ques_detail;
        $ques_facts = $dataLS->ls_ques_facts;
        $ques_overview = $dataLS->ls_ques_overview;
        $ques_interpret = $dataLS->ls_ques_interpret;
        $ques_concepts = $dataLS->ls_ques_concepts;
        $ques_develop = $dataLS->ls_ques_develop;
        $ques_stay_results = $dataLS->ls_quiz_stay_result;
        $forum_visit = $dataLS->ls_forum_visit;
        $forum_stay = $dataLS->ls_forum_stay;
        $forum_post = $dataLS->ls_forum_post;
        $nav_skip = $dataLS->ls_nav_skip;
        $nav_overview_visit = $dataLS->ls_nav_overview_visit;

        $ls = "";

        //Sensing Intuitive done
		$cv_nilai = $this->calc($content_visit,20,10,13,16);
        $cs_nilai = $this->calc($content_stay,17,10,13,15);
        $xv_nilai = $this->calc($example_visit,17,10,13,15);
        $xs_nilai = $this->calc($example_stay,17,10,13,15);
        $sv_nilai = $this->calc($selfass_visit,20,10,13,16);
        $ss_nilai = $this->calc($selfass_stay,17,10,13,15);
        $ev_nilai = $this->calc($exercise_visit,20,8,10,14);
        $qt_nilai = $this->calc($ques_detail,10,5,7,8);
        $qf_nilai = $this->calc($ques_facts,10,5,7,8);
        $qd_nilai = $this->calc($ques_develop,10,5,7,8);
        $qs_nilai = $this->calc($ques_stay_results,10,5,7,8);

        $sum = $cv_nilai + $cs_nilai + $xv_nilai + $xs_nilai + $sv_nilai + $ss_nilai + $ev_nilai + $qt_nilai + $qf_nilai +  $qd_nilai + $qs_nilai;
        $hasil1 = $sum/11;

        $norm1 = ($hasil1-1)/2;
		
        if($norm1 < 0.55){
            $ls = $ls.'s';
        }else{
            $ls = $ls.'n';
        }

        //Visual Verbal done
		$cv_nilai = $this->calc($content_visit,20,10,13,16);
        $qg_nilai = $this->calc($ques_graph,10,5,7,8);
        $qx_nilai = $this->calc($ques_text,10,5,7,8);
		$fv_nilai = $this->calc($forum_visit,15,5,7,10);
		$fp_nilai = $this->calc($forum_post,10,2,4,5);
		$fs_nilai = $this->calc($forum_stay,300,120,140,180); //detik
		
        $sum = $cv_nilai + $qg_nilai + $qx_nilai + $fv_nilai + $fp_nilai + $fs_nilai;
        $hasil2 = $sum/6;

        $norm2 = ($hasil2-1)/2;
		
        if($norm2 < 0.55){
            $ls = $ls.'v';
        }else{
            $ls = $ls.'a';
        }

        //ACtive Reflective done
		$cv_nilai = $this->calc($content_visit,20,10,13,16); //$value,$max,$min,$nilai1,$nilai2
		$cs_nilai = $this->calc($content_stay,17,10,13,15);
		$os_nilai = $this->calc($outline_stay,17,10,13,15);
		$xs_nilai = $this->calc($example_stay,17,10,13,15);
		$sv_nilai = $this->calc($selfass_visit,20,10,13,16);
		$ss_nilai = $this->calc($selfass_stay,17,10,13,15);
		$ev_nilai = $this->calc($exercise_visit,20,8,11,14);
        $es_nilai = $this->calc($exercise_stay,17,10,13,15);
        $qs_nilai = $this->calc($ques_stay_results,10,5,7,8);
		$fv_nilai = $this->calc($forum_visit,15,5,7,10);
		$fp_nilai = $this->calc($forum_post,10,2,4,5);
		
		
		$sum = $cv_nilai + $cs_nilai + $os_nilai + $xs_nilai + $sv_nilai + $ss_nilai+ $ev_nilai+ $es_nilai+ $fv_nilai+ $fp_nilai + $qs_nilai;
        $hasil3 = $sum/11;

        $norm3 = ($hasil3-1)/2;
		
        if($norm3 < 0.55){
            $ls = $ls.'c';
        }else{
            $ls = $ls.'r';
        }

        //Sequential Global done
        $ov_nilai = $this->calc($outline_visit,17,10,13,15);
        $os_nilai = $this->calc($outline_stay,17,10,13,15);
        $qt_nilai = $this->calc($ques_detail,10,5,7,8);
        $qo_nilai = $this->calc($ques_overview,10,5,7,8);
        $qi_nilai = $this->calc($ques_interpret,10,5,7,8);
        $qd_nilai = $this->calc($ques_develop,10,5,7,8);
        $ns_nilai = $this->calc($nav_skip,10,5,7,8);
        $no_nilai = $this->calc($nav_overview_visit,10,5,7,8);

        $sum = $ov_nilai + $os_nilai + $qt_nilai + $qo_nilai + $qi_nilai + $qd_nilai+ $ns_nilai+ $no_nilai;
        $hasil4 = $sum/8;

        $norm4 = ($hasi4-1)/2;


        if($norm4 < 0.55){
            $ls = $ls.'q';
        }else{
            $ls = $ls.'g';
        }
        return $ls;
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

?>