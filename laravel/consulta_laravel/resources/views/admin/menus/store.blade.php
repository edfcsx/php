@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>insercao de menu</h1>
                <hr/>
                    <form action="{{route('menu.store')}}" method="post" class="form-group">
                        {{csrf_field()}}
                        <p>
                            <label>Nome do Item:</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @if($errors->has('name')) is-invalid @endif">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </p>

                        <p>
                            <label>Preço:</label>
                            <input type="text" name="price" value="{{old('price')}}" class="form-control @if($errors->has('price')) is-invalid @endif">
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </p>

                        <p>
                            <label>Selecione um restaurante para cadastrar o item:</label>
                            <select name="restaurant_id" class="form-control">
                                @foreach($restaurant as $r)
                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('restaurant_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('restaurant_id') }}</strong>
                                </span>
                            @endif
                        </p>

                        <input type="submit" value="Cadastrar Menu" class="btn btn-info">
                    </form>
            </div>
        </div>
    </div>
@endsection