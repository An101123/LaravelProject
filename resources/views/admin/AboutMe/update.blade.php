@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
                </h1>
            </div>
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
            <!-- /.col-lg-12 -->
            <div class="col-lg-7"
                 style="padding-bottom:120px">
                <form action="admin/aboutme/update/{{$aboutme->id}}"
                      method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden"
                           name="_token"
                           value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Introduce</label>
                        <input class="form-control"
                               name="introduce"
                               placeholder="Please Enter introduce"
                               value="{{$aboutme->introduce}}" />
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="datetime-local"
                               class="form-control"
                               name="time"
                               placeholder="Please Enter Time"
                               value="{{$aboutme->time}}" />
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <p>
                            <img width="400px"
                                 src="upload/img/{{$aboutme->image}}"
                                 alt="">
                        </p>
                        <input type="file"
                               class="form-control"
                               name="image"
                               placeholder="" />
                    </div>
                    <button type="submit"
                            class="btn btn-default">Category Edit</button>
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