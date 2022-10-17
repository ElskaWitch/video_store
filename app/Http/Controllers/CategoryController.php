<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListCategories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ListCategories::orderBy('created_at', 'desc')->get();
        return view('pages.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'name' => 'required|max:150|string',
        ]);

        // save to BDD
        ListCategories::create([
            'name' => $request->name,
            'created_at' => now()
        ]);

        // redirect
        return back()->with('status', 'Category add success!');
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
    public function edit(ListCategories $category)
    {
        return view('pages.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListCategories $category)
    {
        $request->validate([
            'name' => 'required|max:150|string',
        ]);

        $category->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('categories.index', $category->id)
            ->with('status', 'La category a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListCategories $category)
    {
        $category->delete();
        return redirect()
            ->route('categories.index')
            ->with('status', "La categorie a bien été supprimé");
    }
}
