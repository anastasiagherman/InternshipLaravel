<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacancyRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class VacancyController extends Controller
{
    public function index(Request $request):Response{
        return response()
            ->view('vacancy.index',[
                'vacancies' => Vacancy::query()->paginate(5, ['*'], 'page')]);
    }


    public function create(){
        Gate::authorize('create', new Vacancy());
        return response()->view('vacancy.create', [
            'companies' => Company::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(CreateVacancyRequest $request){
//        dd($request->all());
        $vacancy = new Vacancy();
        $data=$request->validated();
        $data['user_id'] = $request->user()->id;
        $vacancy->fill($data);
        $vacancy->save();

        return redirect()->route('vacancy.index');
    }

    public function show(Vacancy $vacancy){
        return response()
            ->view('vacancy.show', [
                'vacancy'=>$vacancy,
            ]);
    }

    public function edit(Vacancy $vacancy){
        return response()
            ->view('vacancy.edit', [
                'vacancy'=>$vacancy,
                'companies'=>Company::all(),
                'categories'=>Category::all(),
            ]);
    }

    public function update(Vacancy $vacancy, CreateVacancyRequest $request){
        $vacancy->update($request->validated());
        return redirect()->route('vacancy.index');

    }

    public function delete(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancy.index');
    }

}
