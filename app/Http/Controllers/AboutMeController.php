<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutMe;

class AboutMeController extends Controller
{
    //
    public function getList()
    {
        $aboutme = AboutMe::all();
        return view('admin.AboutMe.list')->with('aboutme', $aboutme);
    }
    public function getCreate()
    {
        return view('admin.AboutMe.create');
    }
    public function postCreate(Request $request)
    {
        // echo "<pre>";
        // var_dump($request);exit;
        $this->validate($request,
        [
            'introduce'=>'required',
            'time'=>'required',
            'image'=>'required'
        ],
        [
            'introduce.required'=>'Introduce is require!',
            'time.required'=>'Time has existed',
            'iamge.required'=>'Image has existed',

        ]); 
            $aboutme = new AboutMe;
            $aboutme->introduce = $request->introduce;
            $aboutme->time=$request->time;
            $aboutme->image=$request->image;
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
                $aboutme->image=$name;
            }
            $aboutme->save();
        return redirect('admin/aboutme/create')->with('notification','Created');
    }
    public function getUpdate($id)
    {
        $aboutme = AboutMe::find($id);
        return view('admin.AboutMe.update',['aboutme'=>$aboutme]);
    }
    public function postUpdate(Request $request, $id)
    {
        // var_dump($request->file('image111'));exit;
        $aboutme = AboutMe::find($id);
        $this->validate($request,
        [
            'introduce'=>'required',
            'time'=>'required',
            'image'=>'required'
        ],
        [
            'introduce.required'=>'Introduce is require!',
            'time.required'=>'Time has existed',
            'iamge.required'=>'Image has existed',

        ]); 
            $aboutme->introduce = $request->introduce;
            $aboutme->time=$request->time;
            // $status->image=$request->image;
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
                $aboutme->image=$name;
            }
            // var_dump($status);exit;
            $aboutme->save(); 
        return redirect('admin/aboutme/update/'.$id)->with('notification','Updated');
    }

    public function getDelete($id)
    {
        
        $aboutme = AboutMe::find($id);
        $aboutme->delete();
        
        return redirect('admin/aboutme/list')->with('notification','Deleted');
    }
}