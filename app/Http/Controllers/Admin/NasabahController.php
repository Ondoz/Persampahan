<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = user::where('is_admin', 0)->Get();
        return view('admin.nasabah', compact('nasabah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'ttl'  => 'required',
            'alamat' => 'required',
        ]);

        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);
        $user->userdetails()->create([
            'ttl'  => $request->ttl,
            'address' => $request->alamat,
        ]);

        return back();
    }

    public function editajax(Request $request)
    {
        $nasabah = user::with('userdetails')->where('id', $request->id)->first();
        return $nasabah;
    }

    public function update(Request $request)
    {
        $nasabah = user::where('id', $request->id)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'ttl'  => 'required',
            'alamat' => 'required',
        ]);

        $nasabah->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status
        ]);

        $nasabah->userdetails()->update([
            'ttl'  => $request->ttl,
            'address' => $request->alamat,
        ]);

        return back();
    }

    public function destroy(Request $request)
    {
        $nasabah = user::where('id', $request->id)->first();
        $nasabah->delete();
        return back();
        // return $nasabah;
    }
}
