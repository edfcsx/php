<?php

namespace App\Http\Controllers\Panel\Users;

use App\Curriculum;
use App\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{
    public function index(){
        $cpf = Auth::user()->cpf;
        if ($cpf == null){
            flash('Identificamos que seu cadastro está desatualizado por favor acesse a aba meus dados')->error();
        }
        return view('panel.users.index');
    }

    public function meusDados(){
        $dados = Auth::user();
        return view('panel.users.meus_dados',compact('dados'));
    }

    public function enviarCurriculo(){
        $cv = Curriculum::where('user_id', Auth::user()->id)->get()->count();

        if ($cv == 0){
            flash('Seu perfil não possui nenhum curriculo cadastrado');
        }else{
            flash('Seu perfil possui um curriculo cadastrado, para atualizar anexe o novo curriculo e clique em enviar')->success();
        }
        return view('panel.users.enviar_curriculo');
    }

    public function updateUserDados(Request $request, $id){
        $userData = $request->all();
        $userData['password'] = bcrypt($userData['password']);
        $userData['cpf'] = preg_replace('~[.-]~','', $userData['cpf']);
        $userData['phone'] = preg_replace('~[-() ]~','', $userData['phone']);
        $user = User::findOrFail($id);
        $user->update($userData);
        flash('Usuário atualizado com sucesso')->success();
        return redirect()->route('user.index');
    }

    public function enviarCv(Request $request){
        $cvData = $request->file('file');
        $extension = $cvData->getClientOriginalExtension();
        if ($extension != 'pdf' AND $extension != 'docx'){
            flash('Formato de arquivo não permitido')->error();
            return redirect()->route('user.index');
        }
        $newName = sha1($cvData->getClientOriginalName()).uniqid().'.'.$cvData->getClientOriginalExtension();
        $cvData->move(public_path('cv'), $newName);
        $cont = Curriculum::where('user_id', '=', Auth::user()->id)->get()->count();
        if ($cont == 0){
            $user = User::find(Auth::user()->id);
            $user->curriculum()->create([
                'file' => $newName
            ]);
            flash('Curriculo enviado com sucesso')->success();
            return redirect()->route('user.index');
        }elseif ($cont == 1){
            $destroy = Curriculum::where('user_id', '=', Auth::user()->id)->first();
            unlink(public_path('cv/'.$destroy->file));
            $destroy->delete();
            $user = User::find(Auth::user()->id);
            $user->curriculum()->create([
                'file' => $newName
            ]);
            flash('Curriculo Atualizado com sucesso')->success();
            return redirect()->route('user.index');
        }
    }

}
