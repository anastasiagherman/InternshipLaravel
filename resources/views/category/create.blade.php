@extends('base')

@section('body')
    <h2>Create category</h2>

    <form action="{{route('category.store')}}" method="POST">
    @csrf
    <label for="category-name">
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Category name">
        @include('errors', ['errors' => $errors->get('name')])
    </label>

    <button type="submit">Submit</button>

    </form>
@endsection
