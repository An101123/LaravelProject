@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Status
                    <small>List</small>
                </h1>
            </div>
            @if(session('notification'))
            <div class="alert alert-success">
                {{session('notification')}}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover"
                   id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Topic</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($status as $stt)
                    <tr class="odd gradeX"
                        align="center">
                        <td>{{$stt->id}}</td>
                        <td>{{$stt->title}}</td>
                        <td>{{$stt->content}}</td>
                        <td>{{$stt->topicStatus->name}}</td>
                        <td>
                            <img width="100px"
                                 src="upload/img/{{$stt->image}}"
                                 alt="">
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                               href="admin/status/delete/{{$stt->id}}">
                                Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                               href="admin/status/update/{{$stt->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection