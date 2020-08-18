<?php

namespace App\Repositories;
use App\Category;

class CategoryRepository {
    public function store($category_data) {
        Category::create($category_data);
        return redirect() -> to(route('articles.create'));
    }
}
