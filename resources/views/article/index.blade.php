<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href=".\css\app.css">
</head>
<body>
    <div class="container index">
        <div class="row">
            <div class="col-12">
                <a href="{{route('article.create')}}"><button class="btn btn-primary">+ article</button></a>
            </div>
            @foreach ($allArticle as $item)
            <div class="article d-flex align-content-stretch  col-6">
                <a class="d-flex align-content-stretch" href="{{route('article.show', $item)}}">
                    <div class="back row">
                        <h1 class="col-12">{{$item->title}}</h1>
                        <h3 class="col-6">{{$item->author->name}} {{$item->author->surname}}</h3>
                        <p class="col-12">{{$item->text}}</p>
                        <div class="col-6">
                            @foreach ($item->tags as $tag)
                                <div class="tag">{{$tag->tag}}</div>
                            @endforeach
                        </div>
                        <img class="col-6" src="{{$item->image}}" alt="">
                    </div>
                </a>
            </div>
                
            @endforeach

        </div>
    </div>
</body>
</html>