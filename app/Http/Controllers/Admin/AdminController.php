<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.admin.index', compact('admins'));
    }

    public function delete(Request $request)
    {
        $admin = Admin::findOrFail($request->id)->delete();
        if ($admin) {
            return response()->json([
                'success' => true,
                'message' => ['Admin delete successfully']
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => ['Admin not delete successfully']
            ]);
        }
    }


    public function add()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'phone' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()
            ]);
        } else {
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->password = Hash::make($request->password);
            $admin->save();
            return response()->json([
                'success' => true,
                'message' => ['Admin add successfully']
            ]);
        }
    }


    public function edit(string $id){
        $admin=Admin::findOrFail($id);
        return view('admin.admin.update',compact('admin'));
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()
            ]);
        } else {
            $admin =  Admin::findOrFail($request->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->save();
            return response()->json([
                'success' => true,
                'message' => ['Admin Update successfully']
            ]);
        }
    }
    
}
