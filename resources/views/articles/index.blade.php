@extends('layouts.master')
@section('content')
    <x-articles-toolbar />

    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between h4">
                <a href="{{ route('articles.show', $article -> id) }}" class="card-title">
                    {{ $article -> title }}
                    <br>
                    By
                    <strong>{{ $article -> user -> name }}</strong>
                </a>

                <x-created-at type="{{$article -> created_at -> diffForHumans() }}"/>
            </div>

            <div class="card-body">
                <p class="h5">
                    {{ substr($article -> body, 0, 50) . '.....'}}
                </p>
            </div>

            <div class="card-footer">
                <p>
                    Category:
                    <span class="badge badge-danger text-white py-2">{{ $article -> category() -> first() -> name }}</span>
                </p>

                <p>
                    Tags:
                    @foreach($article -> tags() -> get() as $tag)
                        <span class="badge badge-success text-white py-2">
                            {{ $tag -> name }}
                        </span>
                    @endforeach
                </p>
            </div>
        </div>
    @empty
        <p class="alert alert-danger">No Posts To Show</p>
        <a href="/">Go Back</a>
    @endforelse

@endsection
