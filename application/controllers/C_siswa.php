<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

class C_siswa extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level')=="3") {
            redirect('instruktur/dashboard');
        } else if ($this->session->userdata('level')=="1") {
            redirect('admin/dashboard');
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

    public function index()
    {

    }

    public function dashboard_siswa()
    {
        //course lates
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/dashboard_siswa';
        $cenr = new M_Course_Enrol;
        $data['list_course'] = $cenr->selectByUser($this->session->userdata('id'),5);
        $ans = new M_Course_Assesment_Question_Answer_Of_Student;
        $ansStd = $ans->selectByUser($this->session->userdata('id'));
        $ass = new M_Course_Assesment;
        $i = 0;
        $listAss = array();
        foreach($ansStd as $c){
            $listAss[$i] = $ass->select($c->ass_id);
            $i++;
        }
        //forum lates
        $threadlast = new M_Course_Forum_Thread;
        $data['list_thread'] = $threadlast->selectByUser($this->session->userdata('id'),5);
        $data['listAss'] = $listAss;
        $data['ansStd'] = $ansStd;

        //Outline Stay
        if (strpos($this->agent->referrer(), 'siswa/course_detail') !== FALSE) {

            $event = array(
                'usr_id'            => $this->session->userdata('id'),
                'log_event_context' => "Dashboard:" . " " . $this->session->userdata('username'),
                'log_referrer'      => $this->input->server('REQUEST_URI'),
                'log_name'          => "Dashboard",
                'log_origin'        => $this->agent->agent_string(),
                'log_ip'            => $this->input->server('REMOTE_ADDR'),
                'log_desc'          => $this->session->userdata('username'). " "
                    ."melakukan aksi Dashboard"
            );
            $this->lib_event_log->add_user_event($event);

            $waktu_sekarang = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            
            $waktu_sebelum = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->where('log_name', "View Course")
                    ->orderBy('log_time', 'DESC')->first()->log_time;

            $lama_stay = strtotime($waktu_sekarang) - strtotime($waktu_sebelum);
            $hari    = floor($lama_stay/(60*60*24));   
            $jam   = floor(($lama_stay-($hari*60*60*24))/(60*60));   
            $menit = floor(($lama_stay-($hari*60*60*24)-($jam*60*60))/60);

            //cek udah ada usernya atau belum di learning_style
            $cek_user_ada = M_Learning_Style::where('usr_id', $this->session->userdata('id'))->first();
            if (!$cek_user_ada) {
            $ls_data['usr_id'] = $this->session->userdata('id');
            $this->M_Learning_Style->insert($ls_data);
            $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                    ->increment('ls_outline_stay', $lama_stay);
            } else {
            $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                    ->increment('ls_outline_stay', $lama_stay);
            }
        }

        //Quiz Result Stay
        if ((strpos($this->agent->referrer(), 'siswa/result') !== FALSE)
            || (strpos($this->agent->referrer(), 'assesment/result') !== FALSE)) {
            
            $event = array(
                'usr_id'            => $this->session->userdata('id'),
                'log_event_context' => "Dashboard:" . " " . $this->session->userdata('username'),
                'log_referrer'      => $this->input->server('REQUEST_URI'),
                'log_name'          => "Dashboard",
                'log_origin'        => $this->agent->agent_string(),
                'log_ip'            => $this->input->server('REMOTE_ADDR'),
                'log_desc'          => $this->session->userdata('username'). " "
                    ."melakukan aksi Dashboard"
            );
            $this->lib_event_log->add_user_event($event);

            $waktu_sekarang = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            
            $waktu_sebelum = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->where('log_name', "View Assessment Result")
                    ->orderBy('log_time', 'DESC')->first()->log_time;

            $lama_stay = strtotime($waktu_sekarang) - strtotime($waktu_sebelum);
            $hari    = floor($lama_stay/(60*60*24));   
            $jam   = floor(($lama_stay-($hari*60*60*24))/(60*60));   
            $menit = floor(($lama_stay-($hari*60*60*24)-($jam*60*60))/60);

            //cek udah ada usernya atau belum di learning_style
            $cek_user_ada = M_Learning_Style::where('usr_id', $this->session->userdata('id'))->first();
            if (!$cek_user_ada) {
            $ls_data['usr_id'] = $this->session->userdata('id');
            $this->M_Learning_Style->insert($ls_data);
            $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                    ->increment('ls_quiz_stay_result', $lama_stay);
            } else {
            $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                    ->increment('ls_quiz_stay_result', $lama_stay);
            }
        }

        //Content Video, Text, Example Stay
        if (strpos($this->agent->referrer(), 'content/contents') !== FALSE) {
            
            $event = array(
                'usr_id'            => $this->session->userdata('id'),
                'log_event_context' => "Dashboard:" . " " . $this->session->userdata('username'),
                'log_referrer'      => $this->input->server('REQUEST_URI'),
                'log_name'          => "Dashboard",
                'log_origin'        => $this->agent->agent_string(),
                'log_ip'            => $this->input->server('REMOTE_ADDR'),
                'log_desc'          => $this->session->userdata('username'). " "
                    ."melakukan aksi Dashboard"
            );
            $this->lib_event_log->add_user_event($event);

            $waktu_sekarang = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            
            if ($this->session->userdata('tipekonten') == "Example") {
                $waktu_sebelum = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->where('log_name', "View Content Example")
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            } else if ($this->session->userdata('tipekonten') == "Video") {
                $waktu_sebelum = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->where('log_name', "View Content Video")
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            } else if ($this->session->userdata('tipekonten') == "Text") {
                $waktu_sebelum = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->where('log_name', "View Content Text")
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            } 
            
            $lama_stay = strtotime($waktu_sekarang) - strtotime($waktu_sebelum);
            $hari    = floor($lama_stay/(60*60*24));   
            $jam   = floor(($lama_stay-($hari*60*60*24))/(60*60));   
            $menit = floor(($lama_stay-($hari*60*60*24)-($jam*60*60))/60);

            //cek udah ada usernya atau belum di learning_style
            $cek_user_ada = M_Learning_Style::where('usr_id', $this->session->userdata('id'))->first();
            if (!$cek_user_ada) {
                $ls_data['usr_id'] = $this->session->userdata('id');
                $this->M_Learning_Style->insert($ls_data);
                
                if ($this->session->userdata('tipekonten') == "Example") {
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_example_stay', $lama_stay);
                } else if ($this->session->userdata('tipekonten') == "Video") {
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay', $lama_stay);
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay_video', $lama_stay);
                } else if ($this->session->userdata('tipekonten') == "Text") {
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay', $lama_stay);
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay_text', $lama_stay);
                }                
            } else {
                if ($this->session->userdata('tipekonten') == "Example") {
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_example_stay', $lama_stay);
                } else if ($this->session->userdata('tipekonten') == "Video") {
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay', $lama_stay);
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay_video', $lama_stay);
                } else if ($this->session->userdata('tipekonten') == "Text") {
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay', $lama_stay);
                    $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                        ->increment('ls_content_stay_text', $lama_stay);
                }
            }
        }

        //Forum Stay
        if (strpos($this->agent->referrer(), 'siswa/detail_thread_siswa') !== FALSE) {
            
            $event = array(
                'usr_id'            => $this->session->userdata('id'),
                'log_event_context' => "Dashboard:" . " " . $this->session->userdata('username'),
                'log_referrer'      => $this->input->server('REQUEST_URI'),
                'log_name'          => "Dashboard",
                'log_origin'        => $this->agent->agent_string(),
                'log_ip'            => $this->input->server('REMOTE_ADDR'),
                'log_desc'          => $this->session->userdata('username'). " "
                    ."melakukan aksi Dashboard"
            );
            $this->lib_event_log->add_user_event($event);

            $waktu_sekarang = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->orderBy('log_time', 'DESC')->first()->log_time;
            
            $waktu_sebelum = M_Log::where('usr_id', $this->session->userdata('id'))
                    ->where('log_name', "View Thread")
                    ->orderBy('log_time', 'DESC')->first()->log_time;

            $lama_stay = strtotime($waktu_sekarang) - strtotime($waktu_sebelum);
            $hari    = floor($lama_stay/(60*60*24));   
            $jam   = floor(($lama_stay-($hari*60*60*24))/(60*60));   
            $menit = floor(($lama_stay-($hari*60*60*24)-($jam*60*60))/60);

            //cek udah ada usernya atau belum di learning_style
            $cek_user_ada = M_Learning_Style::where('usr_id', $this->session->userdata('id'))->first();
            if (!$cek_user_ada) {
            $ls_data['usr_id'] = $this->session->userdata('id');
            $this->M_Learning_Style->insert($ls_data);
            $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                    ->increment('ls_forum_stay', $lama_stay);
            } else {
            $outline_stay = M_Learning_Style::where('usr_id', $this->session->userdata('id'))
                    ->increment('ls_forum_stay', $lama_stay);
            }
        }

        $this->load->view('layout/master', $data);

    }

    public function forum_siswa()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/forum_siswa';
        $this->load->view('layout/master',$data);
    }

    public function assignment_opening()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/assignment_opening';
        $this->load->view('layout/master', $data);

    }

    public function assesment_doing($id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/assesment_doing';
        $this->load->view('layout/master', $data);

    }


    public function exercise_doing()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/exercise_doing';
        $this->load->view('layout/master', $data);

    }

    public function result($id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/result';
        $data['assesment']=  M_Course_Assesment::leftJoin("course","course.crs_id","=","course_assesment.crs_id")
            ->where("ass_id","=", $id)
            ->first();


        $data['course'] = M_Course::leftJoin('users','users.usr_id', '=','course.usr_id')
            ->where("crs_id", '=',$data['assesment']->crs_id)
            ->first();
        $this->load->view('layout/master', $data);
    }

    public function assignment_detail($asg_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/assignment_detail';
        $data['assignment']=  M_Course_Assignment::leftJoin("course","course.crs_id","=","course_assignment.crs_id")
            ->where("asg_id","=", $asg_id)
            ->first();
        $this->load->view('layout/master', $data);

    }

