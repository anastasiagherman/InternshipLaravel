<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    public function index(Request $request){
        return response()
            ->view('company.index', [
                'companies'=> Company::query()->paginate(10, ['*'], 'page'),
            ]);
    }
    public function show(Company $company){
        return response()
            ->view('company.show', [
                'company'=> $company,
            ]);
    }
    public function edit(Company $company, Request $request){
        //Gate::authorize('edit', $company);
        return response()->view('company.edit', [
            'company' => $company
        ]);
    }

    public function update(Company $company, CreateCompanyRequest $request){
        $company->update($request->validated());
        return redirect()->route('company.index');
    }

    public function create(){
        Gate::authorize('create', new Company());
        return response()
            ->view('company.create');
    }

    public function store(CreateCompanyRequest $request){
        $company = new Company();
        $company->fill(
            $request->only($company->getFillable())
            +[
                'user_id'=>$request->user()->id,
            ]);
        $company->save();

        return redirect()->route('company.index');

    }


    public function delete(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }
}
