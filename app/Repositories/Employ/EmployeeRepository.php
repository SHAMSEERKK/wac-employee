<?php
namespace App\Repositories\Employ;

use App\Jobs\SendEmailJob;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;

class EmployeeRepository
{

    public function create($request)
    {
        $add = new Employee;
        $add->first_name = $request->first_name;
        $add->last_name = $request->last_name;
        $add->email = $request->email;
        $add->password = md5($request->password);
        $add->departments_id = $request->department;
        $add->designations_id = $request->designations;
        if (!empty($request->file('photo'))) {
            $photo = $this->imageUpload($request->file('photo'));
            $add->photo = $photo;
        }
        $add->address = $request->address;
        $add->mobile_number = $request->mobile_number;
        $add->updated_at = time();
        $add->created_at = time();
        $add->save();

        // email
        dispatch(new SendEmailJob($add));
        return;

    }

    public function update($request)
    {
        $update = Employee::findOrFail($request->id);
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->email = $request->email;
        $update->departments_id = $request->department;
        $update->designations_id = $request->designations;
        if (!empty($request->file('photo'))) {
            $photo = $this->imageUpload($request->file('photo'));
            $update->photo = $photo;
        }
        $update->address = $request->address;
        $update->mobile_number = $request->mobile_number;
        $update->updated_at = time();
        $update->created_at = time();
        $update->save();
        return;

    }
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
        return;

    }

    public function imageUpload($image)
    {
        $destinationPath = 'storage/employee/images';
        $employeeImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $employeeImage);
        return $employeeImage;
    }
    public function getEdit($request)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $employee = Employee::findOrFail($request->id);
       
    }


}
