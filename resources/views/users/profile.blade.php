@extends('layouts.master')

@section('content')

    <h1 class="text-center">
        <strong>{{$user -> name}}</strong>
    </h1>

    <hr>

    <div class="d-flex justify-content-end">
        <a href="{{ route('articles.create') }}" role="button" class="btn btn-primary">Create New Article</a>
    </div>

    <nav>
       <div class="nav nav-pills mb-4">
           <a href="#published" class="nav-item nav-link active" data-toggle="tab">
               Published
           </a>

           <a href="#unpublished" class="nav-item nav-link" data-toggle="tab">
               Unpublished
           </a>
       </div>

        <div class="tab-content">
            <div class="tab-pane show fade active" id="published">
                <h1>Published Articles</h1>

                <div class="row">
                    @forelse($articles as $article)
                        @if($article -> is_published === 1)
                        <div class="col-sm-4 card-deck mb-3">
                            <a href="{{ route('articles.show', $article -> id) }}" class="text-decoration-none">
                                <div class="card rounded">
                                    <div class="card-header bg-success text-white">
                                        {{ $article -> title }}
                                    </div>

                                    <div class="card-body text-dark">
                                        {{ substr($article -> body, 0, 100) . "....." }}
                                    </div>

                                </div>
                            </a>
                        </div>
                        @else
                            {{-- make sure to run this only one time --}}
                            @if($loop -> index === 0)
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-header">No Published Posts Yet</div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                        <div class="col-sm-8 m-auto">
                            <div class="card-header">
                                No Published Posts Yet.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="tab-pane fade" id="unpublished">
                <h1>Unpublished Articles</h1>

                <div class="row">
                    @forelse($articles as $article)
                        @if($article -> is_published === 0)
                            <div class="col-sm-4 card-deck mb-3">
                                <a href="{{ route('articles.show', $article -> id) }}" class="text-decoration-none">
                                    <div class="card rounded">
                                        <div class="card-header bg-warning text-dark">
                                            {{ $article -> title }}
                                        </div>

                                        <div class="card-body text-dark">
                                            {{ substr($article -> body, 0, 100) . "....." }}
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @else
{{--                            make sure to run this only one time--}}
                            @if($loop -> index === 0)
                            <div class="col-sm-8 m-auto">
                                <div class="card">
                                    <div class="card-header">No Unpublished Posts Yet</div>
                                </div>
                            </div>
                            @endif
                        @endif
                    @empty
                        <div class="col-sm-8 m-auto">
                            <div class="card-header">
                                No Unpublished Posts Yet.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </nav>
@endsection
