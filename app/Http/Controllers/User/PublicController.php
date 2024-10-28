<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\People;
use App\Models\Agency;
use App\Mail\SendEmail;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class PublicController extends Controller
{


    public function index()
    {
        $jumlahLaporan = Message::count();
        $messages = Message::all()->take(4);
        $categorys = Category::all();
        $agencys = Agency::all();
        $kementerian = Agency::where('type', 'Kementerian')->count();
        $lembaga = Agency::where('type', 'Lembaga')->count();
        $pemkot = Agency::where('type', 'Pemkot')->count();

        return view('user.index', compact('messages', 'jumlahLaporan','categorys','agencys','lembaga','kementerian','pemkot'));
    }


    public function store(Request $request) {

        if (Auth::guard('people')->check() && Auth::guard('people')->user()->role != 'user') {
            return redirect()->back()->with(['error' => 'Anda tidak memiliki akses ']);
        }

        $data = $request->all();

        $validate = $request->validate([
            'title' => 'required',
            'report' => 'required|min:10',
            'anonymous' => 'nullable|boolean',
            'photos.*' => 'nullable|image|max:2048' // Maksimal 2MB
        ]);

        $user = Auth::guard('people')->user();
        $name = $request->has('anonymous') ? 'anonymous' : $user->name;

        if ($request->anonymous) {
            $name = 'anonymous';
            $userId = null;
        } else {
            $user = Auth::guard('people')->user();
            $name = $user->name;
            $userId = $user->id;
        }

        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('message', 'public');
            }
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = Message::create([
            'date' => $data['date'],
            'name' => $name,
            'category_id' => $data['category_id'],
            'user_id' => $userId,
            'title' => $data['title'],
            'email' => $data['email'] ?? $user->email,
            'report' => $data['report'],
            'agency_id' => $data['agency_id'],
            'code' => $this->generateCode(),
            'photo' => !empty($photoPaths) ? json_encode($photoPaths) : null,
            'status' => 'pending',
        ]);
        if ($request->filled('email')) {
            Mail::to($request->input('email'))->send(new SendEmail($user, $pengaduan));
        } else if ($user->email) {
            Mail::to($user->email)->send(new SendEmail($user, $pengaduan));
        }

        if ($pengaduan) {
            $kode = $pengaduan->id_message .  date('Ymd', strtotime($pengaduan->date))  ;

            return redirect()->route('laporan.show', ['kode' => $kode])->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }

    }

    protected function generateCode() {
        $today = Carbon::now()->format('Ymd');
        $prefix = 'P' . $today;

        $sequence = 1;
        $uniqueCodeFound = false;

        while (!$uniqueCodeFound) {
            $code = $prefix . str_pad($sequence, 4, '0', STR_PAD_LEFT);

            $exists = DB::table('messages')->where('code', $code)->exists();

            if (!$exists) {
                $uniqueCodeFound = true;
            } else {
                $sequence++;
            }
        }

        return $code;
    }


    public function show($kode) {
        $id = substr($kode, 0, -8);
        $date = substr($kode, -8);

        $dateFormatted = date('Y-m-d', strtotime($date));
        $pengaduan = Message::where('id_message', $id)
                            ->whereDate('date', $dateFormatted)
                            ->firstOrFail();

        return view('laporan.show', compact('pengaduan'));
    }


    public function laporan($siapa = '')
    {
        $terverifikasi = Message::where([['user_id', Auth::guard('people')->user()->id], ['status', '!=', '0']])->get()->count();
        $proses = Message::where([['user_id', Auth::guard('people')->user()->id], ['status', 'proses']])->get()->count();
        $selesai = Message::where([['user_id', Auth::guard('people')->user()->id], ['status', 'done']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

        $categorys = Category::all();
        $agencys = Agency::all();


        if ($siapa == 'me') {
            $pengaduan = Message::where('user_id', Auth::guard('people')->user()->id)->orderBy('date', 'desc')->get();
            Carbon::setLocale('id');
            foreach ($pengaduan as $message) {
                $message->date = Carbon::parse($message->date);
            }

            return view('user.laporan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa, 'categorys' => $categorys,'agencys' => $agencys ]);
        } else {
            $pengaduan = Message::where('status', '!=', '0')
            ->orderBy('date', 'desc')
            ->get();
            $message = Message::all();
            return view('user.laporan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa,'categorys' => $categorys, 'message' => $message, 'agencys' => $agencys ]);
        }
    }

    public function update(Request $request, $id_message ){

        $message = Message::find($id_message);

        $message->update([
            'report' => $request->report,
        ]);

        return redirect()->back();


    }

    public function destroy($id_message)
    {

        $message = Message::findOrFail($id_message);
        $message->delete();
        return redirect(route('laporan', 'me'));
    }





}
