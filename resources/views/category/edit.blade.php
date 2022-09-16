@extends('base')

@section('body')
    <h2>Category {{$category->name}}</h2>
    <form action="{{route('category.update', ['category'=>$category->id])}}" method="POST">
    @csrf
    <label for="category-name">
        <input type="text" name="name" value="{{$category->name}}" placeholder="Category name">
        {{$errors}}
    </label>
    <button type="submit">Submit</button>
    </form>
@endsection
