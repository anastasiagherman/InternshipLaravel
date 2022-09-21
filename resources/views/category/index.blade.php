@extends('base')

@section('body')
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('category.show', ['category'=>$category->id])}}" class="button button-outline">Show</a>
                    <a href="{{route('category.edit', ['category'=>$category->id])}}" class="button button-outline">Edit</a>
                    <form method="POST" action="{{route('category.delete', ['category' => $category->id])}}"
                          onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete">
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
    <a href="{{route('category.create')}}" class="button">Create Category</a>
@endsection
