<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\TopicSuggestion;

class SuggestionController extends Controller
{
    //
    public function getList()
    {
        $suggestion = Suggestion::all();
        return view('admin.Suggestion.list')->with('suggestion',$suggestion);
    }

    public function getCreate()
    {
        $topicSuggestion = TopicSuggestion::all();
        return view('admin.Suggestion.create')->with('topicSuggestion', $topicSuggestion);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request,
       [
        'link'=>'required|unique:Suggestion,link'
       ],
       [
           'link.required'=>'Link is require!',
           'link.unique'=>'Link has existed',
       ]);
        $suggestion = new Suggestion;
        $suggestion->link = $request->link;
        $suggestion->id_topicSuggestion = $request->topicSuggestion;
        $suggestion->save();
        return redirect('admin/suggestion/create')->with('notification', 'Created');
    }

    public function getUpdate($id)
    {
        $topicSuggestion= TopicSuggestion::all();
        $suggestion = Suggestion::find($id);
        return view('admin.Suggestion.update',['suggestion'=>$suggestion],['topicSuggestion'=>$topicSuggestion]);
    }

    public function postUpdate(Request $request, $id)
    {
        $suggestion = Suggestion::find($id);
        $this->validate($request,
        [
         'link'=>'required|unique:Suggestion,link'
        ],
        [
            'link.required'=>'Link is require!',
            'link.unique'=>'Link has existed',
        ]);
        $suggestion->link = $request->link;
        $suggestion->id_topicSuggestion = $request->topicSuggestion;
        $suggestion->save();
        return redirect('admin/suggestion/update/'.$id)->with('notification','Updated');
    }

    public function getDelete($id)
    {
        
        $suggestion = Status::find($id);
        $suggestion->delete();
        
        return redirect('admin/suggestion/list')->with('notification','Deleted');
    }
}