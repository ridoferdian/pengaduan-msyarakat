<?php

namespace App\Http\Controllers\Admin_instansi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstansiDashboardController extends Controller
{
    public function index() {
        return view('admin_instansi.dashboard.index');
    }
}