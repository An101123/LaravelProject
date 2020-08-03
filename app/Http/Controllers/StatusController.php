<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\TopicStatus;
class StatusController extends Controller
{
    //
    public function getList()
    {
        $status = Status::all();
        return view('admin.Status.list')->with('status', $status);
        // return view('admin.Status.list')->compact('status');
        // return view('admin.Status.list',['status'=>$status]);
    }
    public function getCreate()
    {
        $topicStatus= TopicStatus::all();

        return view('admin.Status.create',['topicStatus'=>$topicStatus]);
    }
    public function postCreate(Request $request)
    {
        // echo "<pre>";
        var_dump($request);exit;
        $this->validate($request,
        [
            'title'=>'required|unique:Status,title|max:100'
        ],
        [
            'title.required'=>'Title is require!',
            'title.unique'=>'Title has existed',
            'title.max'=>'The largest length of the title is 100 characters'
        ]); 
            $status = new Status;
            $status->title = $request->title;
            $status->content=$request->content;
            $status->image=$request->image;
            $status->id_topicStatus = $request->topicStatus;
            // $status->image="";

            if($request->hasFile('image')) {
                
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                // $status->image=$file->getClientOriginalName();
                // var_dump("upload/img/".$name);exit;
                // $path = $name;
                $file->move('upload\img', $name);
                // $name = $file->getClientOriginalName();
                // $image = str_random(4)."_".$name;
                $status->image=$name;
            }
            $status->save();
        return redirect('admin/status/create')->with('notification','Created');
    }
    public function getUpdate($id)
    {
        $topicStatus= TopicStatus::all();
        $status = Status::find($id);
        return view('admin.Status.update',['status'=>$status],['topicStatus'=>$topicStatus]);
    }
    public function postUpdate(Request $request, $id)
    {
        // var_dump($request->file('image111'));exit;
        $status = Status::find($id);
        $this->validate($request,
        [
            'title'=>'required|max:100'
        ],
        [
            'title.required'=>'Title is require!',
            'title.max'=>'The largest length of the title is 100 characters'
        ]); 
            $status->title = $request->title;
            $status->content=$request->content;
            // $status->image=$request->image;
            $status->id_topicStatus = $request->topicStatus;
            // $st->all->hasFile('image'));exit;
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                // $status->image=$file->getClientOriginalName();
                // var_dump("upload/img/".$name);exit;
                // $path = $name;
                $file->move('upload\img', $name); 
                // $name = $file->getClientOriginalName();
                // $image = str_random(4)."_".$name;
                $status->image=$name;
            }
            // var_dump($status);exit;
            $status->save(); 
        return redirect('admin/status/update/'.$id)->with('notification','Updated');
    }

    public function getDelete($id)
    {
        
        $status = Status::find($id);
        $status->delete();
        
        return redirect('admin/status/list')->with('notification','Deleted');
    }

}