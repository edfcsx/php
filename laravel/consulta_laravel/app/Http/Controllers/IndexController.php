<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function restaurants(){
        $restaurant = Restaurant::all();
        return view('restaurants', compact('restaurant'));
    }

}
