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
        <div class="x_panel" style="height:450px;">
            <div class="x_title">
                <h2>create new user</h2>
                <div class="clearfix"></div>



                <div class="x_content">

                    <br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($organizations as $organization) {
                                ?>
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td>{{$organization->name}}</td>
                                    <td>{{$organization->email}}</td>
                                    <td>{{$organization->phone}}</td>
                                    <td>{{ $organization->creator }}</td>
                                    <td>{{ $organization->orge_created_at }}</td>
                                    <td style="width: 50px;">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>&nbsp;edit
                                        </button></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>

                    <div class="text-center">
                        {!! $organizations->render() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>



</div>
@stop



@section('modal')
page title
@stop



