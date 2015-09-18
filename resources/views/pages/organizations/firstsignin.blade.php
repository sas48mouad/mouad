@extends('layouts.appfree')


@section('taptitle')
first sign in
@stop



@section('style')
<style type="text/css">
    .group-input{
       margin-bottom: 30px;
       background: #000000;
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


         <div style="width: 550px; margin: auto; margin-top: 12%">
            <div class="x_panel" style="height:250px;">
                <div class="x_title">
                    <h2>Frist Login</h2>

                    <div class="clearfix"></div>
                </div>

                {!! Form::open([ 'method' => 'POST']) !!}


                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">name </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="name" 
                               required=""
                               value="{{old('name') }}"
                               name="name"
                               class="form-control" 
                               placeholder="name">
                    </div>
                </div>
                
                <div class="form-group group-input">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">role </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <select class="form-control" name="userrole">
                                <option value="3">gheith</option>
                        </select>
                    </div>
                </div>




                <ul>
                    <li>
                        {!! Form::label('address_state', 'Address_state:') !!}
                        {!! Form::text('address_state') !!}
                    </li>
                    <li>
                        {!! Form::label('address_region', 'Address_region:') !!}
                        {!! Form::text('address_region') !!}
                    </li>
                    <li>
                        {!! Form::label('location_cordinate_lat', 'Location_cordinate_lat:') !!}
                        {!! Form::text('location_cordinate_lat') !!}
                    </li>
                    <li>
                        {!! Form::label('location_cordinate_lan', 'Location_cordinate_lan:') !!}
                        {!! Form::text('location_cordinate_lan') !!}
                    </li>
                    <li>
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description') !!}
                    </li>
                    <li>
                        {!! Form::label('organization', 'Organization:') !!}
                        {!! Form::text('organization') !!}
                    </li>
                    <li>
                        {!! Form::label('appointment_duration', 'Appointment_duration:') !!}
                        {!! Form::text('appointment_duration') !!}
                    </li>
                    <li>
                        {!! Form::label('appointment_rest', 'Appointment_rest:') !!}
                        {!! Form::text('appointment_rest') !!}
                    </li>
                    <li>
                        {!! Form::submit() !!}
                    </li>
                </ul>
                {!! Form::close() !!}


            </div>
        </div>
    </div>




</div>
</div>
@stop



@section('modal')

@stop

