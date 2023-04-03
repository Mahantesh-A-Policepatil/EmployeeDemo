<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Technologies;
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
        //
        $employeesData = Employees::all();
        $technologiesData = Technologies::all();
        $employees = $employeesData->map(function ($item, $key) {
            return [
                "id" => $item->id,
                "first_name" => isset($item->first_name) ? $item->first_name : "",
                "last_name" => isset($item->last_name) ? $item->last_name : "",
                "date_of_birth" => isset($item->date_of_birth) ? $item->date_of_birth : "",
                "mobile" => isset($item->mobile) ? $item->mobile : "",
                "technology_name" => isset($item->technologies->name) ? $item->technologies->name : "",
                "is_experienced" => isset($item->is_experienced) ? $item->is_experienced : "",               
            ];
        }); 
        return view('employees.index', compact('employees', 'technologiesData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // echo "<pre>";
        // print_r($request->all()); exit;
         $employee = new Employees  ([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'date_of_birth' => date('Y-m-d H:i:s' , strtotime($request->get('date_of_birth'))),
            'mobile' => $request->get('mobile'),
            'technology_id' => $request->get('technology_id'),
            'is_experienced' => $request->get('is_experienced'),
            'summary' => $request->get('summary'),
         ]);
         $employee->save();
         return redirect('/employees/list')->with('success', 'Category Saved Successfully!');
         //return view('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
