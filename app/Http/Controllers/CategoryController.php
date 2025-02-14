<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sector;

class CategoryController extends Controller
{
    public function index()
    {
        $sectors = Sector::get();
        $categories = Category::get();
        return view('category.index')->with(['categories' => $categories, 'sectors' => $sectors]);
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $sector_id = $request->sector_id;

        $category = new Category;
        $category->name = $name;
        $category->sector_id = $sector_id;
        $category->save();
        
        return redirect()->back()->with('success', 'Categoria registrada exitosamente');
    }

    public function update(Request $request)
    {
        $category_id = $request->category_id;
        $name = $request->name;
        $sector_id = $request->sector_id;


        $category = Category::find($category_id);
        $category->name = $name;
        $category->sector_id = $sector_id;
        $category->save();
        
        return redirect()->back()->with('success', 'Categoria actualixada exitosamente');
    }

    public function destroy($id)
    {
        $item = Category::findOrFail($id);

        $item->delete();

        return redirect()->back()->with('success', 'Categoria eliminada exitosamente.');
    }
}
