<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    //
    protected $table = 'Suggestion';
    public $timestamps = false;
    
    public function topicSuggestion()
    {
        return $this->belongsTo('App\TopicSuggestion','id_topicSuggestion','id');
    }
}