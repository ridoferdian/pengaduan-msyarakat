<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $code = Message::latest();

        if(request('q')) {
           $code->where('code', 'like' , '%' . request('q') . '%');
        }
        $messages = $code->get();
        return view('user.search', compact('messages'));
    }
}