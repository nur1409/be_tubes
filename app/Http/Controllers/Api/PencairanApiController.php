<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pencairan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PencairanApiController extends Controller
{
    public function index()
    {
        return response()->json(Pencairan::with('siswa')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal_cair' => 'required|date',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string'
        ]);

        $pencairan = Pencairan::create($request->all());

        return response()->json([
            'message' => 'Data pencairan berhasil disimpan',
            'data' => $pencairan
        ], 201);
    }
}
