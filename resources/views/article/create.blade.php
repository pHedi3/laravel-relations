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
    <div class="container create">
        <div class="row">
            <div class="article d-flex align-content-stretch  col-6">
                <div class="back row">
                    <div class="col-12">
                        
                        <form class="row" action="{{route('article.store')}}" method="POST">
                            @csrf
                            <input class="col-12" type="text" name="title" id="title" placeholder="scrivi il titolo"> 
                            <select class="col-6" class="form-select" aria-label="Default select example" name="author_id">
                                <option selected>select a author</option>
                                @foreach ($allAuthor as $item)  
                                <option value="{{$item->id}}">{{$item->name}} {{$item->surname}}</option>
                                @endforeach
                            </select>
                            <textarea class="col-12" name="text" id="text" cols="30" rows="10" placeholder="scrivi l'articolo"></textarea>
                            <input class="col-12" type="text" name="image" id="image" placeholder="inserisci url dell'immagine">
                            <button type="submit" class="col-2 offset-10 btn btn-primary" >Invia</button>
                        </form>
                        
                    </div>    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>