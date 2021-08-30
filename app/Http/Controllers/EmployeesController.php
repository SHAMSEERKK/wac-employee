<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Repositories\Employ\EmployeeRepository;
use DataTables;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    public $repository;
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //yajra data table
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Employee::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('department', function ($row) {
                    return $row->departments->name;
                })

                ->addColumn('designation', function ($row) {
                    return $row->designations->name;
                })

                ->addColumn('photos', function ($row) {
                    if (!empty($row->photo)) {
                        $src = asset('storage/employee/images/' . $row->photo);
                        return "<img src=$src height='60px' width='60px'>";
                    }
                    $src = asset('storage/employee/images/default/default_img.png');
                    return "<img src=$src height='60px' width='60px'>";

                })

                ->addColumn('action', function ($row) {

                    $btn = '<a href="employee-edit/' . $row->id . '" class="edit btn btn-primary btn-sm mr-2 mt-3">edit</a>';

                    $btn = $btn . '<a href="employee-delete/' . $row->id . '" class="edit btn btn-danger btn-sm mt-3">delete</a>';
                    return $btn;
                })
                ->rawColumns(['photos', 'action'])
                ->make(true);
        }

        return view('employees');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|unique:employees,email',
            'password' => 'required',
            'department' => 'required',
            'designations' => 'required',
            'photo' => 'max:5120|mimes:jpeg,png,jpg,svg',
            'address' => 'max:150',
            'mobile_number' => 'unique:employees,mobile_number',
        ]);
        $this->repository->create($request);

        return redirect('employees');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();
        return view('employees', compact('employees', 'departments', 'designations'));

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
    public function update(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required',
            'department' => 'required',
            'designations' => 'required',
            'photo' => 'max:5120|mimes:jpeg,png,jpg,svg',
            'address' => 'max:150',
            'mobile_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:16',

        ]);
        $this->repository->update($request);

        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect('employees');
    }
    public function dropDown()
    {

        $departments = Department::all();
        $designations = Designation::all();
        return view('addemployee', compact('departments', 'designations'));
    }

    public function getEdit(Request $request)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $employee = Employee::findOrFail($request->id);
        return view('employee-edit', compact('employee', 'departments', 'designations'));
      
    }

}
