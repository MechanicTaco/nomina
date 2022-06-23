<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'employee_code'=>'required|min:5|max:6',
            'name'=>'required|max:20',
            'father_family_name'=>'required|max:20',
            'mother_family_name'=>'required|max:20',
            'email'=>'required|email',
            'contact_type'=>'required',
            'status'=>'required'
        ]);
//
        try{
            return Employee::create($validation);
            return response('Employee added successfully', 201);
        } catch(\Throwable $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'employee_code'=>'required|min:5|max:6',
            'name'=>'required|max:20',
            'father_family_name'=>'required|max:20',
            'mother_family_name'=>'required|max:20',
            'email'=>'required|email',
            'contact_type'=>'required',
            'status'=>'required'
        ]);

        $employee = Employee::findOrFail($id);

        try{
            $employee->update($validation);
            return response('Employee updated successfully', 200);
        } catch(\Throwable $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response('Employee deleted successfully', 200);
    }
}
