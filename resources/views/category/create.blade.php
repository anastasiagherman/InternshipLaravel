@extends('base')

@section('body')
    <h2>Create category</h2>

    <form action="{{route('category.store')}}" method="POST">
    @csrf
    <label for="vacancy-title">
        <input type="text" name="name"  placeholder="Category name">
        {{$errors}}
    </label>

    <button type="submit">Submit</button>

    </form>
@endsection
