<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;

class ArticlesController extends Controller
{

    /**
     *  Show a single article
     */
    public function show(Article $article)
    {
        $comments = $article->comments;

        $user = new User;

        return view('articles.show', ['article' => $article, 'comments' => $comments, 'user' => $user]);
    }

    /**
     *  Render a list of articles
     */

    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Shows a view to create a new article
     */

    public function create()
    {
        return view('articles.create', ['tags' => Tag::all()]);
    }

    /**
     * Persist the newly created article
     */

    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));

        $article->user_id = auth()->user()->id;

        $article->save();

        $article->tags()->attach(request('tags'));

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

        return redirect($article->path());
    }

    /**
     * Delete an article
     */
    public function destroy(Article $article)
    {

        Article::destroy($article->id);

        return redirect(route('articles.index'))->with('message', 'Article deleted successfully.');
    }

    /**
     * Helper method to get validated input
     */
    private function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }
}
