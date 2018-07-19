@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="float-left">Usuários</h1>
                <a class="float-right btn btn-outline-success" style="margin-top: 5px;" href="{{route('users.create')}}">Adicionar Usuários</a>
                <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $r)
                    <tr>
                        <td>{{$r->id}}</td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->created_at}}</td>
                        <td>
                            <a href="{{route('users.edit', ['id' => $r->id])}}" class="btn btn-outline-primary">Editar</a>
                            <a href="{{route('users.remove', ['id' => $r->id])}}" class="btn btn-outline-danger">Remover</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection