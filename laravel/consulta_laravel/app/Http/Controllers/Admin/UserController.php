<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestCreate;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.register');
    }

    public function store(UserRequestCreate $request){

        $userData = $request->all();
        $request->validated();
        $userData['password'] = Hash::make($userData['password']);
        $user = new User();
        $user->create($userData);
        print "Usuario criado com sucesso";
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }


    public function update(UserRequest $request, $id)
    {
        $userData = $request->all();
        $request->validated();
        $userData['password'] = Hash::make($userData['password']);
        $user = User::find($id);
        $user->update($userData);
        return 'Usuário alterado com sucesso.';
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return 'Usuario apagado com sucesso';
    }
}
