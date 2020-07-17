<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{

    /**
     *  Show a single article
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    /**
     *  Render a list of articles
     */

    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Shows a view to create a new article
     */

    public function create()
    {
        return view('articles.create');
    }

    /**
     * Persist the newly created article
     */

    public function store()
    {
       dd(request()->all());
    }

    /**
     * Shows a view to edit an existing article
     */

    public function edit($id)
    {
        $articles = Article::find($id);

        return view('articles.edit', ['article' => $articles]);
    }

    /**
     * Persist the edited article
     */

    public function update($id)
    {
        $article = Article::find($id);

        $article->title = request('title');
        $article->title = request('title');
        $article->title = request('title');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    /**
     * Delete an article
     */
    public function destroy()
    {

    }
}
