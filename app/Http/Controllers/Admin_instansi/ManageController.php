<?php

namespace App\Http\Controllers\Admin_instansi;

use App\Models\Agency;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use App\Models\AgencyOfficer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $admins = UserAccount::all();

        return view('admin_instansi.kelola.index', compact('admins'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agencys = Agency::all();

        return view('admin_instansi.kelola.create', compact('agencys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $validate = $request->validate([
            'name' => 'required' ,
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'nik' => 'required',
            'telp' => 'required',
            'role' => 'required',
        ]);

        UserAccount::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'telp' => $data['telp'],
            'agency_id' => $data['agency_id'],
        ]);

        return redirect()->route('kelola.index')->with('success', 'Akun berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = UserAccount::find($id);
        $agencys = Agency::all();

        return view('admin_instansi.kelola.edit',compact('admin', 'agencys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $admin = UserAccount::find($id);

        $admin->update([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'telp' => $data['telp'],
            'agency_id' => $data['agency_id'],
        ]);

        return redirect()->route('kelola.index')->with('success','berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $admin = UserAccount::findOrFail($id);

        $admin->delete();
        return redirect()->route('kelola.index')->with('success', 'Akun Berhasil  Di hapus');

   }
}