<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repositories\Department\DepartmentRepository;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $repository;
    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(Request $req)
    {
        $validated = $req->validate([
            'department_name' => 'required|max:15|unique:departments,name',
        ]);
        $this->repository->add($req);
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
        $this->repository->editDepartment($req);
        return redirect('departments');

    }
    public function deleteDepartment($id)
    {
        $data = Department::findOrFail($id);
        try {
            $data->delete();
        } catch (\exception $e) {
            return redirect('departments')->withErrors('OOPS..! Employee with Department exist');}

        return redirect('departments');
    }
}
