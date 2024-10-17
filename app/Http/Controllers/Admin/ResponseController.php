<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ProsesEmail;
use App\Mail\DoneEmail;
use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResponseController extends Controller
{
    public function createOrUpdate(Request $request){
        $pengaduan = Message::where('id_message', $request->id_message)->first();

        $tanggapan = Response::where('id_message', $request->id_message)->first();

        if($tanggapan) {
            $pengaduan->update(['status' => $request->status]);

            $user = Auth::guard('people')->user();

            $tanggapan->update([
            'response_date' => date('Y-m-d'),
            'response' => $request->response ,
            'id_officer' => Auth::guard('officer')->user()->id_officer ,
            ]);

            if ($request->status == 'proses') {
                Mail::to($pengaduan->email)->send(new ProsesEmail($pengaduan, $tanggapan));
            } elseif ($request->status == 'done') {
                Mail::to($pengaduan->email)->send(new DoneEmail($pengaduan, $tanggapan));
            }

            return redirect()->route('pengaduan.show', compact('pengaduan','tanggapan'));
        } else {
            $pengaduan->update(['status' => $request->status]);

            $user = Auth::guard('people')->user();

            $tanggapan = Response::create ([
                'id_message' => $request->id_message,
                'response_date' => date('Y-m-d'),
                'response' => $request->response ,
                'id_officer' => Auth::guard('officer')->user()->id_officer,
            ]);

            if ($request->status == 'proses') {
                Mail::to($pengaduan->email)->send(new ProsesEmail($pengaduan, $tanggapan));
            } elseif ($request->status == 'done') {
                Mail::to($pengaduan->email)->send(new DoneEmail($pengaduan, $tanggapan));
            }


        return redirect()->route('pengaduan.show', compact('pengaduan','tanggapan'))->with('status', 'Berhasil Dikirim');
        }


   }
}