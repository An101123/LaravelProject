@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Suggestion
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7"
                 style="padding-bottom:120px">
                <form action="admin/suggestion/create"
                      method="POST">
                    <input type="hidden"
                           name="_token"
                           value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control"
                               name="link"
                               placeholder="Please Enter Link" />
                    </div>
                    <div class="form-group">
                        <label>Topic Suggestion</label>
                        <select class="form-control"
                                name="topicSuggestion">
                            @foreach($topicSuggestion as $tS)
                            <option value="{{$tS->id}}">"{{$tS->name}}"</option>
                            @endforeach
                        </select>
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