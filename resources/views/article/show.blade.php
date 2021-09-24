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
        <div class="row">
            <div class="col-12 button">
                <a href="{{route('article.index')}}"><button class="btn btn-primary">Index</button></a>
                <a href="{{route('article.edit', $article)}}"><button class="btn btn-primary">Modifica</button></a>
                <form action="{{route('article.destroy', $article)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Destroy</button>
                </form>
            </div>
            <div class="article d-flex align-content-stretch  col-6">
                <div class="back row">
                    <h1 class="col-12">{{$article->title}}</h1>
                    <h3 class="col-6">{{$article->author->name}} {{$article->author->surname}}</h3>
                    <p class="col-12">{{$article->text}}</p>
                    <div class="col-6">
                        @foreach ($article->tags as $tag)
                            <div class="tag">{{$tag->tag}}</div>
                        @endforeach
                    </div>
                    <img class="col-6 " src="{{$article->image}}" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>