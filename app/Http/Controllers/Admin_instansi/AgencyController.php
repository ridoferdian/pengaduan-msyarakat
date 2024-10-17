<?php

namespace App\Http\Controllers\Admin_instansi;

use App\Models\Agency;
use App\Models\Message;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    public function index() {

        $instansis = Agency::all();

        return view('admin_instansi.instansi.index', compact('instansis'));
    }

    public function lihatInstansi($id){
        $instansi = Agency::findOrFail($id);


        if (Auth::guard('people')->user()->role == 'admin_agency' && Auth::guard('people')->user()->agency_id != $instansi->id) {
            return redirect()->back()->with('error','Anda tidak memiliki akses ke instansi ini.');
        }

        // Jika admin memiliki hak akses, tampilkan data instansi dan laporannya
        $laporan = Message::where('agency_id', $instansi->id)->get();

        return view('admin_instansi.instansi.show', compact('instansi', 'laporan'));
    }

    public function laporan($id_message) {

        $laporan = Message::where('id_message', $id_message)->first();
        $tanggapan = Response::where('id_message', $id_message)->first();

        return view('admin_instansi.instansi.laporan', compact('laporan', 'tanggapan'));

    }
}