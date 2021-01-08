<?php

namespace App\Http\Controllers;

use App\Models\DataTransaksiNasabah;
use App\Models\Sampah;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function index()
    {
        $sampah = Sampah::all();
        $user = auth()->user();
        $tabungan  = $user->datatransaksi;
        $arr = [];
        $saldo = 0;
        foreach ($tabungan as $key => $item) {
            $arr[$key]['uuid'] = $item->uuid;
            $arr[$key]['tanggal'] = $item->created_at;
            $arr[$key]['keterangan'] = $item->keterangan;
            $arr[$key]['debet'] = $item->debet;
            $arr[$key]['kredit'] = $item->kredit;

            $chkbala = $item->debet - $item->kredit;
            $saldo += $chkbala;
            $arr[$key]['saldo'] = number_format($saldo, 0);
        }
        // return $arr;
        return view('tabungan', compact('arr', 'sampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
        ]);

        $data = DataTransaksiNasabah::create([
            'user_id' => auth()->user()->id,
            'keterangan' => $request->keterangan,
            'debet' => 0,
            'kredit'  => $request->kredit,
        ]);

        return back();
    }
}
