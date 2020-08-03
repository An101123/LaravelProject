@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Status
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7"
                 style="padding-bottom:120px">
                @if(count($errors)>0)
                <div class='alert alert-danger'>
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if(session('notification'))
                <div class="alert alert-success">
                    {{session('notification')}}
                </div>
                @endif
                <form action="admin/status/create"
                      method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden"
                           name="_token"
                           value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control"
                               name="title"
                               placeholder="Please Enter Status Title" />
                    </div>
                    <div class="form-group">
                        <label>Topic Status</label>
                        <select class="form-control"
                                name="topicStatus">
                            @foreach ($topicStatus as $topic)
                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="demo"
                                  class="form-control ckeditor"
                                  name="content"
                                  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file"
                               class="form-control"
                               name="image"
                               placeholder="Please Enter Status Title" />
                    </div>
                    <button type="submit"
                            class="btn btn-default">Add</button>
                    <button type="reset"
                            class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection