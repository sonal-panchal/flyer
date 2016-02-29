@inject('countries,'App\Http\Utilities\country')
@extends('header')
@section('nav')
    @if (Auth::check())
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{!! url('show/1') !!}">Show Flyer</a></li>
        <li><a href="#contact">Contact</a></li>

    @endif
    @endsection
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('flash_msg'))
        <div class="alert alert-success">
            <ul>
                    success
            </ul>
        </div>
    @endif
    <center><h3>Seeling at Your home???</h3></center>
    <hr>
    <div class="col-md-6 col-md-offset-3">
    <form enctype="multipart/form-data" method="post" action="flyer">
        {!! csrf_field() !!}
        <fieldset class="form-group">
            <label for="street">Street:</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street">
        </fieldset>
        <fieldset class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
        </fieldset>
        <fieldset class="form-group">
            <label for="zip">ZipCode</label>
            <input type="text" class="form-control" id="zip" placeholder="Enter zip" name="zip">
        </fieldset>
        <fieldset class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country" name="country">
                @foreach($countries::all() as $name=>$country)
                <option value="{!! $country  !!}">{!! $name !!}</option>
                @endforeach
            </select>
        </fieldset>


        <fieldset class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
        </fieldset>
        <fieldset class="form-group">
            <label for="price">Photoes</label>
            <input type="file" class="form-control" id="image" placeholder="Enter price" name="image">
        </fieldset>
        <fieldset class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </fieldset>
        <button type="submit" class="btn btn-primary">Create Flyer</button>
    </form>
    </div>

    @endsection