<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use Redirect;
use DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcats = DB::table('subcategories AS s')
            ->join('categories AS c', 's.catid', '=', 'c.id')
            ->select('s.*', 'c.name AS catname')
            ->get();
        // $cats = Category::all();
        return view('subcategory.index', compact('subcats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('subcategory.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:subcategories|string|max:30',
            'category' => 'required|integer',
        ]);

        $subcats = Subcategory::create(['name' => $request->name, 'catid' => $request->category]);
        $subcats->save();
        // alert()->success('Congrats!', 'You made a Widget');
        return Redirect::route('subcategory.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcat = Subcategory::findOrFail($id);
        $cats = Category::all();
        return view('subcategory.edit', compact('subcat', 'cats'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
