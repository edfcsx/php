@extends('layouts.app')

@section('content')
    <h1>index fotos</h1>
    <hr/>
    <form action="{{route('restaurant.photo.save', ['id' => $restaurant_id])}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <label>Carregar Fotos</label><br/>
        <input type="file" name="photos[]" multiple>
        <br/>
        <input type="submit" class="btn" value="enviar">
    </form>
@endsection