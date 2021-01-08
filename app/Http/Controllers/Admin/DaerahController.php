<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerah = Daerah::all();
        return view('admin.daerah', compact('daerah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        Daerah::create([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return back();
    }



    public function editajax(Request $request)
    {
        $daerah = Daerah::where('uuid', $request->uuid)->first();
        return $daerah;
    }

    public function update(Request $request)
    {
        $daerah = Daerah::where('id', $request->id)->first();
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $daerah->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return back();
    }

    function destroy(Request $request)
    {
        $daerah = Daerah::where('id', $request->id)->first();
        $daerah->delete();
        return back();
    }
}
