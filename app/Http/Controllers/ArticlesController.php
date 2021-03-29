<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function index()
    {
        if (request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }



    public function show(Article $article)
    {
//        $article = Article::findOrFail($id);

        return  view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        Article::create($this->ValidateArticle());

//        $article = new Article();
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();

        return redirect(route('articles.index'));

    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
      $article->update($this->ValidateArticle());

//       $article->title = request('title');
//       $article->excerpt = request('excerpt');
//       $article->body = request('body');
//       $article->save();

       return redirect($article->path());

    }

    public function destroy()
    {

    }

//    /**
//     * @return mixed
//     */
    public function ValidateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
