<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function update(Request $request, Category $category ){
        $request->validate([
            'name'=>'required|string:255',
        ]);
        $category->update($request->all());
        return redirect()->route('category.index');

    }


    public function create(){
        return response()
        ->view('category.create');

    }

    public function store(Request $request)
    {

         $request->validate([
              'name'=>'required|string:255',
          ]);

          Category::create($request->all());

          return redirect()->route('category.index');

    }


    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }


}
