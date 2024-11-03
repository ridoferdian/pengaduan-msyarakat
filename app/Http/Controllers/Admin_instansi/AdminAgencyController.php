<?php

namespace App\Http\Controllers\Admin_instansi;

use Illuminate\Http\Request;
use App\Models\AgencyOfficer;
use App\Http\Controllers\Controller;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAgencyController extends Controller
{
    public function index() {
        return view('admin_instansi.index');
    }

    public function authenticate(Request $request){
        $username = UserAccount::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }


        if (Auth::guard('people')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::guard('people')->user();

            if (in_array($user->role, ['super_admin', 'admin_agency'])) {
                return redirect()->route('admin_instansi_dashboard.index');
            } else {
                Auth::guard('people')->logout();
                return redirect()->route('admin_instansi.index')->with('error', 'Anda tidak memiliki izin untuk mengakses area ini.'
                );
            }
        }
        return back()->with('error', 'Akun tidak terdaftar');
    }

    public function logout(Request $request) {
        Auth::guard('people')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin_instansi.index');
    }
}
