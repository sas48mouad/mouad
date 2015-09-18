@extends('layouts.app')


@section('taptitle')
System Users
@stop


@section('pagetitle')
System Users
@stop

@section('frontnav')
@include('navbar.frontnav')
@stop

@section('toptnav')
@include('navbar.topnav')
@stop


@section('style')
<script type="text/css">

</script>
@stop


@section('script')
<script type="text/javascript">

</script>
@stop



@section('content')
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" >
            <div class="x_title">
                <h2>create new user</h2>
                <div class="clearfix"></div>

                

                <div class="x_content">
                    
                    <br>
                    
                    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Sorry!!&nbsp;</strong>something has gone wrong<br><br>
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }} <i class="fa fa-exclamation"></i></li>
                        @endforeach
                    </ol>
                </div>
                @endif
                
                @if (Session::pull('forminserted', 'false') == 'true')
                <div class="alert alert-success">
                    <strong>Well Done!!</strong> user account created successful<br><br>
                </div>
                @endif

                    {!! Form::open(['url' => 'system-user/create-new/store',
                    'role'=>'form' ,'method' => 'POST', 
                    'class'=>'form-horizontal form-label-left input_mask']) !!}

                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">name </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" 
                                   required=""
                                   value="{{old('username') }}"
                                   name="username"
                                   class="form-control" 
                                   placeholder="user name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">email </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="email" 
                                   required=""
                                   value="{{old('email') }}"
                                   name="email"
                                   class="form-control" 
                                   placeholder="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">password </label>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                            <input type="password" 
                                   required=""
                                   min="6"
                                   max="10"
                                   value="{{old('password') }}"
                                   name="password"
                                   class="form-control" 
                                   placeholder="password">
                        </div>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                            <input type="password" 
                                   min="6"
                                   max="10"
                                   value="{{old('repassword') }}"
                                   required=""
                                   name="repassword"
                                   class="form-control" 
                                   placeholder="repassword">
                        </div>
                    </div>

                    <input type="hidden" 
                           name="usertype"
                           value="0">

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">role </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" name="userrole">
                                <?php
                                foreach ($roles as $role) {
                                    ?>
                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6">
                            <button type="submit" class="btn btn-success">create</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>



</div>
@stop



@section('modal')
page title
@stop

