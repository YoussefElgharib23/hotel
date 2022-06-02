<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function contacts()
    {
        $c = Contact::paginate();
        return view('admin.contacts', compact('c'));
    }

    public function users()
    {
        $users = User::where('role', 'admin_manager')->latest()->paginate()->withQueryString();
        return view('admin.users.index', ['users' => $users]);
    }

    public function storeUsers(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
            ],
        ]);

        User::create([
            ...$request->except('password'),
            'password' => Hash::make($data['password']),
            'role' => 'admin_manager'
        ]);

        return redirect()->back()->with('success', 'L\'utilisateur a été créé avec succès');
    }

    public function editUser(User $user)
    {
        return view('admin.users.modal', compact('user'));
    }

    public function updateUser(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
            ],
        ]);

        $user->update([
            ...$request->except('password'),
            'password' => Hash::make($data['password']),
            'role' => 'admin_manager'
        ]);

        return redirect()->back()->with('success', 'L\'utilisateur a été mis a jour avec succès');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'L\'utilisateur a été supprimee avec succès');
    }
}
