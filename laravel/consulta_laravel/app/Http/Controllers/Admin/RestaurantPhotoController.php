<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantPhotoController extends Controller
{
    public function index($id){
        $restaurant_id = $id;
        return view('admin.restaurants.photos.index', compact('restaurant_id'));
    }

    public function store(Request $request,$id){
        foreach ($request->file('photos') as $p){
            $newName =  sha1($p->getClientOriginalName()). uniqid().'.'.$p->getClientOriginalExtension();
            $p->move(public_path('images'), $newName);
        }

        $restaurant = Restaurant::find($id);
        $restaurant->photos()->create([
           'photo' => $newName
        ]);
        flash('Foto inserida com sucesso')->success();
        return redirect()->route('restaurant.index');
    }
}
