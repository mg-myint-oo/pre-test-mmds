<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\NewPostRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class ArticleController extends Controller
{
    public function __construct(ArticleService $articleService)
    {
        $this->middleware('auth');
        $this -> articleService = $articleService;
    }

    public function index(Request $request) {
        return $this -> articleService -> index($request);
    }

    public function create() {
        return $this -> articleService -> create();
    }

    public function edit($id) {
        return $this -> articleService -> edit($id);
    }

    public function store(NewPostRequest $request) {
        return $this -> articleService -> store($request -> except('_token'));
    }

    public function show(Article $article) {
        return $this -> articleService -> show($article);
    }

    public function update(NewPostRequest $request, Article $article) {
        return $this -> articleService -> update($request -> except(['_token', '_method']), $article);
    }

    public function destroy(Article $article) {
        //
    }

    public function publish($id) {
        return $this -> articleService -> publish($id);
    }
}
