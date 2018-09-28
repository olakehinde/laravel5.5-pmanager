<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $companies = Company::where('user_id', Auth::user()->id)->get();

            return view('companies.index', ['companies' => $companies]);
        }

        return view('auth.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $company = Company::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);

            if ($company) {
                return redirect()->route('companies.show', ['company' => $company->id])->with('success', 'Company created Successfully');
            }
            return back()->WithInput()->with('errors', 'Sorry, Company cannot be created. Try again');
        }

        return back()->WithInput()->with('errors', 'Sorry, you do not have Permission to create a Company. Please Login to create company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::find($company->id); 
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $updateCompany = Company::find($company->id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($updateCompany) {
            return redirect()->route('companies.show', ['company' => $company->id])->with('success', 'Company updated Successfully');
        }
        return back()->WithInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $findCompany = Company::find($company->id);

        if ($findCompany->delete()) {
            return redirect()->route('companies.index')
                             ->with('success', 'Company deleted Successfully');
        }

        return back()->WithInput()->with('error', 'Company cannot be deleted');
    }
}
