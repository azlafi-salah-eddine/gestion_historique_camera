<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = Employe::all();
        return response()->json($employees);
    }

    public function store(StoreEmployeRequest $request)
    {
        $employee = Employe::create($request->validated());
        return response()->json($employee, 201);
    }

    public function show(string $id)
    {
        $employee = Employe::findOrFail($id);
        return response()->json($employee);
    }

    public function update(UpdateEmployeRequest $request, string $id)
    {
        $employee = Employe::findOrFail($id);
        $employee->update($request->validated());
        return response()->json($employee, 200);
    }

    public function destroy(string $id)
    {
        $employee = Employe::findOrFail($id);
        $employee->delete();
        return response()->json(null, 204);
    }
}
