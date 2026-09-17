<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index(){
        $users=User::query()->get();
        return view('admin.users.showUsers', compact('users'));
    }
    public function create(Request $request)
    {
        return view('admin.users.createUser');
    }

    public function saveUser(Request $request)
    {
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('adminHome');
    }

    public function deleted_users()
    {
        $deleted_users=User::query()->onlyTrashed()->get();
        return view('admin.users.deleted_users', compact('deleted_users'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        if ($request->filled('password')) {
            $data['password'] =  Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('adminHome');
    }

    public function edit(string $id)
    {
        $user = User::query()->find($id);
        $tasks=$user->tasks()->get();
        return view('admin.users.edit', compact('user', 'tasks'));
    }

    public function softDelete(string $id)
    {
        $user = User::query()->find($id);
        $user->delete();
        return redirect()->route('admin.users.deleted_users');
    }

    public function restore(string $id)
    {
        $user = User::query()->onlyTrashed()->find($id);
        $user->restore();

        $deleted_users=User::query()->onlyTrashed()->get();
        return view('admin.users.deleted_users', compact('deleted_users'));
    }

    public function hard_delete(string $id)
    {
        $user = User::query()->onlyTrashed()->find($id);
        $user->forceDelete();

        $deleted_users=User::query()->onlyTrashed()->get();
        return view('admin.users.deleted_users', compact('deleted_users'));
    }

}
