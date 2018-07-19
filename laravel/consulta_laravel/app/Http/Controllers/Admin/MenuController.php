<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\MenuRequest;
use App\Menu;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    public function index(){

        $restaurant = Auth::user()->restaurants()->select('id')->get()->toArray();
        $menu = Menu::whereIn('restaurant_id', $restaurant)->get();
        return view('admin.menus.index', compact('menu'));
    }



    public function create(){
        $restaurant = Restaurant::where('owner_id', Auth::user()->id)->get();
        return view('admin.menus.store', compact('restaurant'));
    }

    function store(MenuRequest $request)
    {
        $menuData = $request->all();
        $request->validated();
        $restaurant = Restaurant::find($menuData['restaurant_id']);
        $restaurant->menus()->create($menuData);
        flash('Menu criado com sucesso')->success();
        return redirect()->route('menu.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $restaurant = Restaurant::all('id', 'name');
        $menu = Menu::find($id);
        return view('admin.menus.edit', compact('menu','restaurant'));
    }

    public function update(MenuRequest $request, $id)
    {

        /*
         * Outra forma de fazer usando a associação seria
            $menuData = $request->all();
            $request->validated();
            $menu = Menu::find($id);
            $menu->restaurant()->associate($menuData['restaurant_id']);
            $menu->update($menuData);
            */

        $menuData = $request->all();
        $request->validated();
        $menu = Menu::FindOrFail($id);
        $menu->update($menuData);
        flash('Menu alterado com sucesso')->success();
        return redirect()->route('menu.index');
    }

    public function destroy($id)
    {
        $menu = Menu::FindOrFail($id);
        $menu->delete();
        flash('Menu apagado com sucesso')->success();
        return redirect()->route('menu.index');
    }
}
