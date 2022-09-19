@extends('base')

@section('body')
    <h2>Create company</h2>

    <form action="{{route('company.store')}}" method="POST">
    @csrf
    <label for="company-name">
        <input type="text" name="name"  placeholder="Company name">
    </label>
        @include('errors', ['errors' => $errors->get('name')])
    <label for="company-website">
        <input type="text" name="website"  placeholder="Company website">
    </label>
        @include('errors', ['errors' => $errors->get('website')])
    <button type="submit">Submit</button>

    </form>
@endsection
