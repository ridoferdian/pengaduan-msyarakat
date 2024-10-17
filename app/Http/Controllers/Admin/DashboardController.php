<?php

namespace App\Http\Controllers\Admin;

use App\Models\People;
use App\Models\Message;
use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAccount;

class DashboardController extends Controller
{
    //

    public function index(){

        $masyarakat = UserAccount::all()->count();

        $petugas = Officer::all()->count();

        $proses = Message::where('status', 'proses')->get()->count();

        $selesai = Message::where('status', 'done')->get()->count();

        return view('admin.dashboard.index', compact('masyarakat', 'petugas','proses','selesai'));
    }
}