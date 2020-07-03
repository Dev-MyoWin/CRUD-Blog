@extends('layouts.app')
@section('content')
<div class="container">
@if($errors->any())
<div class="alert alert-warning">
<ol>
@foreach($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ol> 
</div>
@endif
<form method="post" action="{{route('edit',['id'=>$article->id])}}">
@csrf
<input type="hidden" name="_method" value="PUT">

<div class="form-group">
<label>Title</label>
<input type="text" name="title" class="form-control" value="{{$article->title}}">
</div>
<div class="form-group">
         <label>Body</label>
<textarea name="body" class="form-control">{{$article->body}}</textarea> </div>
<div class="form-group">
<label>Category</label>
<select class="form-control" name="category_id" >
@foreach($categories as $category) 
<option value="{{ $category->id }}"
@php if($category->id==$article->category_id)
{
    echo "selected";
}
@endphp>
{{ $category['name'] }} 
</option>
@endforeach
         </select>
       </div>
<input type="submit" value="Add Article" class="btn btn-primary">
     </form>
   </div>
@endsection