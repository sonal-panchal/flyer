<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
   <h1>All card</h1>
    <ul>
    @foreach($cards as $val)
        <a href="index/{!! $val->id !!}"><li>{!! $val->title !!}</li></a>
        @endforeach
    </ul>
</div>
</body>
</html>
