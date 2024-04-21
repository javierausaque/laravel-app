<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Throwable;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employees = (new Employee)->paginate();
        $companies  = Company::all();
        return view('employee.index', compact(['employees', 'companies']))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = new Employee();
        $companies  = Company::all();
        return view('employee.create', compact(['employee', 'companies']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        (new Employee)->create($request->validated());
        return redirect()->route('employees.index')
            ->with('success', 'Empleado creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = (new Employee)->find($id);
        $companies  = Company::all();
        return view('employee.show', compact(['employee', 'companies']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = (new \App\Models\Employee)->find($id);
        $companies  = Company::all();
        return view('employee.edit', compact(['employee', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * @throws Throwable
     */
    public function destroy($id): RedirectResponse
    {
        (new Employee)->find($id)->deleteOrFail();

        return redirect()->route('employees.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
