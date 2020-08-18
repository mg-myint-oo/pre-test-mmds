<?php

namespace App\Repositories;
use App\Category;
use App\Tag;

class TagRepository {
    public function store($tag_data) {
        Tag::create($tag_data);
        return redirect() -> to(route('articles.create'));
    }
}
