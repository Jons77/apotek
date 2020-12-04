<?php

namespace App\Exports;

use App\Obat;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportObat implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Obat::all();
    }
}
