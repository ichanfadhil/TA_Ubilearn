<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class ajax_m extends Eloquent
{
    public function insert($data)
    {
        if ($data['mode'] == "OFF") {
            $mode = "OFF";
        } else {
            $mode = $data['mode'];
        }
        
        $cek_heula = M_Learning_Goal::where('usr_id', $data['usr_id'])->first();
        if (!$cek_heula) {

            $insert = new M_Learning_Goal;
            $insert->usr_id = $data['usr_id'];
            $insert->mode = $mode;
            return $insert->save();
        } else {
            $cek_heula->usr_id = $data['usr_id'];
            $cek_heula->mode = $mode;
            return $cek_heula->save();
        }
    }

    public function get_mode($data){
    $users = DB::table('rekomendasi_mode')->where('usr_id', $data['usr_id'])->first();
    return $users;
    }

}