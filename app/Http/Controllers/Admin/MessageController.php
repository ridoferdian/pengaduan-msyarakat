<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Message::orderBy('event_date', 'desc')->get();


        return view('admin.pengaduan.index', compact('pengaduan'));
    }


    public function show(string $id_message)
    {
        $pengaduan = Message::where('id_message', $id_message)->first();

        $tanggapan = Response::where('id_message', $id_message)->first();

        return view('admin.pengaduan.show', compact('pengaduan', 'tanggapan'));
    }

}