<html>
    <head>
    </head>
    <body>
        @foreach($drinks as $drink)
            <div>
                <h2>{{$drink->name}}</h2>
                <span>{{$drink->origin}}</span>
                <p>{{$drink->ingredients}}</p>
                <h4>{{$drink->price}}</h4>
            </div>
        @endforeach
    </body>
</html>