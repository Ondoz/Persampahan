<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategoris', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required'
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'status' => $request->status
        ]);

        return back();
    }

    public function editajax(Request $request)
    {
        $kategori = Kategori::where('uuid', $request->uuid)->first();
        return $kategori;
    }

    public function update(Request $request)
    {
        $kategori = Kategori::where('id', $request->id)->first();
        $request->validate([
            'nama' => 'required',
            'status' => 'required'
        ]);

        $kategori->update([
            'nama' => $request->nama,
            'status' => $request->status
        ]);

        return back();
    }

    public function destroy(Request $request)
    {
        $kategori = Kategori::where('id', $request->id)->first();
        $kategori->delete();
        return back();
        // return $kategori;
    }
}
