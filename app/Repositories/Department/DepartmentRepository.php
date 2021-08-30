<?php
namespace App\Repositories\Department;

use App\Models\Department;
use App\Models\Designation;

class DepartmentRepository
{

    public function add($req)
    {
        $add = new Department;
        $add->name = $req->department_name;
        $add->save();
    }
    public function editDepartment($req)
    {
        $new_data = Department::find($req->department_id);
        $new_data->name = $req->department_name;
        $new_data->updated_at = time();
        $new_data->save();
    }
}