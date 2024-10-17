<?php

namespace App\Http\Controllers\Admin;

use App\Models\People;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAccount;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peoples = UserAccount::all();

        return view('admin.masyarakat.index',compact('peoples'));
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $people = UserAccount::find($id);

        return view('admin.masyarakat.show', compact('people'));
    }


}