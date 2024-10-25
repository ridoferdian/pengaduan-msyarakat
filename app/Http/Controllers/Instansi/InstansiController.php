<?php

namespace App\Http\Controllers\Instansi;

use Carbon\Carbon;
use App\Models\Agency;
use App\Models\Message;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InstansiController extends Controller
{
    public function index(){
        $instansis = Agency::paginate(20)->withQueryString();
       return view('user.instansi.index', compact('instansis'));
    }
     public function read(){
        return 'Silahkan Melakukan Pencarian Data';
     }

     public function search(Request $request)
     {
         $keyword = $request->get('keyword');
         $instansis = Agency::where('name', 'LIKE', "%$keyword%")
                           ->orWhere('parent', 'LIKE', "%$keyword%")
                           ->orWhere('type', 'LIKE', "%$keyword%")
                           ->get();

         return view('user.instansi.search-results', compact('instansis'));
     }


    public function show($slug, Request $request)
{
    // Temukan instansi berdasarkan slug
    $instansi = Agency::where('slug', $slug)->firstOrFail();

    // Dapatkan filter status dari request
    $status = $request->input('status');

    switch ($status) {
        case 'waiting':
            $pengaduan = Message::where('status', '0')->paginate(10);
            break;
        case 'proses':
            $pengaduan = Message::where('status', 'proses')->paginate(10);
            break;
        case 'done':
            $pengaduan = Message::where('status', 'done')->paginate(10);
            break;
        default:
            // Jika tidak ada filter, tampilkan semua pesan
            $pengaduan = Message::where('agency_id', $instansi->id)->paginate(10);
            break;
    }
    // Kirim instansi, status, dan pesan ke view
    return view('user.instansi.show', compact('instansi', 'status', 'pengaduan'));
}






}