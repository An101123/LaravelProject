<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table ="Status";
    public $timestamps = false;

    public function topicStatus()
    {
        return $this->belongsTo('App\TopicStatus','id_topicStatus','id');
    }
}