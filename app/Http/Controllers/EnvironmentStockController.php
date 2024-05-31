<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnvironmentStockRequest;
use App\Http\Resources\EnvironmentStock;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnvironmentStockController extends Controller
{
    public function elementStock($id)
    {
       
    
       $items = Element::all();
       
       
       $elements = DB::select("SELECT `a`.`id` as `environment_id`, `a`.`environment`,`c`.`id` as `element_id`, `c`.`element_name`,`b`.`id` as `stock_id`, `b`.`cantidad` FROM `environments` as a INNER JOIN `environment_stock` as b ON a.id=b.environment_id INNER JOIN `elements` as c ON b.`element_id`=c.`id` WHERE a.`environment`= $id");

       if($elements)
       {
         return view('pages.inventarios.index', compact(['elements', 'items']));
       }
       else
       {
         session()->flash('info_message','Ambiente sin inventario asociado.');
         return back();
       }
    }

    public function storeStock(EnvironmentStockRequest $request)
    {
      $verify = DB::select("SELECT *FROM `environment_stock` WHERE `environment_stock`.`element_id`= $request->element_id AND `environment_stock`.`environment_id`=$request->environment_id");
    
       if($verify)
       {  
         session()->flash('info_message','El elemento ya ha sido agregado antes.');
         return back();
       }
       else
       {
         
         DB::insert("INSERT INTO `environment_stock` (environment_id, element_id, cantidad) VALUES ($request->environment_id, $request->element_id, $request->cantidad)");
         session()->flash('status_message','Elemento agregado correctamente.');
         return back();
       }
    }

    public function updateStock(EnvironmentStockRequest $request, $id)
    {
      DB::update("UPDATE `environment_stock` SET `element_id` = $request->element_id, `cantidad` = $request->cantidad WHERE `environment_stock`.`id` = $id");

      return back();
    }

    public function destroyStock($id)
    {
      DB::delete("DELETE FROM `environment_stock` WHERE `environment_stock`.`id` = $id");
      return back();
    }
}
