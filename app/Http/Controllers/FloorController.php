<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FloorController extends Controller
{
    public function index()
    {
        $data = Floor::all();

        return view('pages.floor.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'floor' => 'required|'
        ]);

        $data = new Floor();

        $data -> floor = $request -> input('floor');

        $data -> save();

        session()->flash('status_message','Piso creado exitosamente.');

        return to_route('floors');
    }

    public function edit($id)
    {
        $data = Floor::FindOrFail($id);
        return view('pages.floor.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'floor' => 'required|'
        ]);

        $data = Floor::find($id);

        $data -> floor = $request -> input('floor');

        $data -> save();

        session()->flash('status_message','Piso actualizado exitosamente.');

        return to_route('floors');
    }
}
