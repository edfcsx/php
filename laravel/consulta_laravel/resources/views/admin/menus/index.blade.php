@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="float-left">Menu</h1>
                <a class="float-right btn btn-outline-success" style="margin-top: 5px;" href="{{route('menu.create')}}">Adicionar Menu</a>
                <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Restaurante</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($menu as $r)
                            <tr>
                                <td>{{$r->id}}</td>
                                <td>{{$r->name}}</td>
                                <td><a href="{{route('restaurant.edit', ['id' => $r->restaurant->id])}}">{{$r->restaurant->name}}</a></td>
                                <td>R$:     {{$r->price}}</td>
                                <td>
                                    <a href="{{route('menu.edit', ['id' => $r->id])}}" class="btn btn-outline-primary">Editar</a>
                                    <a href="{{route('menu.remove', ['id' => $r->id])}}" class="btn btn-outline-danger">Remover</a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection