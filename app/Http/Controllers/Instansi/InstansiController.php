<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

     public function show($slug)
     {
         $instansi = Agency::where('slug', $slug)->firstOrFail();
         return view('user.instansi.show', compact('instansi'));
     }



}