<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('pages.user.index', compact('data'));
    }

    public function create()
    {
         return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'telefono' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        User::create([
            "name" => $request -> name,
            "email" => $request -> email,
            "hora_inicio" => $request -> hora_inicio,
            "hora_fin" => $request -> hora_fin,
            "telefono" => $request -> telefono,
            "password" => Hash::make($request -> password)

        ]) -> assignRole($request -> role);

        session()->flash('status_message','Nuevo usuario creado exitosamente.');

        return to_route('users');
    }

    public function edit($id)
    {
        $data = User::Find($id);

        return view('pages.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = User::Find($id);

        $data -> name = $request -> input('name');

        $data -> email = $request -> input('email');

        $data -> save();

        session()->flash('status_message','Usuario editado exitosamente.');

        return to_route('users');
    }


    // metodos vista y form para editar rol de usuario
    public function editRole(User $user)
    {
        $roles = Role::all();

        return view('pages.user.editRole', compact('user','roles'));
    }

    public function updateRole(Request $request,User $user)
    {
        $user -> roles()->sync($request -> roles);
        
        session()->flash('status_message','Rol asignado exitosamente.');

        return to_route('users');
    }
}
