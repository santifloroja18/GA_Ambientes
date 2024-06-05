<?php

namespace App\Http\Controllers;

use App\Exports\EnvironmentstockExport;
use App\Http\Requests\EnvironmentstockRequest;
use App\Models\Element;
use App\Models\Environment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EnvironmentstockController extends Controller
{
    public function elementslist()
    {
      return view('pages.inventarios.index');
    }
    public function elementStock($id)
    {
       
    
       $items = Element::all();
       $room = DB::select("SELECT *FROM `environments` WHERE `environments`.`environment` = $id");
       
       $elements = DB::select("SELECT `a`.`id` as `environment_id`, `a`.`environment`,`c`.`id` as `element_id`, `c`.`element_name`,`b`.`id` as `stock_id`, `b`.`cantidad` FROM `environments` as a INNER JOIN `environmentstocks` as b ON a.id=b.environment_id INNER JOIN `elements` as c ON b.`element_id`=c.`id` WHERE a.`environment`= $id");

       if($elements)
       {
         return view('pages.inventarios.index', compact(['elements', 'items', 'room']));
       }
       else
       {
         
         return view('pages.inventarios.index', compact(['elements', 'items', 'id', 'room']));
       }
    }

    public function storeStock(EnvironmentStockRequest $request)
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

    public function updateStock(EnvironmentstockRequest $request, $id)
    {
      DB::update("UPDATE `environmentstocks` SET `element_id` = $request->element_id, `cantidad` = $request->cantidad WHERE `environmentstocks`.`id` = $id");
      return back()->with('update', true);
    }

    public function destroyStock($id)
    {
      DB::delete("DELETE FROM `environmentstocks` WHERE `environmentstocks`.`id` = $id");
      session()->flash('status_message','Elemento eliminado correctamente.');
      return back()->with('delete', true);
    }

    public function import()
    {

    }

    public function export()
    {
      return Excel::download(new EnvironmentstockExport, 'inventario.xlsx');
    }
}
