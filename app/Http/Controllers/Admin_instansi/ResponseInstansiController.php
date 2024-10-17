<?php

namespace App\Http\Controllers\Admin_instansi;

use App\Mail\DoneEmail;
use App\Models\Message;
use App\Models\Response;
use App\Mail\ProsesEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ResponseInstansi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResponseInstansiController extends Controller
{
    public function createOrUpdate(Request $request){
        $laporan = Message::where('id_message', $request->id_message)->first();

        $tanggapan = ResponseInstansi::where('id_message', $request->id_message)->first();

        if($tanggapan) {
            $laporan->update(['status' => $request->status]);

            $user = Auth::guard('people')->user();

            $tanggapan->update([
            'response_date' => date('Y-m-d'),
            'response' => $request->response ,
            'id_user' => Auth::guard('people')->user()->id,
            ]);

            if ($request->status == 'proses') {
                Mail::to($laporan->email)->send(new ProsesEmail($laporan, $tanggapan));
            } elseif ($request->status == 'done') {
                Mail::to($laporan->email)->send(new DoneEmail($laporan, $tanggapan));
            }

            return redirect()->route('instansi.show', compact('laporan','tanggapan'));
        } else {
            $laporan->update(['status' => $request->status]);

            $user = Auth::guard('people')->user();

            $tanggapan = ResponseInstansi::create ([
                'id_message' => $request->id_message,
                'response_date' => date('Y-m-d'),
                'response' => $request->response ,
                'id_user' => Auth::guard('people')->user()->id,
            ]);

            if ($request->status == 'proses') {
                Mail::to($laporan->email)->send(new ProsesEmail($laporan, $tanggapan));
            } elseif ($request->status == 'done') {
                Mail::to($laporan->email)->send(new DoneEmail($laporan, $tanggapan));
            }


        return redirect()->route('instansi.show', compact('laporan','tanggapan'))->with('status', 'Berhasil Dikirim');
        }


   }
}