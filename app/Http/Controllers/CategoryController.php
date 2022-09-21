<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index(Request $request):Response{

      return response()
          ->view('category.index',[
              'categories' => Category::query()->paginate(5, ['*'], 'page')]);
    }

    public function show(Category $category):Response{
        return response()
            ->view('category.show', [
                'category'=> $category,
            ]);
    }

    public function edit(Category $category):Response{
        return response()
            ->view('category.edit', [
                'category'=>$category
            ]);
    }

    public function update(CreateCategoryRequest $request, Category $category ){
        $category->update($request->validated());
        return redirect()->route('category.index');

    }


    public function create(){
        Gate::authorize('create', new Category());
        return response()
        ->view('category.create');

    }

    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $category->fill($request->only($category->getFillable()));
        $category->save();

          return redirect()->route('category.index');

    }


    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }


}
