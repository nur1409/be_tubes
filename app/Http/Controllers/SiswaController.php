<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return response()->json(Siswa::all());
    }

    public function store(Request $request) 
    {
        $validated = $request->validate(([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
        ]));

        $siswa = Siswa::create($validated);
        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        return response()->json(Siswa::findOrFail($id));

    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return response()->json($siswa);
    }

    public function destroy($id)
    {
        Siswa::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
