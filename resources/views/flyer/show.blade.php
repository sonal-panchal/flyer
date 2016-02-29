@extends('header')
@section('nav')
    @if (Auth::check())
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{!! url('show/1') !!}">Show Flyer</a></li>
        <li><a href="#contact">Contact</a></li>

    @endif
 chjggxhjgh
    vcfghx

@endsection
@section('content')
    <div class="container">

        <h1>{!! $record->street !!}</h1><br>
        <h4>
            <table class="table table-striped">
                <tr>
                    <td>Country:</td>
                    <td>{!! $record->country !!}</td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td>{!! $record->city !!}</td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>{!! $record->desc !!}</td>
                </tr>
                <tr>
                    <td>Zip:</td>
                    <td>{!! $record->zip !!}</td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>Rs. {!! $record->price !!}</td>
                </tr>

            </table>
        </h4>
        <hr>
        <div class="col-md-8 col-md-offset-3">
            <div class="col-md-9">
                @foreach($record['flyer_photo']->chunk(4) as $set)
                    <div class="row">
                        @foreach($set as $photo)
                            <div class="col-md-3">
                                <form action="{{url('deleteimage/'.$photo->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="Delete" class="btn-danger">
                                </form>

                                <a href="{!! asset('flyers/photo/'.$photo->image) !!}" data-lity>
                                    <img src="{!! asset('flyers/photo/th'.$photo->image) !!}" width="100px" height="100px"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <hr>


    <form action="../storeImage/{!! $record->id !!}" class="dropzone" method="post" id="addPhotosForm">
        {!! csrf_field()  !!}
    </form>
@endsection

@section('script.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'file',
            acceptedFiles: '.jpg,.jpeg'
        };
    </script>
@endsection