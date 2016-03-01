@extends('header')
@section('nav')

    <li class="active"><a href="create">Create Flyer</a></li>
    <li><a href="{!! url('show/1') !!}">Show Flyer</a></li>
    <li><a href="#contact">Contact</a></li>

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
