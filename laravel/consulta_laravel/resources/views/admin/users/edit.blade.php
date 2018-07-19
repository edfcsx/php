@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edição de Usuarios</h1>
                <hr/>
                <form action="{{route('users.update', ['id' => $user->id])}}" method="post" class="form-group">
                    {{csrf_field()}}
                    <p>
                        <label>Nome do usuario:</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @if($errors->has('name')) is-invalid @endif">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </p>

                    <p>
                        <label>Email:</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control @if($errors->has('email')) is-invalid @endif">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </p>

                    <p>
                        <label>Senha:</label>
                        <input id="password" type="password" name="password" value="" class="form-control @if($errors->has('password')) is-invalid @endif">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </p>

                    <p>
                        <label>Confirmacao de Senha:</label>
                        <input id="password" type="password" name="password_confirmation" value="" class="form-control @if($errors->has('password')) is-invalid @endif">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </p>



                    <input type="submit" value="Atualizar Usuario" class="btn btn-info btn-sm">

                </form>
            </div>
        </div>
    </div>
    @endsection