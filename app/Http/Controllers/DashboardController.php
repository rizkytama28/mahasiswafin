<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalPemasukan = Transaction::where('user_id', $userId)
            ->where('type', 'pemasukan')->sum('amount');

        $totalPengeluaran = Transaction::where('user_id', $userId)
            ->where('type', 'pengeluaran')->sum('amount');

        $saldo = $totalPemasukan - $totalPengeluaran;

        $grafik = Transaction::where('user_id', $userId)
            ->selectRaw('MONTH(date) as bulan, SUM(amount) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        return view('dashboard.index', compact('totalPemasukan', 'totalPengeluaran', 'saldo', 'grafik'));
    }
}
