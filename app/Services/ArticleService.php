<?php

namespace App\Services;

use App\Article;
use App\Category;
use App\Repositories\ArticleRepository;
use App\Tag;
use http\Env\Request;
use Illuminate\Support\Facades\Session;

class ArticleService
{
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index($request)
    {
        if ($request->has('search')) {

            $title = $request->query('search');
            $articles = Article::where('title', 'like', '%' . $title . '%') -> get();

        } else if ($request->has('category_id')) {

            $articles = Article::where('category_id', $request -> query('category_id')) -> get();

        } else if ($request->has('tag_id')) {

            $tag = Tag::find($request -> query('tag_id'));
            $articles = $tag -> articles() -> get();

        } else {
            $articles = Article::latest()
                ->publicationLogic()
                ->orWhere('is_published', true)
                ->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function create() {
        return view('articles.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function edit($id) {
        $article = Article::find($id);
        $tags = [];
        foreach($article -> tags() -> get() as $tag) {
            array_push($tags, $tag -> id);
        }

        return view('articles.edit', [
            'article' => Article::find($id),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'current_category' => $article -> category() -> first() -> id,
            'current_tag' => $tags
        ]);
    }

    public function store($data) {
        //add current user id
        $data['user_id'] = auth() -> id();

        return $this -> articleRepository -> store($data);
    }

    public function show($article) {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function publish($id) {
        return $this -> articleRepository -> publish($id);
    }

    public function update($data, $article) {
        return $this -> articleRepository -> update($data, $article -> id);
    }

    public function search(Request $request) {
        ddd($title);
    }

}
