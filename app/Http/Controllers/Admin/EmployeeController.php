<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function index(): View
    {
        $employees = Employee::latest()->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function add()
    {
        return view('admin.employees.create');
    }
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'password' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $employee = new Employee();

            $filename = "";
            if ($request->file('image')) {
                $filename = $request->file('image')->store('employee', 'public');
            }

            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->dob = $request->dob;
            $employee->city = $request->city;
            $employee->phone = $request->phone;
            $employee->password = Hash::make($request->password);
            $employee->image = $filename;

            $result = $employee->save();
            if ($result) {
                return response()->json([
                    "success" => true,
                    'message' => [
                        'Employee Create Successfully'
                    ]
                ]);
            } else {
                return response()->json([
                    "success" => false,
                    'message' => [
                        'Employee Not Create Successfully'
                    ]
                ]);
            }
        }
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.update', compact('employee'));
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $employee =  Employee::findOrFail($request->id);;

            $filename = "";
            $path = public_path('storage\\' . $request->old_image);
            if ($request->file('image')) {
                if (File::exists($path)) {
                    File::delete($path);
                }
                $filename = $request->file('image')->store('employee', 'public');
            } else {
                $filename = $request->old_image;
            }

            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->dob = $request->dob;
            $employee->city = $request->city;
            $employee->phone = $request->phone;
            $employee->image = $filename;

            $result = $employee->save();
            if ($result) {
                return response()->json([
                    "success" => true,
                    'message' => [
                        'Employee Update Successfully'
                    ]
                ]);
            } else {
                return response()->json([
                    "success" => false,
                    'message' => [
                        'Employee Not Create Successfully'
                    ]
                ]);
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $employee = Employee::findOrFail($id);
        $path = public_path('storage\\' . $employee->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $result = $employee->delete();
        if ($result) {
            return response()->json([
                "success" => true,
                'message' => [
                    'Employee Delete Successfully'
                ]
            ]);
        } else {
            return response()->json([
                "success" => false,
                'message' => [
                    'Employee Not Delete Successfully'
                ]
            ]);
        }
    }
}
