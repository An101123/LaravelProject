<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicStatus extends Model
{
    //
    protected $table = "TopicStatus";
    public $timestamps = false;

    public function status()
    {
        return $this->hasMany('App\Status','id_topicStatus','id');
    }
}