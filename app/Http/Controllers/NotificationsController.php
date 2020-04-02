<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notes::with('item')->latest()->where('user_id', auth()->user()->id)->where('deleted_at','=', null)->paginate(10);
        return view('notifications', compact('notifications'));
    }
}
