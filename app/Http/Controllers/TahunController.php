<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tahun::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" class="btn btn-sm btn-info editupdate" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= '&nbsp';
                    $btn .=   '<button type="button" name="delete" id="' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('super_admin.tahun.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // lakukan valodation data terlebih dahulu
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required',
        ], [
            'tahun.required' => 'tahun tidak boleh kosong',
            'semester.required' => 'Harap pilih tahun semester',
        ]);
        // validation aman , maka lanjut ke proses menyimpan data request ke var data
        $data = [
            'tahun' => $request->tahun,
            'semester' => $request->semester,
        ];

        Tahun::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            $data
        );
        return response()->json(['success' => true, 'Data berhasil disimpan ']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tahun $tahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Tahun::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tahun $tahun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tahun::find($id)->delete();

        return response()->json(['success' => true, 'Data berhasil dihapus ']);
    }
}
