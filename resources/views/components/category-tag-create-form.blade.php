<form action="@if($type === "category") {{ route('categories.store') }} @elseif($type === "tag") {{ route('tags.store') }} @endif" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class = "form-control" name="name">
    </div>

    <input type="submit" class="btn btn-primary" value="Create">

</form>
<br>
<x-error />
<a href="{{ redirect() -> back() -> getTargetUrl() }}">Go Back</a>
