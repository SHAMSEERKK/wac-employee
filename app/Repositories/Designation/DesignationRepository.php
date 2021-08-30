<?php
namespace App\Repositories\Designation;

use App\Models\Department;
use App\Models\Designation;

class DesignationRepository
{
    public function addDesignation($req)
    {
        $add_designation = new Designation;
        $add_designation->name = $req->designation_name;
        $add_designation->save();
    }
    public function editDesignation($req)
    {
        $new_data = Designation::find($req->designation_id);
        $new_data->name = $req->designation_name;
        $new_data->updated_at = time();
        $new_data->save();
    }
}
