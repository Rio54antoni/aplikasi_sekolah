<?php

namespace App\Exports;

use App\Models\Murid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MuridsExportPer implements FromView
{
    use Exportable;
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {
        // $data = Murid::whereBetween('tgl_daftar', [$this->from, $this->to])->lastest()->get();

        return view('super_admin.murid.rekapsiswaper', ['data' => Murid::whereBetween('tgl_daftar', [$this->from, $this->to])->latest('tgl_daftar', 'asc')->get()]);
    }
}
