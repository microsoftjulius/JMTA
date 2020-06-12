<?php

namespace App\Exports;

use App\Trainee;
use Maatwebsite\Excel\Concerns\FromCollection;

class TraineeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Excel::download(new TraineeExport, 'trainees.xlsx');
    }
}
