@extends("layouts.app")
@section("content")
<div class="container">
<div class="card mb-2"> <div class="card-body">
<h5 class="card-title">{{ $article->title }}</h5> <div class="card-subtitle mb-2 text-muted small">
{{ $article->created_at->diffForHumans() }} 
</div>
<p class="card-text">{{ $article->body }}</p> 
<a class="btn btn-danger"href="{{ url("/articles/delete/$article->id") }}"> Delete </a>
<a class="btn btn-info float-right"href="{{url("/articles")}}">Back</a>
<a class="btn btn-warning float-right"href="{{ url("/articles/edit/$article->id") }}"> Edit </a>

</div>
</div>

<ul class="list-group mb-2">
<li class="list-group-item active">
<b>Comments ({{ count($article->comments) }})</b> </li>
@foreach($article->comments as $comment) <li class="list-group-item">
{{ $comment->content }}
<a href="{{ url("/comments/delete/$comment->id") }}"
class="close">
&times; </a>
<div class="small mt-2">
By <b>{{ $comment->user->name }}</b>,
{{ $comment->created_at->diffForHumans() }}
</div> </li>
@endforeach
</ul>
@if($errors->any())
<div class="alert alert-warning">
<ol>
@foreach($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ol> 
</div>
@endif
@auth
<form action="{{ url('/comments/add') }}" method="post"> 
@csrf
<input type="hidden" name="article_id"
value="{{ $article->id }}">

<textarea name="content" class="form-control mb-2"
placeholder="New Comment"></textarea> <input type="submit" value="Add Comment"
class="btn btn-secondary">
</form>
@endauth

</div>
@endsection