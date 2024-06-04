<?php

namespace App\Exports;

use App\Models\Environment;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EnvironmentstockExport implements FromCollection,  ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
       use Exportable;

        public function collection()
        {
            return Environment::all();
        }    
}
