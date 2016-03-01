@extends('header')

@section('nav')
    @if (Auth::check())
        <li class="active"><a href="../create">Create Flyer</a></li>
        <li><a href="{!! url('show/1') !!}">Show Flyer</a></li>
        <li><a href="#contact">Contact</a></li>

    @endif
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
