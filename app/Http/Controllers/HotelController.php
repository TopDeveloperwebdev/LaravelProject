<?php

namespace App\Http\Controllers;

use App\KeyTravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{

    /**
     *
     */
    public function create()
    {
        return view('forms.hotel');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $item = $request->except('_token'); //collect(json_decode($request->items, true));

        //create matching order_id for items on same order.
        $order_id = strtoupper(md5(time() . auth()->user()->email));

        //add to parent key_travel for reference.
        $parent = auth()->user()->keyTravel()->create([
            'order_id' => $order_id,
            'type' => 'Hotel',
        ]);

        if (!$parent) {
            //remove from table.
            auth()->user()->keyTravel()->where('order_id', $order_id)->delete();
            throw new Exception('An Unknown error has occured', 1);
        }

        //loop through each item.

        $item['parent_id'] = $parent->id;

        $note = $item['note'] ?? null;
        unset($item['note']);

        //insert into db.
        $new = $parent->childRows()->create($item);

        if (!$new) {
            //remove inserted rows
            auth()->user()->keyTravel()->childRows()->where('order_id', $order_id)->delete();
            auth()->user()->keyTravel()->where('order_id', $order_id)->delete();
            throw new Exception('An Unknown error has occured', 1);
        }

        if ($note) {
            $parent->notes()->create([
                'order_id' => $order_id,
                'note' => $note,
                'user_id' => auth()->user()->id,
            ]);
        }

        return ['success' => true];
    }

    /**
     *
     */
    public function show($order)
    {

        $order = KeyTravel::where('order_id', $order)->first();
        $files = Storage::disk('files')->files($order->order_id);
        //admin user.
        if (auth()->user()->is_admin && auth()->user()->admin_view) {
            if (!$order->placed_at) {
                return view('admin.travel.hotel.show', ['order' => $order]);
            }
            return view('admin.travel.hotel.show-processing', ['order' => $order, 'files' => $files]);
        }

        if (!$order->placed_at) {
            return view('travel.hotel.show', ['order' => $order]);
        }

        return view('travel.hotel.show', ['order' => $order, 'history' => true, 'files' => $files]);
    }

    /**
     *
     */
    public function update(Request $request, $order, $item)
    {
        $order = KeyTravel::where('order_id', $order)->first();
        $item = $order->childRows()->where('id', $item)->first();

        return ['success' => $item->update($request->except('_token')) ? true : false];
    }

    /**
     *
     */
    public function processing($order)
    {
        $order = KeyTravel::where('order_id', $order)->first();

        $order->placed_at = now();
        $order->admin_id = auth()->user()->id;
        $order->save();

        return [
            'success' => true,
        ];
    }

    /**
     *
     */
    public function complete($order)
    {
        $order = KeyTravel::where('order_id', $order)->first();

        $order->completed_at = now();
        $order->save();

        return [
            'success' => true,
        ];
    }

    /**
     *
     */
    public function notes($order, $item)
    {
        $item = KeyTravel::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = KeyTravel::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }

}
