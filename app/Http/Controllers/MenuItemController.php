<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:admin')->only([
//            'indexAdmin',
//            'entity_search',
//            'store',
//            'update',
//            'destroy'
//        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MenuItem::where('show', '=', 1)->where('deleted_at', '=', Null)->get();
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
            'menu_id' => 'required|exists:menus,id',
            'name' => 'required|string',
            'description' => 'sometimes|string',
            'price' => 'required|numeric',
            'unit_of_measure' => 'required|string',
        ]);

        return MenuItem::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return MenuItem::find($id);
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
        $menuItem = MenuItem::find($id);
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'unit_of_measure' => 'required|string',
            'show' => 'required|boolean',
        ]);

        $menuItem->update($request->all());
        return $menuItem;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return MenuItem::destroy($id);
    }
}
