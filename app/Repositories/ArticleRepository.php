<?php

namespace App\Repositories;
use App\Article;
use Illuminate\Support\Facades\Session;

class ArticleRepository {
    public function store($article_data) {
        $article = Article::create($article_data);
        $article -> tags() -> attach($article_data['tag_id']);
        return redirect() -> to(route('articles.index'));
    }

    //to update the is_published field
    public function publish($id) {
        Article::find($id) -> update([
            'is_published' => true
        ]);

        Session::flash('published-message', 'Successfully Published The Post');

        return redirect() -> back();
    }

    public function update($article, $id) {
        $tag_id = $article['tag_id'];
        unset($article['tag_id']);

        Article::find($id) -> tags() -> sync($tag_id);
        Article::where('id', $id) -> update($article);

        return redirect() -> to(route('articles.show', $id));
    }
}
