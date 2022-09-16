@extends('base')

@section('body')
    <h2>Category {{$company->name}}</h2>
    <form action="{{route('company.edit', ['company'=>$company->id])}}" method="POST"></form>
    @csrf
    <label for="company-name">
        <input type="text" name="name" value="{{$company->name}}" placeholder="Company website">
    </label>
    <label for="company-website">
        <input type="text" name="website" value="{{$company->website}}" placeholder="Company website">
    </label>

    <select id="users" name="user">
        @foreach($users as $user)
            @if($user->id == $company->user->id)
                <option value="{{$user->id}}" selected="selected">{{$user->name}}</option>
            @else
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
    <button type="submit">Submit</button>
@endsection
