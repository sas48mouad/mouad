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
                    <strong>Well Done!!</strong> organization account created successful<br><br>
                </div>
                @endif

                {!! Form::open(['url' => 'organizations/first-signin/storeorgdetails',
                'role'=>'form' ,'method' => 'POST', 
                'class'=>'form-horizontal form-label-left input_mask']) !!}


                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">name </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" 
                               required=""
                               name="name"
                               class="form-control" 
                               placeholder="full name">
                    </div>
                </div>
                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">phone </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="number" 
                               required=""
                               name="phone"
                               class="form-control" 
                               placeholder="phone">
                    </div>
                </div>
                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">type </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <select class="form-control" name="type">
                            <?php
                            foreach ($types as $type) {
                                ?>
                                <option value="{{$type->id}}">{{$type->title}}</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>


                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Address region</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <select class="form-control" name="region">
                            <?php
                            foreach ($regions as $region) {
                                ?>
                                <option value="{{$region->id}}">{{$region->name}}</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">state</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <select class="form-control" name="state">
                            <?php
                            foreach ($states as $state) {
                                ?>
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">location</label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" 
                               required=""
                               name="lat"
                               class="form-control" 
                               placeholder="lat">
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" 
                               required=""
                               name="lan"
                               class="form-control" 
                               placeholder="lan">
                    </div>
                </div>
                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">description </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea
                            required
                            value="{{old('desc') }}"
                            name="desc"
                            class="form-control form-textarea" rows="3"></textarea>

                    </div>
                </div>
                <div class="form-group group-input" style="margin-top: 15px;">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">appointment duration </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="number" 
                               required=""
                               min="1"
                               name="duration"
                               class="form-control" 
                               placeholder="appointment duration time">

                    </div>
                </div>
                <div class="form-group group-input" style="margin-top: 15px;">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">rest </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="number" 
                               required=""
                               min="1"
                               name="rest"
                               class="form-control" 
                               placeholder="rest between appointments duration">

                    </div>
                </div>
                <input
                    type="hidden"
                    name="id"
                    value="{{$org->id}}"/>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-10">
                        <button type="submit" class="btn btn-primary">next <i class="fa fa-arrow-right"></i></button>
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

@stop

