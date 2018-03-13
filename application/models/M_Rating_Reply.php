<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Rating_Reply extends Eloquent
{
    protected $table = 'rating_reply';
    protected $primaryKey = 'rry_id';
    const CREATED_AT = 'rry_timecreated';
    const UPDATED_AT = NULL;

    public function insert_rating_reply($data)
    {
        $rating = new M_Rating_Reply;
        $rating->ftr_id = $data['ftr_id'];
        $rating->usr_id = $data['usr_id'];
        $rating->rry_rated = $data['rry_rated'];
        return $rating->save();
    }
    
}

?>