<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index()
    {
        $sampah = sampah::all();
        return view('admin.sampah', compact('sampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required'
        ]);

        Sampah::create([
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);

        return back();
    }

    public function editajax(Request $request)
    {
        $sampah = Sampah::where('uuid', $request->uuid)->first();
        return $sampah;
    }

    public function update(Request $request)
    {
        $sampah = Sampah::where('id', $request->id)->first();
        $request->validate([
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $sampah->update([
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);

        return back();
    }

    public function destroy(Request $request)
    {
        $sampah = Sampah::where('id', $request->id)->first();
        $sampah->delete();
        return back();
        // return $sampah;
    }
}
