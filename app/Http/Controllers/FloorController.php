<?php

namespace App\Http\Controllers;

use App\Http\Requests\FloorRequest;
use App\Models\Element;
use App\Models\Environment;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
       
        $data = Floor::paginate(3);
        $rooms = Environment::all()->where('floor_id', 1);
        $levels = Floor::latest('floor')->first();
        return view('pages.floor.index', compact(['data', 'rooms', 'levels']));
    }

    public function environs($id)
    {
        $items = Element::all();
        $environs = Environment::all()->where('floor_id', $id);
        return view('pages.prestamos.ambientes.index', compact(['environs','id','items']));
    }

    public function lastfloor()
    {
        $levels = Floor::latest('floor')->first();
        return response()->json([$levels]);
    }


    public function store(FloorRequest $request)
    {
        Floor::create($request->validated());
        session()->flash('status_message','Piso creado exitosamente.');
        return back();

    //     if($validation!==null){
            
    //     $data = new Floor();

    //     $data -> floor = $request -> input('floor');

    //     $data -> save();

    //     session()->flash('status_message','Piso creado exitosamente.');

    //     return to_route('floors');
    //     }
    //     else{
    //         session()->flash('status_message','Numero de piso ya creado.');

    //     return to_route('floors');
    //     }

    }

    public function save(FloorRequest $request)
    {
        Floor::create($request->validated());
        session()->flash('status_message','Piso creado exitosamente.');
        return back();

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

    public function destroy(Floor $id)
    {
       $id->delete();
       session()->flash('delete_message','Piso actualizado exitosamente.');
       return back();

    }
}
