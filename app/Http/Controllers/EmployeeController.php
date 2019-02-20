<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Job;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$employees=Employee::all();
        $employees=Employee::paginate(20);
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jobs=Job::all();
        $departments=Department::all();
        //dd($jobs);
        return view('employees.create',compact('jobs','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        $employee=new Employee();

        $employee->first_name=$request->input('first_name');
        $employee->last_name=$request->input('last_name');
        $employee->email=$request->input('email');
        $employee->phone_number=$request->input('phone_number');
        $employee->job_id=$request->input('job_id');
        $employee->department_id=$request->input('department_id');
        $employee->save();
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        //$employee=Employee::find($id);
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        //$employee=Employee::find($id);
        $jobs=Job::all();
        $departments=Department::all();
        return view('employees.edit',compact('employee','jobs','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
        //
        //$employee=Employee::find($id);
        $employee->first_name = $request->get('first_name');
        $employee->last_name=$request->get('last_name');
        $employee->email=$request->get('email');
        $employee->phone_number=$request->get('phone_number');
        $employee->job_id=$request->get('job_id');
        $employee->department_id=$request->get('department_id');
        $employee->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        //$employee=Employee::find($id);
        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function findOne($name)
    {
        if(isset($name)){
            $employees=Employee::where('first_name',$name)->get()->toJson();
            return $employees;
        }
    }
}