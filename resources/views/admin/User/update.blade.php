@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
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
                <form action="admin/user/update/{{$user->id}}"
                      method="POST">
                    <input type="hidden"
                           name="_token"
                           value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control"
                               name="name"
                               placeholder="Please Enter Category Name"
                               value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                               class="form-control"
                               name="email"
                               placeholder="Please Enter Category Name"
                               value="{{$user->email}}"
                               readonly="" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox"
                               id="changePassword"
                               name="changePassword">
                        <label>Change Password</label>
                        <input type="password"
                               class="form-control password"
                               name="password"
                               placeholder="Please Enter Password"
                               disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Password Confirm</label>
                        <input type="password"
                               class="form-control password"
                               name="passwordConfirm"
                               placeholder="Please Enter Password Confirm"
                               disabled="" />
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
<script type="text/javascript">
$(document).ready(function() {
    $("#changePassword").change(function() {
        if ($(this).is(":checked")) {
            $(".password").removeAttr('disabled');
        } else {
            $(".password").attr('disabled', '');
        }
    })
});
</script>
@endsection