<?php

namespace App\Http\Controllers;

use App\Catering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CateringController extends Controller
{

    /**
     *
     */
    public function create()
    {
        return view('forms.catering');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        //create matching order_id for items on same order.
        $order_id = strtoupper(md5(time() . auth()->user()->email));

        $note = $data['note'] ?? null;
        unset($data['note']);

        $data['order_id'] = $order_id;

        foreach ($data as &$value) {
            if ($value == "on") {
                $value = 1;
            }
        }

        //insert into db.
        $new = auth()->user()->catering()->create($data);

        if (!$new) {
            //remove inserted rows
            // auth()->user()->keyTravel()->where('order_id', $order_id)->delete();
            throw new Exception('An Unknown error has occured', 1);
        }

        if ($note) {
            $new->notes()->create([
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
        $order = Catering::where('order_id', $order)->first();

        if (auth()->user()->is_admin && auth()->user()->admin_view) {
            if (!$order->placed_at) {
                return view('admin.catering.show', ['order' => $order]);
            }
            if ($order->placed_at) {
                return view('admin.catering.show-processing', ['order' => $order]);
            }
            dd('here');
        }

        if (!$order->placed_at) {
            return view('catering.show', ['order' => $order]);
        }

        return view('catering.show', ['order' => $order, 'history' => true]);
    }

    /**
     *
     */
    public function update(Request $request, $order)
    {
        $order = Catering::where('order_id', $order)->first();

        return [
            'success' => $order->update($request->except('_token')) ? true : false,
        ];

    }

    /**
     *
     */
    public function processing($order)
    {
        $order = Catering::where('order_id', $order)->first();

        return [
            'success' => $order->update([
                'admin_id' => auth()->user()->id,
                'placed_at' => now(),
            ]) ? true : false,
        ];

    }

    /**
     *
     */
    public function complete($order)
    {
        $order = Catering::where('order_id', $order)->first();

        return [
            'success' => $order->update([
                'completed_at' => now(),
            ]) ? true : false,
        ];

    }

    /**
     *
     */
    public function notes($order, $item)
    {
        $item = Catering::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = Catering::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }

    /**
     *
     *
     */
    public function upload(Request $request, $order, $item, $type)
    {
        $file = $request->file('file');
        $item = Catering::find($item);

        $name = $file->move(storage_path('app/files/'), $file->hashName());
        $item->{$type} = pathinfo($name, PATHINFO_BASENAME);
        $item->save();

        return ['success' => true, 'file' => $item->{$type}];
    }

    /**
     *
     */
    public function file($order, $item, $file)
    {
        return response()->file(Storage::disk('files')->path($file));
    }

    /**
     *
     */
    public function deleteFile($order, $item, $type)
    {
        $item = Catering::find($item);

        Storage::disk('files')->delete($item->{$type});

        $item->{$type} = null;
        $item->save();

        return ['success' => true];
    }
}
