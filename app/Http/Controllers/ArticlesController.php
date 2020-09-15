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
        $comments = $article->comments()->latest()->get();

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
        // ddd($article->user_id);
        if ($article->user_id === auth()->user()->id) {
            return view('articles.edit', ['article' => $article, 'tags' => Tag::all()]);
        } else {
           return redirect()->back()->with("warning", "You can edit your articles only!");
        }

    }

    /**
     * Remove tag from an article
     */
    public function removeTag(Article $article)
    {
        $article->tags()->detach(request('tag'));
        return redirect()->back();
    }

    /**
     * Persist the edited article
     */

    public function update(Article $article)
    {
        // ddd(Tag::all());
        // ddd($article->tags);
        // ddd(request('tags'));

        $tags_ids = [];
        $articleTags_ids = [];
        $tags = Tag::all();
        $articleTags = $article->tags;

        foreach ($tags as $tag) {
            array_push($tags_ids, $tag->id);
        }
        foreach ($articleTags as $tag) {
            array_push($articleTags_ids, $tag->id);
        }

        $tags_array = request('tags');

        foreach ($tags_array as $articleTag) {

            if (!in_array($articleTag, $articleTags_ids)) {

                $article->tags()->attach(request('tags'));
            }
        }

        $article->update(request(['title', 'excerpt', 'body']));


        return redirect($article->path())->with("message", "Article updated successfully!");
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

    /**
     * Add a new comment
     */
    public function storeComment(Article $article)
    {
        // ddd($article);
        // ddd(request()->all());
        $user = auth()->user();

        $user->comment($article, request()->comment, request()->rating);

        return redirect($article->path())->with('message', 'Your comment has been added successfully.');
    }
}
