<?php

namespace App\Imports;


use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithFormatData;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScheduleImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithFormatData
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Schedule([
            'instructor' => $row['instructor'],
            'programa' => $row['programa'],
            'hora_entrada' => $row['hora_entrada'],
            'hora_salida' => $row['hora_salida']
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }
    
    public function chunkSize(): int
    {
        return 100;
    }
}