<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="..\..\css\app.css">
</head>
<body>
    <div class="container create">
        <div class="row">
            <div class="article d-flex align-content-stretch  col-6">
                <div class="back row">
                    <div class="col-12">
                        
                        <form class="row" action="{{route('article.update', $article)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input class="col-12" type="text" name="title" id="title" value="{{$article->title}}"> 
                            <select class="col-6" class="form-select" aria-label="Default select example" name="author_id">
                                <option value="{{$article->author_id}}">{{$article->author->name}} {{$article->author->surname}}</option>
                                @foreach ($allAuthor as $item)
                                    @if ($item != $article->author)
                                        <option value="{{$item->id}}">{{$item->name}} {{$item->surname}}</option>           
                                    @endif  
                                @endforeach
                            </select>
                            <textarea class="col-12" name="text" id="text" cols="30" rows="10""> {{$article->text}}</textarea>
                            <input class="col-12" type="text" name="image" id="image" value="{{$article->image}}">
                            <button type="submit" class="col-2 offset-10 btn btn-primary" >Invia</button>
                        </form>
                    </div>    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>