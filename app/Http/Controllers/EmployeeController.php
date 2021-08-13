<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\designation;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function add(Request $req)
    {
        $validated = $req->validate([
            'department_name' => 'required|max:15|unique:departments,name',
        ]);

        $add = new department;
        $add->name = $req->department_name;
        $add->save();
        return redirect('departments');
    }
    public function show()
    {
        $data = department::all();
        return view('departments', ['lists' => $data]);
    }

    public function editDepartment(Request $req)
    {  

        $validated = $req->validate([
            'department_name' => 'required|unique:departments,name',
        ]);

        $new_data = department::find($req->department_id);
        $new_data->name = $req->department_name;
        $new_data->updated_at = time();
        $new_data->save();
        return redirect('departments');

    }
    public function deleteDepartment($id)
    {
        $data = department::findOrFail($id);
        try{
            $data->delete();
        }catch(\exception $e){
            return redirect('departments')->withErrors('OOPS..! Employee with department exist'); }
        
            return redirect('departments');
    }


    // designations
    public function addDesignation(Request $req)
    {
        $validated = $req->validate([
            'designation_name' => 'required|unique:designations,name',
        ]);

        $add_designation = new designation;
        $add_designation->name = $req->designation_name;
        $add_designation->save();
        return redirect('designations');
    }
    public function showDesignation()
    {
        $data = designation::all();
        return view('designations', ['lists' => $data]);
    }

    public function editDesignation(Request $req)
    {

        $validated = $req->validate([
            'designation_name' => 'required|unique:designations,name',
        ]);

        $new_data = designation::find($req->designation_id);
        $new_data->name = $req->designation_name;
        $new_data->updated_at = time();
        $new_data->save();
        return redirect('designations');

    }
    public function deleteDesignation($id)
    {

        $data = designation::findOrFail($id);
        try{
            $data->delete();
        }catch(\exception $e){
            return redirect('designations')->withErrors('OOPS..! Employee with designations exist'); }
        
        return redirect('designations');
    }

}
