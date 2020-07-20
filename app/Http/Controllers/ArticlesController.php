<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{

    /**
     *  Show a single article
     */
    public function show(Article $article)
    {
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
        Article::create($this->validateArticle());

        return redirect(route('articles.index'));
    }

    /**
     * Shows a view to edit an existing article
     */

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Persist the edited article
     */

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect(route('articles.show', ['article' => $article->id]));
    }

    /**
     * Delete an article
     */
    public function destroy()
    {

    }


    /**
     * Helper method to get validated input
     */
    private function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
