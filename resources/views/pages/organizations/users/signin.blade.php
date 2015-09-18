@extends('layouts.appfree')


@section('taptitle')
signin
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
<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            
            <section class="login_content">
                {!! Form::open(['url' => 'organizations/login',
                'role'=>'form' ,'method' => 'POST', 
                'class'=>'form-horizontal form-label-left input_mask']) !!}
                <h1>Mouad System</h1>
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
                <div>
                    <input type="email"
                           name="email"
                           class="form-control" 
                           placeholder="email" 
                           required="" />
                </div>
                <div>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Password" 
                           required="" />
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Log in</button>
                    <button type="reset" class="btn btn-danger">Lost your password?</button>
                </div>
                <div class="clearfix"></div>
                {!! Form::close() !!}
                <!-- form -->
            </section>
            <!-- content -->
        </div>

    </div>
    @stop



    @section('modal')

    @stop

