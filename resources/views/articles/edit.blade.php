@extends('layouts.master')
@section('content')
    <h3 class="modal-title">Edit Post</h3>

    <div class="modal-body">

        <x-create-edit-form
            type="edit"
            :article="$article"
            :categories="$categories"
            :tags="$tags"
            :current_category="$current_category"
            :current_tag="$current_tag"
        />
    </div>
@endsection
