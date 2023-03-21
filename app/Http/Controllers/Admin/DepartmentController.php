<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function add()
    {
        return view('admin.departments.create');
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $departments = new Department();
            $departments->name = $request->name;
            $departments->save();

            return response()->json([
                'success' => true,
                'message' => ['department add successfully']
            ]);
        }
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.update', compact('department'));
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $departments = Department::findOrFail($request->id);
            $departments->name = $request->name;
            $departments->save();

            return response()->json([
                'success' => true,
                'message' => ['department Update successfully']
            ]);
        }
    }

    public function delete(Request $request)
    {
        $departments = Department::findOrFail($request->id)->delete();
        return response()->json([
            'success' => true,
            'message' => ['department delete successfully']
        ]);
    }
}
