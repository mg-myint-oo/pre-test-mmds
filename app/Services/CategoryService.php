<?php

namespace App\Services;

use App\Article;
use App\Category;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Tag;
use http\Env\Request;
use Illuminate\Support\Facades\Session;

class CategoryService {
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this -> categoryRepository = $categoryRepository;
    }

    public function create() {
       return view('categories.create');
    }

    public function store($data) {
        return $this -> categoryRepository -> store($data);
    }

}
