<?php

namespace App\Http\Controllers\User;

use App\Models\People;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UserAcountSeeder;

class AuthController extends Controller
{

    public function index(){
        return view('login');
    }

    public function authenticate(Request $request)
    {


        $username = UserAccount::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }


        if (Auth::guard('people')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }

    }

    public function formRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $data = $request->all();

        $validate = $request->validate( [
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:8'],
            'telp' => ['required'],
        ]);



        $username = UserAccount::where('username', $request->username)->first();

        if($username){
            return redirect()->back()->with(['pesanNama' =>  'username sudah terdaftar']);
        }


        UserAccount::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'telp' => $data['telp'],
            'agency_id' => $data['role'] == 'user' ? null : $data['agency_id'],
        ]);

        return redirect()->route('submit')->with(['success' => 'Akun berhasil terdaftar']);

    }


    public function logout(Request $request)
    {
        Auth::guard('people')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}