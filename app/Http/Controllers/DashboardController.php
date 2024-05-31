<?php

namespace App\Http\Controllers;

use App\Models\Auditorium;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        date_default_timezone_set("America/Bogota");

        $fecha = date("o-m-d");

        $data = Auditorium::Where('start', '=', $fecha) -> get();

        $prestamos = Loan::Where('disponibilidad', '=', 0) -> get();

        return view('dashboard', compact('data','prestamos'));
    }



    public function dateTime(){

        date_default_timezone_set("America/Bogota");

        $fech = date("o");

        return view('partials.sidebar');
    }
}
