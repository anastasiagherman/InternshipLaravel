@extends('base')

@section('body')
    <h2>Category {{$company->name}}</h2>
    <form action="{{route('company.update', ['company'=>$company->id])}}" method="POST">
    @csrf
    <label for="company-name">
        <input type="text" name="name" value="{{$company->name}}" placeholder="Company website">
    </label>
    @include('errors', ['errors' => $errors->get('website')])
    <label for="company-website">
        <input type="text" name="website" value="{{$company->website}}" placeholder="Company website">
    </label>
    @include('errors', ['errors' => $errors->get('website')])

    <button type="submit">Submit</button>
    </form>
@endsection
