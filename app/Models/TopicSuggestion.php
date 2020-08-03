<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicSuggestion extends Model
{
    //
    protected $table = "TopicSuggestion";
    public $timestamps = false;

    public function suggestion()
    {
        return $this->hasMany('App\Suggestion','id_topicSuggestion','id');
    }
}