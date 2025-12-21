<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Tahapan;
use App\Models\Kontraktor;
use App\Models\LokasiProyek;


class DashboardController extends Controller
{
    public function index()
{
    $totalProyek     = Proyek::count();
    $totalTahapan    = Tahapan::count();
    $totalKontraktor = Kontraktor::count();

    $rataProgress = Proyek::avg('progress') ?? 0;

    $proyekTerbaru = Proyek::with(['lokasi', 'kontraktor'])
    ->orderBy('id_proyek', 'desc')
    ->take(5)
    ->get();

    $chartLabel = Proyek::pluck('nama_proyek');
    $chartData  = Proyek::pluck('progress');

    $lokasi = LokasiProyek::with('proyek')->get();

    return view('pages.admin.dashboard', compact(
        'totalProyek',
        'totalTahapan',
        'totalKontraktor',
        'rataProgress',
        'proyekTerbaru',
        'chartLabel',
        'chartData',
        'lokasi'
    ));
}
}
