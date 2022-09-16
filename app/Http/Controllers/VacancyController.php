<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacancyRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{
    public function index(Request $request):Response{
        return response()
            ->view('vacancy.index',[
                'vacancies' => Vacancy::query()->paginate(5, ['*'], 'page')]);
    }

    public function create(){

        return response()->view('vacancy.create', [
            'companies' => Company::all(),
            'categories' => Category::all(),
        ]);
    }



    public function edit(Vacancy $vacancy, Request $request){
        if($request->isMethod('POST')){
            Validator::validate($request->only(['name']),[
                'name'=> 'required|max:255',
            ]);
            $vacancy->name=$request->get('name');
            $vacancy->save();
        }
        return response()
            ->view('vacancy.edit', [
                'vacancy'=>$vacancy
            ]);
    }

    public function store(CreateVacancyRequest $request){
        $vacancy = new Vacancy();
        $vacancy->fill(
            $request->only($vacancy->getFillable())
            +[
                'user_id'=>$request->user()->id,
            ]);


        $vacancy->save();

        return redirect('/vacancies');
    }


    public function delete(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect('/vacancies');
    }

}
