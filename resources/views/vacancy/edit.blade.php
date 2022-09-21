@extends('base')

@section('body')
    <h2>Edit vacancy</h2>

    <form action="{{route('vacancy.update', ['vacancy'=>$vacancy->id])}}" method="POST">
        @csrf
        <label for="vacancy-title">
            <input type="text" name="title" value="{{$vacancy->title}}" placeholder="Vacancy title">
        </label>
        @include('errors', ['errors' => $errors->get('title')])
        <label for="vacancy-content">
            <input type="text" name="content"  value="{{$vacancy->content}}" placeholder="Vacancy content">
        </label>
        @include('errors', ['errors' => $errors->get('content')])
        <label for="vacancy-location">
            <input type="text" name="location" value="{{$vacancy->location}}" placeholder="Vacancy location">
        </label>
        @include('errors', ['errors' => $errors->get('location')])
        <label for="vacancy-imageUrl">
            <input type="text" name="imageUrl" value="{{$vacancy->imageUrl}}" placeholder="Vacancy image url">
        </label>
        @include('errors', ['errors' => $errors->get('imageUrl')])

        <select id="companies" name="company_id">
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        @include('errors', ['errors' => $errors->get('$company_id')])

        <select id="categories" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @include('errors', ['errors' => $errors->get('category_id')])

        <p>Select type:</p>
        <div>
            <label for="choice1">
                <input type="radio" checked="checked" id="choice1"
                       name="type" value="full-time">Full time
            </label>
            <label for="choice2">
                <input type="radio"  id="choice2"
                       name="type" value="part-time">Part time
            </label>
            @include('errors', ['errors' => $errors->get('type')])
        </div>

        <button type="submit">Submit</button>

    </form>
@endsection