//sensing
    public function latihanSensing1($lsn_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sensing1';
        $data['lsn_id'] = $lsn_id;
        $this->load->view('layout/master', $data);
    }
    public function latihanSensing2($lsn_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sensing2';        $data['lsn_id'] = $lsn_id;

        $this->load->view('layout/master', $data);
    }
    public function latihanSensing3($lsn_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sensing3';        $data['lsn_id'] = $lsn_id;

        $this->load->view('layout/master', $data);
    }

    //intuitive
    public function latihanIntuitive1($lsn_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/intuitive1';        $data['lsn_id'] = $lsn_id;

        $this->load->view('layout/master', $data);
    }
    public function latihanIntuitive2($lsn_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/intuitive2';        $data['lsn_id'] = $lsn_id;

        $this->load->view('layout/master', $data);
    }
    public function latihanIntuitive3($lsn_id)
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/intuitive3';        $data['lsn_id'] = $lsn_id;

        $this->load->view('layout/master', $data);
    }
    public function pretest()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/pretest';
        $this->load->view('layout/master', $data);
    }
    public function course_materi()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/course_materi';
        $this->load->view('layout/master', $data);
    }

    public function list_thread_siswa()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/list_thread_siswa';
        $this->load->view('layout/master', $data);
    }

    public function detail_thread_siswa()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/detail_thread_siswa';
        $this->load->view('layout/master', $data);
    }

    public function add_thread_siswa()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/add_thread_siswa';
        $this->load->view('layout/master', $data);
    }

    public function edit_thread_siswa()
    {
        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/edit_thread_siswa';
        $this->load->view('layout/master', $data);
    }

    //learning style
    public function svcq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        // $data['pretest1'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%Tree')->first();
        // $data['kuis1'] = M_Course_Assesment::where('lsn_id',$lsn_id)->first();
        // $lesen = M_Course_Lesson::where();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();
        $data['lsn_id'] = $lsn_id;
        
        

        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/svcq';
        $this->load->view('layout/master',$data);
    }
    public function svrq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();
        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/svrq';
        $this->load->view('layout/master',$data);
    }
    public function svrg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/svrg';
        $this->load->view('layout/master',$data);
    }
    public function svcg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/svcg';
        $this->load->view('layout/master',$data);
    }
    public function sacq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;

        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sacq';
        $this->load->view('layout/master',$data);
    }
    public function sarq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sarq';
        $this->load->view('layout/master',$data);
    }
    public function sacg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sacg';
        $this->load->view('layout/master',$data);
    }
    public function sarg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;

        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/sarg';
        $this->load->view('layout/master',$data);
    }
