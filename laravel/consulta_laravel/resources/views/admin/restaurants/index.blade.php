@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="float-left">Restaurantes</h1>
                <a class="float-right btn btn-outline-success" style="margin-top: 5px;" href="{{route('restaurant.new')}}">Adicionar restaurantes</a>
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
                    @foreach($restaurant as $r)
                    <tr>
                        <td>{{$r->id}}</td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->created_at}}</td>
                        <td>
                            <a href="{{route('restaurant.edit', ['id' => $r->id])}}" class="btn btn-outline-primary">Editar</a>
                            <a href="{{route('restaurant.photo', ['id' => $r->id])}}" class="btn btn-outline-warning">Foto</a>
                            <a href="{{route('restaurant.remove', ['id' => $r->id])}}" class="btn btn-outline-danger">Remover</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection