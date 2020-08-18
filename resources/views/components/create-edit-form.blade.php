<form
    action="
        @if($type === "create")
            {{ route('articles.store') }}
        @elseif($type === "edit")
            {{ route('articles.update', $article -> id) }}
        @endif"
    method="post"
    class = "mb-3"
>
    @csrf

    @if($type === "edit")
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="post-title">Post Title</label>
        <input
            type="text"
            class = "form-control"
            id = "post-title"
            name = "title"
            @if($type === "create")
                value="{{old('title')}}"
            @elseif($type === "edit")
                value="{{$article -> title}}"
            @endif
        >
    </div>

    <div class="form-group">
        <label for="post-title">Post Body</label>
        <textarea
            name="body"
            class = "form-control"
            id="body"
            cols="30"
            rows="5"
        >@if($type === "create"){{old('body')}}@elseif($type === "edit"){{$article -> body}}@endif</textarea>
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <div class="help-block">
            Desired Category Does Not Exist?
            <a href="{{ route('categories.create') }}">Create Here</a>
        </div>
        <select name="category_id" id="category" class = "form-control">
            @foreach($categories as $category)
                <option
                    value="{{$category -> id}}"
                    @if(isset($currentCategory) && $currentCategory == $category -> id) {{ "selected" }}@endif
                >
                    {{ $category -> name }}


                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tag">Tags</label>
        <div class="help-block">
            Desired Tag Does Not Exist?
            <a href="{{ route('tags.create') }}">Create Here</a>
        </div>
        <select name="tag_id[]" id="tags" multiple class = "form-control">
            @foreach($tags as $tag)
                <option
                    value="{{$tag -> id}}"
                    @if(isset($currentTag) && in_array($tag -> id, $currentTag)) {{ "selected" }}@endif
                >
                    {{ $tag -> name }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label for="is-published">Do You Want To Publish Your Post ?</label>
        <div>
            <input
                type="radio"
                name="is_published"
                id="yes"
                value="1"
                @if($type="edit" && isset($article) && $article -> is_published === 1)
                    checked
                @endif
            >
            <label for="yes">Okey ;)</label>
            <br>
            <input
                type="radio"
                name="is_published"
                id="no"
                value="0"
                @if($type="edit" && isset($article) && $article -> is_published === 0)
                checked
                @endif
            >
            <label for="no">No, Leave My Post Alone </label>
        </div>
    </div>

    <input type="submit" value="Let's Post It" class="form-control btn btn-block btn-primary">
</form>

<br>

<x-error />
