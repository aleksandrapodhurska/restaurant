<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Menu::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'parent' => 'sometimes|int',
            'name' => 'required|string',
            'description' => 'sometimes|string',
            'image_id' => 'sometimes|int',
            'is_exclusive' => 'sometimes|boolean'
        ]);

        return Menu::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Menu::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        $request->validate([
            'parent' => 'sometimes|int',
            'name' => 'required|string',
            'description' => 'sometimes|string',
            'image_id' => 'sometimes|int',
            'is_exclusive' => 'required|boolean',
            'show' => 'required|boolean'
        ]);

        $menu->update($request->all());
        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        return $menu->delete();
    }

    /**
     * Searches for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Menu::where('name', 'like', '%' . $name . '%')->get();
    }
}
