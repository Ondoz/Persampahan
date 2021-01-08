<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTransaksiNasabah;
use App\Models\Kategori;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('is_admin', '0')->count();
        $dataTransaksi = DataTransaksiNasabah::all();
        $sampah = Sampah::count();
        if ($user > 0) {
            $user;
        } else {
            false;
        }
        return view('admin.dashboard', compact('user', 'dataTransaksi', 'sampah'));
    }
}
