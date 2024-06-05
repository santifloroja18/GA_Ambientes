<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\reportLoan;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function search(Request $request)
    {
        $request -> validate([
            'search_id' => 'required|numeric'
        ]);

        date_default_timezone_set("America/Bogota");

        $fecha = date("o-m-d");

        $dia = date("l");

        $id = $request -> input('search_id');

        $data = DB::select("SELECT * FROM `schedules` WHERE `documento` = $id  AND `dia` = '$dia' AND `disponibilidad` = 1");

        if($data == [])
        {
            session()->flash('faild_request','Este instructor no se encuentra con disponibilidad en el cronograma para el día de hoy, verifique si el número de documento es correcto.');

            return back();

        }else
        {   
            
            return view('pages.loan.index', compact(['data','dia']));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Loan();

        $data -> instructor = $request -> input('instructor');
        $data -> telefono = $request -> input('telefono');
        $data -> email = $request -> input('email');
        $data -> documento = $request -> input('documento');
        $data -> programa = $request -> input('programa');
        $data -> hora_entrada = $request -> input('hora_entrada');
        $data -> hora_salida = $request -> input('hora_salida');
        $data -> dia = $request -> input('dia');
        $data -> ambiente = $request -> input('ambiente');
        $data -> disponibilidad = $request -> input('disponibilidad');


        $data -> save();

        $data = new reportLoan();

        $data -> instructor = $request -> input('instructor');
        $data -> telefono = $request -> input('telefono');
        $data -> email = $request -> input('email');
        $data -> documento = $request -> input('documento');
        $data -> programa = $request -> input('programa');
        $data -> hora_entrada = $request -> input('hora_entrada');
        $data -> hora_salida = $request -> input('hora_salida');
        $data -> dia = $request -> input('dia');
        $data -> ambiente = $request -> input('ambiente');

        $data -> save();

        $data = Schedule::Find($request -> input('id'));

        $data -> disponibilidad = $request -> input('disponibilidad');

        $data -> save();


        session()->flash('status_message','Ambiente prestado con exito.');

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function cerrar($id)
    {

        Loan::destroy($id);

        return to_route('dashboard');


        // DB::update("UPDATE 'loans' WHERE  `instructor` = '$data -> instructor' ");

    }
}
