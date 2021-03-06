<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;
use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allArticle = Article::all();
        return view('article.index', compact('allArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allTag = Tag::all();
        $allAuthor = Author::all();
        return view('article.create', compact('allAuthor', 'allTag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $this->fillAndSave($article, $request);
        return view('article.show', compact('article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $allTag = Tag::all();

        $allAuthor = Author::all();
        return view('article.edit', compact('article', 'allAuthor', 'allTag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->fillAndSave($article, $request);
        return view('article.show', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
    private function fillAndSave(Article $article, $request) {
        $data = $request->all();
        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->image = $data['image'];
        $article->author_id = $data['author_id'];
        $article->save();
        if(array_key_exists('tags', $data)) {

            foreach($data['tags'] as $tagId) {
                $fleg = false;
                foreach ($article->tags->toArray() as $tagIf) {
                    if ($tagId == $tagIf['id']) {
                        $fleg = true;
                    }
                }
                if ($fleg) {
                    $article->tags()->attach($tagId);
                }
            }

        }
    }
}
