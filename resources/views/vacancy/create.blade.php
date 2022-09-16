@extends('base')

@section('body')
   <h2>Create vacancy</h2>

    <form action="action="{{route('vacancy.create')}}" method="POST">
        @csrf
        <label for="vacancy-title">
            <input type="text" name="title"  placeholder="Vacancy title">
        </label>
        <label for="vacancy-content">
            <input type="text" name="title"  placeholder="Vacancy title">
        </label>
        <label for="vacancy-location">
            <input type="text" name="location"  placeholder="Vacancy location">
        </label>
        <label for="vacancy-imageUrl">
            <input type="text" name="imageUrl"  placeholder="Vacancy image url">
        </label>
        <label for="vacancy-type">
            <input type="text" name="title"  placeholder="Vacancy title">
        </label>

        <select id="companies" name="company">
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>

        <select id="categories" name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <p>Select type:</p>
        <div>
            <input type="radio" id="choice1"
                   name="type" value="full time">
            <label for="choice1">Full time</label>

            <input type="radio" id="choice2"
                   name="type" value="part time">
            <label for="choice2">Part time</label>
        </div>


        <button type="submit">Submit</button>

    </form>
@endsection
