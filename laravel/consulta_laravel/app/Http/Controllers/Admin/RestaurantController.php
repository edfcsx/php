<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantRequest;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(){
        //$restaurant = Restaurant::where('owner_id', Auth::user()->id)->get();
        $restaurant = Auth::user()->restaurants;
        return view('admin.restaurants.index', compact('restaurant'));
    }

    public function new(){
        return view('admin.restaurants.store');
    }

    public function store(RestaurantRequest $request){
        $restaurantData = $request->all();
        $request->validated();
        $user = Auth::user();
        $user->restaurants()->create($restaurantData);
        flash('Restaurante criado com sucesso')->success();
        return redirect()->route('restaurant.index');
    }

    public function edit($id){
        $restaurant = Restaurant::find($id);
        return view('admin.restaurants.edit', compact('restaurant'));
        }

    public function update(RestaurantRequest $request, $id){
        $restaurantData = $request->all();
        $request->validated();
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($restaurantData);
        flash('Restaurante atualizado com sucesso')->success();
        return redirect()->route('restaurant.edit', ['id' => $id]);
    }

    public function delete($id){
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        flash('Restaurante removido com sucesso')->success();
        return redirect()->route('restaurant.index');
    }
}
