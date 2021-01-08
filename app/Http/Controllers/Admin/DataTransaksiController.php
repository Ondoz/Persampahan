<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTransaksiNasabah;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class DataTransaksiController extends Controller
{
    public function index($id)
    {
        $data = User::find($id);
        $sampah = Sampah::all();
        $transaksi = $data->datatransaksi;
        $arr = [];
        $saldo = 0;
        foreach ($transaksi as $key => $item) {
            $arr[$key]['uuid'] = $item->uuid;
            $arr[$key]['tanggal'] = $item->created_at;
            $arr[$key]['keterangan'] = $item->keterangan;
            $arr[$key]['debet'] = $item->debet;
            $arr[$key]['kredit'] = $item->kredit;

            $chkbala = $item->debet - $item->kredit;
            $saldo += $chkbala;
            $arr[$key]['saldo'] = number_format($saldo, 0);
        }
        // $arr['total'][] = array_sum($sum['total']);

        // return $arr;
        return view('admin.datatransaksi', compact('data', 'sampah', 'arr'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required',
        ]);

        if ($request->type == 0) {
            $sum = ($request->harga_satuan * $request->berat_sampah);
            $data = DataTransaksiNasabah::create([
                'user_id' => $id,
                'keterangan' => $request->keterangan,
                'debet'  => $sum,
                'kredit' => 0
            ]);
        } elseif ($request->type == 1) {
            $data = DataTransaksiNasabah::create([
                'user_id' => $id,
                'keterangan' => $request->keterangan,
                'debet' => 0,
                'kredit'  => $request->kredit,
            ]);
        } else {
            false;
        }

        Alert::success('Success', 'Data Tambahkan');
        return back();
    }

    public function destroy(Request $request)
    {
        $data = DataTransaksiNasabah::where('uuid', $request->uuid)->first();
        $data->delete();
        Alert::success('Success', 'Data Dihapus');
        return back();
    }
}
