<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Course_Forum_Thread_Reply_Reply_Reply extends Eloquent
{
    protected $table = 'course_forum_thread_reply_reply_reply';
    protected $primaryKey = 'rrr_id';
    const CREATED_AT = 'rrr_timecreated';
    const UPDATED_AT = 'rrr_timemodified';

    public function insert_thread_reply_reply_reply($data)
    {
        $thread = new M_Course_Forum_Thread_Reply_Reply_Reply;
        $thread->rrr_content = $data['rrr_content'];
        $thread->trr_id = $data['trr_id'];
        $thread->usr_id = $data['usr_id'];
        $thread->save();

        //Forum Visit
        //cek udah ada usernya atau belum di learning_style
        $cek_user_ada = M_Learning_Style::where('usr_id', $data['usr_id'])->first();
        if (!$cek_user_ada) {
            $ls_data['usr_id'] = $data['usr_id'];
            $this->M_Learning_Style->insert($ls_data);
            $forum_post = M_Learning_Style::where('usr_id', $data['usr_id'])
                ->increment('ls_forum_post', 1);
        } else {
            $forum_post = M_Learning_Style::where('usr_id', $data['usr_id'])
                ->increment('ls_forum_post', 1);
        }
        

        return $thread->rrr_id;
    }

    public function update_rating_reply_reply_reply($data)
    {
        $thread = M_Course_Forum_Thread_Reply_Reply_Reply::where('rrr_id','=',$data['rrr_id'])->first();
        $thread->rrr_ratingsum = $data['rrr_ratingsum'];
        $thread->rrr_ratingcount = $data['rrr_ratingcount'];
        
        return $thread->save();
    }
    
}

?>