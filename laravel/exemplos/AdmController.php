<?php

namespace App\Http\Controllers\Panel\Adm;

use App\Curriculum;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdmController extends Controller{

    public function index(){
        return view('panel.adm.index');
    }

    public function showUsers(){
        $users = User::all('id','name','email','access_key')
        ->where('access_key','=','1');
        return view('panel.adm.users', compact('users'));
    }

    public function showOnlyUser($id){
        $user = DB::table('users')
            ->join('curriculum', 'users.id', '=', 'curriculum.user_id')
            ->select('users.*', 'curriculum.*')
            ->where('users.id','=',$id)
            ->get()->first();
        return view('panel.adm.onlyuser', compact('user'));
    }

    public function showCv($cv){
        $file = public_path().'/cv/'.$cv;
        return response()->file($file);
    }

}