//intuitive
    public function nvcq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();
        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/nvcq';
        $this->load->view('layout/master',$data);
    }
    public function nvrq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/nvrq';
        $this->load->view('layout/master',$data);
    }
    public function nvrg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();

        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;



        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/nvrg';
        $this->load->view('layout/master',$data);
    }
    public function nvcg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_video'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Video')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/nvcg';
        $this->load->view('layout/master',$data);
    }
    public function nacq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/nacq';
        $this->load->view('layout/master',$data);
    }
    public function narq($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/narq';
        $this->load->view('layout/master',$data);
    }
    public function nacg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/nacg';
        $this->load->view('layout/master',$data);
    }
    public function narg($lsn_id)
    {
        $data['course'] = M_Course_Lesson::leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->leftJoin('users','users.usr_id','=','course.usr_id')
        ->where('course_lesson.lsn_id',$lsn_id)
        ->first();

        $data['contents_teks'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Text')->get();
        $data['contents_example'] = M_Course_Content::leftJoin('course_lesson','course_lesson.lsn_id','=','course_content.lsn_id')
        ->leftJoin('course','course.crs_id','=','course_lesson.crs_id')
        ->where('course_content.lsn_id',$lsn_id)->where('course_content.cnt_type','Example')->get();

        $data['forum1'] = M_Course_Forum::where('lsn_id',$lsn_id)->first();
        $data['latihan'] = M_Course_Assesment::where('ass_tipe','Exercise')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();
        $data['kuis'] = M_Course_Assesment::where('ass_tipe','Kuis')->where('ass_name','LIKE','%'.substr($data['course']->lsn_name,4))->first();

        $data['lsn_id'] = $lsn_id;


        $data['sidebar'] = 'layout/sidebar';
        $data['content'] = 'siswa/narg';
        $this->load->view('layout/master',$data);
    }
    
}
