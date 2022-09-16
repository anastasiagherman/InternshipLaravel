<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request){
        return response()
            ->view('company.index', [
                'companies'=> Company::query()->paginate(10, ['*'], 'page'),
            ]);
    }
    public function edit(Company $company, Request $request){
        if ($request->isMethod('POST')) {
           /* Validator::validate($request->only(['name']), [
                'name' => 'required|max:255',
                'website' => 'required|max:255',
            ]);*/

            $company->name = $request->get('name');
            $company->website = $request->get('website');
            $company->user_id = $request->get('user');
            $company->save();

            return redirect('/companies');
        }

        $users = User::all();

        return response()->view('companies.edit', [
            'company' => $company,
            'users' => $users,
        ]);
    }

    public function update(Request $request){

    }

    public function create(){
        return response()
            ->view('company.create');
    }

    public function store(Request $request){
        $user = auth()->user();
        dd($user);
        $request->validate([
            'name'=>'required|string:255',
            'website'=>'required|string:255',
            'user_id'=>$user->id,
        ]);

        Company::create($request->all());

        return redirect()->route('company.index');

    }


    public function delete(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }
}
