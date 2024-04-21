<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Throwable;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $companies = (new Company)->paginate();

        return view('company.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * $companies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $company = new Company();
        return view('company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $companyRequest): RedirectResponse
    {
        $company = new Company();
        $data = $companyRequest->validated();
        $logoPath = request('logo')?->store('','public');
        $company->create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'website'=> $data['website'],
            'logo' => $logoPath ?: ''
        ]);
        return redirect()->route('companies.index')
            ->with('success', 'Empresa creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $company = (new Company)->find($id);

        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $company = (new Company)->find($id);

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $companyRequest, Company $company): RedirectResponse
    {
        $data = $companyRequest->validated();
        $logoPath = request('logo')?->store('','public');
        $company->update([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'website'=> $data['website'],
            'logo' => $logoPath ?:$company->logo
        ]);
        return redirect()->route('companies.index')
            ->with('success', 'Empresa actualizaada correctamente.');
    }

    /**
     */
    public function destroy($id): RedirectResponse
    {
       $response =false;
       try {
           (new Company)->findOrFail($id)->deleteOrFail();
           } catch  ( Throwable $e){
           return redirect()->route('companies.index')
               ->with('error', 'No se puede eliminar a la empresa');
    }
        return redirect()->route('companies.index')
            ->with('success', 'Empresa eliminada correctamente');
    }
}
