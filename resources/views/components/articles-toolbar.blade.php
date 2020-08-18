<div class="d-flex flex-column mb-3">
    <a
        href="{{ route('articles.create') }}"
        class = "btn btn-primary mb-3"
        role = "button">
        Create New Post
    </a>

    <form action="{{ route('articles.index') }}" method="get">
        <div class="input-group">
            <input name="search" class="form-control" placeholder="What Article Are You Looking For ?">
            <div class="input-group-append">
                <div class="input-group-btn">
                    <input type="submit" class = "btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>

