<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryTagRequest;
use App\Services\TagService;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(TagService $tagService)
    {
        $this -> tagService = $tagService;
    }

    public function create()
    {
        return $this -> tagService -> create();
    }

    public function store(CategoryTagRequest $request)
    {
        return $this -> tagService -> store($request -> except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
