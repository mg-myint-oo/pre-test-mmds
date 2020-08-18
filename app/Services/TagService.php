<?php

namespace App\Services;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use App\Tag;
use http\Env\Request;

class TagService {
    public function __construct(TagRepository $tagRepository)
    {
        $this -> tagRepository = $tagRepository;
    }

    public function create() {
        return view('tags.create');
    }

    public function store($data) {
        return $this -> tagRepository -> store($data);
    }

}
