@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Topic Status
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
                        <th>Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topicStatus as $topic)
                    <tr class="odd gradeX"
                        align="center">
                        <td>{{$topic->id}}</td>
                        <td>{{$topic->name}}</td>
                        <td class="center">
                            <i class="fa fa-trash-o  fa-fw"></i>
                            <a href="admin/TopicStatus/delete/{{$topic->id}}">Delete</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                               href="admin/TopicStatus/update/{{$topic->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- <script type="text/javascript">
function deleteTopic(url) {
    if (confirm("ban muon xoa ?")) {
        document.location.href = url;
    }
</script> -->
@endsection