<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('company.index')->with(['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $nit = $request->nit;
        $name = $request->name;
        $telephone = $request->telephone;
        $email = $request->email;
        $in_charge = $request->in_charge;

        $company = new Company;
        $company->nit = $nit;
        $company->name = $name;
        $company->telephone = $telephone;
        $company->email = $email;
        $company->in_charge = $in_charge;
        $company->save();
        
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $company_id = $request->company_id;
        $nit = $request->nit;
        $name = $request->name;
        $telephone = $request->telephone;
        $email = $request->email;
        $in_charge = $request->in_charge;

        $company = Company::find($company_id);
        $company->nit = $nit;
        $company->name = $name;
        $company->telephone = $telephone;
        $company->email = $email;
        $company->in_charge = $in_charge;
        $company->save();
        
        return redirect()->back();
    }
}
