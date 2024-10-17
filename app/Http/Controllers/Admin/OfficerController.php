<?php

namespace App\Http\Controllers\Admin;

use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Officer::all();

        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'name_officer' => ['required', 'max:255' ] ,
            'username' => ['required', 'string', 'unique:officers'] ,
            'password' => ['required','string', 'min:8'] ,
            'telp' => ['required'] ,
            'level' => ['required', 'in:admin,officer'] ,
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }

        $username = Officer::where('username', $data['username'])->first();

        if($username) {
           return redirect()->back()->with(['username', 'Username sudah digunakan']);
        }

        Officer::create([
            'name_officer' => $data['name_officer'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level']
        ]);

        return redirect()->route('petugas.index')->with('succes', 'petugas berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_officer)
    {
        $petugas = Officer::find($id_officer);

        return view('admin.petugas.edit',compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_officer)
    {
        $data = $request->all();

        $petugas = Officer::find($id_officer);

        $petugas->update([
            'name_officer' => $data['name_officer'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level']
        ]);

        return redirect()->route('petugas.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_officer)
    {
        $petugas = Officer::findOrFail($id_officer);

        $petugas->delete();
        return redirect()->route('petugas.index');
    }
}