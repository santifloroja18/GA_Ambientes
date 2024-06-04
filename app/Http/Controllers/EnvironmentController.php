<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnvironmentRequest;
use App\Http\Requests\EnvironmentstockRequest;
use App\Models\Environment;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnvironmentController extends Controller
{
    public function rooms($id)
    {
        
        // $floors = Floor::find($id);
        // // return view('pages.floor.index', compact('rooms'));
        // return response()->json([$floors]);
        $floor = Floor::Where('floor', $id)->get();
        return response()->json([$floor]);
    }

    public function store(EnvironmentRequest $request)
    {
        Environment::create($request->validated());
        session()->flash('status_message','ambiente agragado exitosamente.');
        return back();
    }

    public function show($id)
    {
       $rooms = Environment::find($id);
       return view('pages.prestamos.ambientes.index', compact('rooms'));

    }

    public function update(Request $request, $id){
        $environ = Environment::find($id);
        $environ->environment=$request->input('environment');
        $environ->floor_id=$request->input('floor_id');
        $environ->save();
        return back()->with(session()->flash('status_message','ambiente modificado correctamente.'));
    }

    public function destroy(Environment $envi)
    {  
      $envi->delete();
      return back()->with(session()->flash('status_message', 'Ambiente eliminado correctamente'));
    }

    public function storeStock(EnvironmentstockRequest $request)
    {
      $verify = DB::select("SELECT *FROM `environmentstocks` WHERE `environmentstocks`.`element_id`= $request->element_id AND `environmentstocks`.`environment_id`=$request->environment_id");
    
       if($verify)
       {  
         session()->flash('info_message','El elemento ya ha sido agregado antes.');
         return back();
       }
       else
       {
         
         DB::insert("INSERT INTO `environmentstocks` (environment_id, element_id, cantidad) VALUES ($request->environment_id, $request->element_id, $request->cantidad)");
         session()->flash('status_message','Elemento agregado correctamente.');
         return back();
       }
    }

}
