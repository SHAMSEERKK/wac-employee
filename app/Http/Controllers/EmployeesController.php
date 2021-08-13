<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\department;
use App\Models\designation;
use DataTables;
use App\Mail\SuccessMail;
use App\Jobs\SendEmailJob;



class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        
        if ($request->ajax()) {
            $data = employee::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('department', function ($row) {
                        return $row->departments->name;
                    })

                    ->addColumn('designation', function ($row) {
                        return $row->designations->name;
                    })

                    ->addColumn('photos', function ($row) {
                        if(!empty($row->photo)){
                            $src =  asset('storage/employee/images/'.$row->photo);
                            return "<img src=$src width='50px'>";
                        }
                        return ("no image");
                        // return "<img src=".$url.'" width='50px'>";
                        // return '<img src="'.$url.'" border="0" width="40" />';
                    })
                    
                    // $url= asset('storage/'.$artist->image);
                    // return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';


                    ->addColumn('action', function($row){
                        //   $href = url("employee-edit/$row->id");
                           $btn ='<a href="employee-edit/'.$row->id.'" class="edit btn btn-primary btn-sm">edit</a>';
                        //    $href = url("employee-delete/$row->id");
                           $btn =$btn.'<a href="employee-delete/'.$row->id.'" class="edit btn btn-danger btn-sm">delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['photos','action'])
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
            'email'  => 'required|unique:employees,email',
            'password' => 'required',
            'department' => 'required',
            'designations' => 'required',
            'photo' => 'max:5120|mimes:jpeg,png,jpg,svg',
            'address' => 'max:150',
            'mobile_number' => 'required|unique:employees,mobile_number|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:16', 
        ]);

        $add=new employee;
        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->password=md5($request->password);
        $add->departments_id=$request->department;
        $add->designations_id=$request->designations;
        if (!empty($request->file('photo'))) {
            $photo=$this->imageUpload($request->file('photo'));
            $add->photo=$photo;
        }
        $add->address=$request->address;
        $add->mobile_number=$request->mobile_number;
        $add->updated_at=time();
        $add->created_at=time();
        $add->save();


        dispatch(new SendEmailJob($add));

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
    public function show(Request $request)
    {
        
            $employees=employee::all();
            $departments=department::all();
            $designations=designation::all();
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
            'email'  => 'required',
            // |unique:employees,email' 
            'password' => 'required',
            'department' => 'required',
            'designations' => 'required',
            'photo' => 'max:5120|mimes:jpeg,png,jpg,svg',
            'address' => 'max:150',
            'mobile_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:16', 
            // |unique:employees,mobile_number
            
        ]);

       

        $update=employee::findOrFail($request->id);
        $update->first_name=$request->first_name;
        $update->last_name=$request->last_name;
        $update->email=$request->email;
        $update->password=$request->password;
        $update->departments_id=$request->department;
        $update->designations_id=$request->designations;
        if (!empty($request->file('photo'))) {
            $photo=$this->imageUpload($request->file('photo'));
            $update->photo=$photo;
        }
        $update->address=$request->address;
        $update->mobile_number=$request->mobile_number;
        $update->updated_at=time();
        $update->created_at=time();
        $update->save();
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
        $data=employee::findOrFail($id);
        $data->delete();
        return redirect('employees'); 
    }
    public function dropDown()
    {
        $departments=department::all();
        $designations=designation::all();
        return view('addemployee', compact('departments', 'designations'));
    }
    public function imageUpload($image)
    {
        $destinationPath = 'storage/employee/images';
        $employeeImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $employeeImage);
        // $input['image'] = "$profileImage";
        
        return $employeeImage;
    }
   

    public function getEdit(Request $req)
    {
        $departments=department::all();
        $designations=designation::all();
        $employee=employee::findOrFail($req->id);
        return view('employee-edit', compact('employee','departments','designations'));
    }
   
    
}
