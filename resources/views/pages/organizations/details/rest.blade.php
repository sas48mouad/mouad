@extends('layouts.appfree')


@section('taptitle')
first sign in
@stop



@section('style')
<style type="text/css">
    .form-group{
        padding: 5px;
    }
</style>
@stop


@section('script')
<script type="text/javascript">

</script>
@stop



@section('content')
<div class="">
    <div class="row"
         <div style="width: 550px; margin: auto; margin-top: 8%; margin-bottom: 8%; ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Welcome {{$org->username}}, This Your Frist Login</h2>
                    <br>
                    <br>
                    <p style="float: right">enter your organization details</p>
                    <div class="clearfix"></div>
                </div>

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
                    <strong>Well Done!!</strong> rest time created successful<br><br>
                </div>
                @endif

                {!! Form::open(['url' => 'organizations/first-signin/rest-times/store',
                'role'=>'form' ,'method' => 'POST', 
                'class'=>'form-horizontal form-label-left input_mask']) !!}


                <div class="form-group group-input">
                    <div class="form-group group-input">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">daily rest :&nbsp; from </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="time" 
                                   required=""
                                   name="timefrom"
                                   class="form-control" >
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">to</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="time" 
                                   required=""
                                   name="timeto"
                                   class="form-control">
                        </div>
                    </div>
                </div>


                <input
                    type="hidden"
                    name="id"
                    value="{{$org->id}}"/>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-10">
                        <button type="submit" class="btn btn-success">add</button>
                    </div>

                </div>

                {!! Form::close() !!}



                <?php
                if (count($rests) > 0) {
                    ?>
                    <hr>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>time from</th>
                                <th>time to</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($rests as $rest) {
                                ?>
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td>{{$rest->timefrom}}</td>
                                    <td>{{$rest->timeto}}</td>
                                </tr>
                                <?php
                                $index++;
                            }
                            ?>

                        </tbody>
                    </table>
                    <?php
                }
                ?>
                <?php
                if (count($rests) > 0) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-10">
                        <a href="{{URL::to('organizations/first-signin/background/'.$org->id)}}" class="btn btn-primary">next <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>







</div>
</div>
@stop



@section('modal')

@stop

