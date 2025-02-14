<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;

class SectorController extends Controller
{
    // vista del sector
    public function index()
    {
        $sectors = Sector::get();
        return view('sector.index')->with(['sectors' => $sectors]);
    }

    public function store(Request $request)
    {
        $name = $request->name;

        $sector = new Sector;
        $sector->name = $name;
        $sector->save();
        
        return redirect()->back()->with('success', 'Empresa registrada exitosamente');
    }

    public function update(Request $request)
    {
        $sector_id = $request->sector_id;
        $name = $request->name;


        $sector = Sector::find($sector_id);
        $sector->name = $name;
        $sector->save();
        
        return redirect()->back()->with('success', 'Empresa actualixada exitosamente');
    }

    public function destroy($id)
    {
        $item = Sector::findOrFail($id);

        $item->delete();

        return redirect()->back()->with('success', 'Empresa eliminada exitosamente.');
    }




}
