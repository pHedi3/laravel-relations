<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="..\css\app.css">
</head>
<body>
    <div class="container show">
        <a href="{{route('article.index')}}"><button>torna all'index</button></a>
        <div class="row">
            <div class="article d-flex align-content-stretch  col-6">
                <div class="back row">
                    <h1 class="col-12">{{$article->title}}</h1>
                    <h3 class="col-6">{{$article->author->name}} {{$article->author->surname}}</h3>
                    <p class="col-12">{{$article->text}}</p>
                    <img class="col-6 offset-6" src="{{$article->image}}" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>