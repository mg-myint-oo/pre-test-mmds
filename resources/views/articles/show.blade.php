@extends('layouts.master')
@section('content')
    <article>
        <h1 class="d-flex justify-content-between align-items-center">
            <div class="title">
                <div>
                    <span class="badge h5 badge-primary text-white">Category:</span>
                    <a href="/articles?category_id={{ $article -> category() -> first() -> id }}">
                        {{ $article -> category() -> first() -> name }}
                    </a>
                    /
                </div>
                <div>
                    <span class="badge h5 badge-primary text-white">Title:</span>
                    {{ $article -> title }}
                </div>
            </div>

            @if(($article -> user_id === auth() -> id()))
                <div class="d-flex">
                    <a href="{{ route('articles.edit', $article -> id) }}" class="mr-3">
                        <img src="https://img.icons8.com/ios/50/000000/edit-property.png"/>
                    </a>

                    @if(!$article -> is_published)
                        <form
                            action="{{ route('articles.publish', $article -> id) }}"
                            method="post">
                            @method('PUT')
                            @csrf
                            <input
                                type="submit"
                                class="btn btn-primary publisher"
                                value="Publish"
                            >
                        </form>
                    @endif
                </div>
            @endif

        </h1>

        <hr>

        <p style="font-size: 2em; line-height: 2.2em;">
            {{ $article -> body }}
        </p>

        <div class="meta-info">
            <div class="d-flex justify-content-between">
                <x-created-at type="{{$article -> created_at -> diffForHumans() }}"/>
                <p class="author h5">
                    Authored By
                    <strong>
                    {{ $article -> user -> name }}
                    </strong>
                </p>
            </div>
            <br>

            @if(count($article -> tags() -> get()))
            <div class="tags">
                <h5>Tags</h5>
                <ul>
                    @foreach($article -> tags() -> get() as $tag)
                        <li>
                            <a href="/articles?tag_id={{ $tag -> id }}">
                                {{ $tag -> name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        @if(\Illuminate\Support\Facades\Session::has('published-message'))
            <p class="alert alert-success position-absolute w-50 published-message" style="top: 4px;right: 24%;">
                {{ \Illuminate\Support\Facades\Session::get('published-message') }}
            </p>
       @endif

    </article>
@endsection
