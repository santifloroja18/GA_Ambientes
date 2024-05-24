<?php

namespace App\Http\Controllers;

use App\Imports\ScheduleImport;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleController extends Controller
{
    public function index()
    {
        // $data = Schedule::all();

        // return view('pages.schedule.index', compact('data'));

        $data = Schedule::paginate(7);

        return view('pages.schedule.index', compact('data'));
    }

    public function create()
    {
        return view('pages.schedule.create');
    }

    public function import(Request $request)
    {
        $file = $request -> file('schedule');

        Excel::import( new ScheduleImport, $file);

        session()->flash('status_message','Cronograma importado exitosamente.');

        return to_route('schedules');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
