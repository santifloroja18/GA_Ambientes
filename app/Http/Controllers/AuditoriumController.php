<?php

namespace App\Http\Controllers;

use App\Models\Auditorium;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class AuditoriumController extends Controller
{
    public function indexAuditoriumTres()
    {
        return View('pages.auditorium.auditorium_301.index');
    }

    public function indexAuditoriumSeis()
    {
        return View('pages.auditorium.auditorium_601.index');
    }

    public function storeTres(Request $request)
    {
        $request -> validate([
            'start' => 'required|after_or_equal:today',
            'end' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'dependencia' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required',
        ]);

        $data = new Auditorium();

        $data -> start = $request -> input('start');
        $data -> end = $request -> input('end');
        $data -> hora_ini = $request -> input('hora_inicio');
        $data -> hora_fin = $request -> input('hora_fin');
        $data -> dependencia = $request -> input('dependencia');
        $data -> email = $request -> input('email');
        $data -> telefono = $request -> input('telefono');
        $data -> title = $request -> input('title');
        $data -> descripcion = $request -> input('descripcion');
        $data -> belongs_auditorium = $request -> input('belongs_auditorium');

        $data -> save();

        return to_route('reservas-auditorio-301');
    }

    public function storeSeis(Request $request)
    {
        $request -> validate([
            'start' => 'required',
            'end' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'dependencia' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required',
        ]);

        $data = new Auditorium();

        $data -> start = $request -> input('start');
        $data -> end = $request -> input('end');
        $data -> hora_ini = $request -> input('hora_inicio');
        $data -> hora_fin = $request -> input('hora_fin');
        $data -> dependencia = $request -> input('dependencia');
        $data -> email = $request -> input('email');
        $data -> telefono = $request -> input('telefono');
        $data -> title = $request -> input('title');
        $data -> descripcion = $request -> input('descripcion');
        $data -> belongs_auditorium = $request -> input('belongs_auditorium');

        $data -> save();

        return to_route('reservas-auditorio-601');
    }

    public function showAuditoriumTres()
    {
        $reservas = Auditorium::Where('belongs_auditorium','=','301') -> get();

        return response() -> json($reservas);
    }

    public function showAuditoriumSeis()
    {
        $reservas = Auditorium::Where('belongs_auditorium','=','601') -> get();

        return response() -> json($reservas);
    }


    public function editAuditoriumTres($id)
    {
        $data = Auditorium::Find($id);

        return view('pages.auditorium.auditorium_301.edit', compact('data'));
    }

    public function editAuditoriumSeis($id)
    {
        $data = Auditorium::Find($id);

        return view('pages.auditorium.auditorium_601.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Auditorium::Find($id);

        $data -> start = $request -> input('start');
        $data -> hora_ini = $request -> input('hora_inicio');
        $data -> hora_fin = $request -> input('hora_fin');
        $data -> dependencia = $request -> input('dependencia');
        $data -> email = $request -> input('email');
        $data -> telefono = $request -> input('telefono');
        $data -> title = $request -> input('title');
        $data -> descripcion = $request -> input('descripcion');

        $data -> save();

        // $data = ;

        if( $request -> input('belongs_auditorium') == 301)
        {
            return to_route('reservas-auditorio-301');
        }else
        {
            return to_route('reservas-auditorio-601');
        }

        // session()->flash('status_message','Reserva editada exitosamente.');

        
    }

    public function destroyTres($id)
    {

        Auditorium::destroy($id);

        return to_route('reservas-auditorio-301');
    }

    public function destroySeis($id)
    {

        Auditorium::destroy($id);

        return to_route('reservas-auditorio-601');
    }
}
