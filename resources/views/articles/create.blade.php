@extends('layouts.master')
@section('content')
    <h3 class="modal-title">Create New Post</h3>

    <div class="modal-body">
        <x-create-edit-form type="create" :categories="$categories" :tags="$tags"/>
    </div>
@endsection

