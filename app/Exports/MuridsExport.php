<?php

namespace App\Exports;

use App\Models\Murid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MuridsExport implements FromView
{
    use Exportable;


    public function view(): View
    {
        return view('super_admin.murid.rekapsiswa', [
            'data' => Murid::all()
        ]);
    }
}
