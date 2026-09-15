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
        User::create([$request->all()]);
        return redirect('admin');
    }

}
