<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function getLaporan(Request $request) {
        $from = $request->from . ' ' . '00.00.00' ;
        $to = $request->to . ' ' . '23.59.59' ;

        $pengaduans = Message::whereBetween('date', [$from,$to])->get();

        return view('admin.Laporan.index' , compact('pengaduans', 'from', 'to'));
    }

    public function cetakLaporan($from, $to){
        $pengaduans = Message::whereBetween('date', [$from,$to])->get();

        $pdf = PDF::loadView('admin.laporan.cetak', ['pengaduans' => $pengaduans] );

        return $pdf->download('laporan-pengaduan.pdf');

    }
}