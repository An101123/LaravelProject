<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopicSuggestion;
class TopicSuggestionController extends Controller
{
    //
    public function getList()
    {
        $topicSuggestion = TopicSuggestion::all();
        return view('admin.TopicSuggestion.list', ['topicSuggestion'=>$topicSuggestion]);
    }

    public function getCreate()
    {
        return view('admin.TopicSuggestion.create');
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, 
        [
            'name'=>'required|unique:TopicStatus,name|max:100'
        ],
        [
            'name.required'=>'Name is require!',
            'name.unique'=>'Name has existed',
            'name.max'=>'The largest length of the name is 100 characters'
        ]);
        $topicSuggestion= new TopicSuggestion;
        $topicSuggestion->name=$request->name;
        $topicSuggestion->summary=$request->summary;
        $topicSuggestion->save();
        return redirect('admin/topicSuggestion/create')->with('notification','Created');
    }

    public function getUpdate($id)
    {
        $topicSuggestion = TopicSuggestion::find($id);
        return view('admin/topicSuggestion/update')->with('topicSuggestion', $topicSuggestion);
    }

    public function postUpdate(Request $request, $id)
    {
        $topicSuggestion = TopicSuggestion::find($id);
        $this->validate($request,
        [
            'name'=>'required|unique:TopicStatus,name|max:100',
            'summary'=>'max:500'
        ],
        [
            'name.required'=>'Name is require!',
            'name.unique'=>'Name has existed',
            'name.max'=>'The largest length of the name is 100 characters',
            'summary'=>'The largest length of the summary is 100 characters'
        ]
        );
        $topicSuggestion->name = $request->name;
        $topicSuggestion->summary = $request->summary;
        $topicSuggestion->save();
        return redirect('admin/topicSuggestion/update/'.$id)->with('notification', 'Updated');
    }

    public function getDelete($id)
    {
        $topicSuggestion = TopicSuggestion::find($id);
        $topicSuggestion->delete();
        return redirect('admin/topicSuggestion/list')->with('notification','Deleted');
    }
}