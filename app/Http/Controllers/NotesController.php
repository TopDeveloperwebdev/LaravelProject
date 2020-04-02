<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order, $item)
    {
        return $item->notes->reverse()->values();
    }

    /**
     *
     */
    public function store(Request $request, $order, $item)
    {

        $note = $item->notes()->create([
            'order_id' => $item->order_id,
            'note' => $request->note,
            'user_id' => auth()->user()->id,
            'url' => $request->segment(1) . '/' . $request->segment(2)
        ]);

        return $note;   
    }
}
