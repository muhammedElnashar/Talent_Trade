<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        return view('employee.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        if ($request->hasFile("logo")) {
            $logo = $request->file("logo");
            $logoPath = $logo->store("logo", "user_image");
        }

        $data = $request->all();
        $data['logo'] = $logoPath ?? null;
        Employee::create($data);

        $user = User::findOrFail(Auth::id());
        $user['role'] = "employee";
        $user->save();

        return redirect()->route('employeeDashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $jobs = JobPost::all();
        return view('employee.show', compact('employee', 'jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if ($request->hasFile("logo")) {
            $logo = $request->file("logo");
            $logoPath = $logo->store("logo", "user_image");
            $employee->logo = $logoPath;
        }

        $employee->update($request->all());
        return redirect()->route('employee.show', $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
