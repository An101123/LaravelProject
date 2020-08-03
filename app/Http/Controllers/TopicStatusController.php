<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopicStatus;
class TopicStatusController extends Controller
{
    //
    public function getList()
    {
        $topicStatus = TopicStatus::all();
        return view('admin.TopicStatus.list',['topicStatus'=>$topicStatus]);
    }
    public function getCreate()
    {
        return view('admin.TopicStatus.create');
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
       ]
    );
    $topicStatus= new TopicStatus;
    $topicStatus->name=$request->name;
    $topicStatus->save();

    return redirect('admin/TopicStatus/create')->with('notification','Created');
    }

    public function getUpdate($id)
    {
        $topicStatus = TopicStatus::find($id);
        return view('admin.TopicStatus.update',['topicStatus'=>$topicStatus]);

    }
    public function postUpdate(Request $request, $id)
    {
        $topicStatus = TopicStatus::find($id);
        $this->validate($request,
        [
            'name'=>'required|unique:TopicStatus,name|max:100'
        ],
        [
            'name.required'=> 'Name is require!',
            'name.unique'=>'Name has existed',
            'name.max'=>'The largest length of the name is 100 characters'
        ]
    );
    $topicStatus->name=$request->name;
    $topicStatus->save();
    return redirect('admin/TopicStatus/update/'.$id) ->with('notification','Updated');
    }

    public function getDelete($id)
    {
        $topicStatus= TopicStatus::find($id);
        $topicStatus->delete();
        return redirect('admin/TopicStatus/list')->with('notification','Deleted');
    }
}