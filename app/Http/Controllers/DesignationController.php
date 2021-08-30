<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Repositories\Designation\DesignationRepository;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public $repository;
    public function __construct(DesignationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addDesignation(Request $req)
    {
        $validated = $req->validate([
            'designation_name' => 'required|unique:designations,name',
        ]);
        $this->repository->addDesignation($req);
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
        $this->repository->editDesignation($req);
        return redirect('designations');

    }
    public function deleteDesignation($id)
    {
        $data = Designation::findOrFail($id);
        try {
            $data->delete();
        } catch (\exception $e) {
            return redirect('designations')->withErrors('OOPS..! Employee with Designations exist');}
        return redirect('designations');
    }
}
