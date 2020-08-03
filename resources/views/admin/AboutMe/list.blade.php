@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About Me
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover"
                   id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Introduce</th>
                        <th>Time</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aboutme as $am)
                    <tr class="odd gradeX"
                        align="center">
                        <td>{{$am->id}}</td>
                        <td>{{$am->introduce}}</td>
                        <td>{{$am->time}}</td>
                        <td><img width="100px"
                                 src="upload/img/{{$am->image}}"></td>
                        <td class="
                                 center"><i class="fa fa-trash-o  fa-fw"></i><a
                               href="admin/aboutme/delete/{{$am->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                               href="admin/aboutme/update/{{$am->id}}">Edit</a></td>
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