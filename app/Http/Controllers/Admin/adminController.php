<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.admin');
    }
    public function create(Request $request)
    {
        return view('admin.createUser');
    }

    public function saveUser(Request $request)
    {
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('admin');
    }

    public function deleted_users()
    {

    }

    public function update(string $id)
    {

    }

    public function edit(string $id)
    {

    }

    public function softDelete(string $id)
    {

    }

}
