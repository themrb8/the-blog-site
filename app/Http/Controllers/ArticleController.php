<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.index', compact('articles','categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|unique:articles',
        'content' => 'required',
        'category_id' => 'required',
        'tags' => 'required|array',
    ]);

    $user = Auth::user(); // Get the authenticated user

    $article = $user->articles()->create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    $article->categories()->attach($request->input('category_id'));
    $article->tags()->attach($request->input('tags'));

    return redirect()->route('articles.index')->with('success', 'You have successfully created an article');
}

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.view', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|unique:articles,title,' . $article->id,
            'content' => 'required',
        ]);

        $article->update($request->except('_token', '_method', 'category_id', 'tags'));

        // Update category and tags separately
        $article->categories()->sync([$request->input('category_id')]);
        $article->tags()->sync($request->input('tags'));

        return redirect()->route('articles.index')->with('success', 'You have successfully updated the article');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'You have successfully deleted article');

    }
}
