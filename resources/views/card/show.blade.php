<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">

      {!! $id->title !!}
<br>
        @foreach($id->notes as $n)

            {{$n->body}}
            <br>
        @endforeach
</div>
</body>
</html>
