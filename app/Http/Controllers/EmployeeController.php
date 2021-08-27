<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function add(Request $req)
    {
        $validated = $req->validate([
            'department_name' => 'required|max:15|unique:departments,name',
        ]);

        $add = new Department;
        $add->name = $req->department_name;
        $add->save();
        return redirect('departments');
    }
    public function show()
    {
        $data = Department::all();
        return view('departments', ['lists' => $data]);
    }

    public function editDepartment(Request $req)
    {  

        $validated = $req->validate([
            'department_name' => 'required',
        ]);

        $new_data = Department::find($req->department_id);
        $new_data->name = $req->department_name;
        $new_data->updated_at = time();
        $new_data->save();
        return redirect('departments');

    }
    public function deleteDepartment($id)
    {
        $data = Department::findOrFail($id);
        try{
            $data->delete();
        }catch(\exception $e){
            return redirect('departments')->withErrors('OOPS..! Employee with Department exist'); }
        
            return redirect('departments');
    }


    // designations
    public function addDesignation(Request $req)
    {
        $validated = $req->validate([
            'designation_name' => 'required|unique:designations,name',
        ]);

        $add_designation = new Designation;
        $add_designation->name = $req->designation_name;
        $add_designation->save();
        return redirect('designations');
    }
    public function showDesignation()
    {
        $data = Designation::all();
        return view('designations', ['lists' => $data]);
    }

    public function editDesignation(Request $req)
    {

        $validated = $req->validate([
            'designation_name' => 'required',
        ]);

        $new_data = Designation::find($req->designation_id);
        $new_data->name = $req->designation_name;
        $new_data->updated_at = time();
        $new_data->save();
        return redirect('designations');

    }
    public function deleteDesignation($id)
    {

        $data = Designation::findOrFail($id);
        try{
            $data->delete();
        }catch(\exception $e){
            return redirect('designations')->withErrors('OOPS..! Employee with Designations exist'); }
        
        return redirect('designations');
    }

}
