<?php

namespace App\Exports;

use App\Vitamin;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportVitamin implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vitamin::all();
    }
}
