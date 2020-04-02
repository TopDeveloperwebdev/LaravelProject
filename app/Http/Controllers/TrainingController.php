<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{

    /**
     *
     *
     */
    public function create()
    {
        return view('forms.training');
    }

    /**
     *
     *
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        //create matching order_id for items on same order.
        $order_id = strtoupper(md5(time() . auth()->user()->email));

        $data['order_id'] = $order_id;

        $note = $data['note'] ?? null;
        unset($data['note']);

        $booleans = [
            'national',
            'international',
            'new_supplier',
        ];

        foreach ($booleans as $bool) {
            $data[$bool] = isset($data[$bool]) && $data[$bool] == "on" ? 1 : 0;
        }

        //insert into db.
        $new = auth()->user()->training()->create($data);

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

        if ($request->hasFile('quote1')) {
            $file = $request->file('quote1');
            $file->move(storage_path('app/files/' . $order_id . '/'), 'quote_1.' . $file->getClientOriginalExtension());
        }
        if ($request->hasFile('quote2')) {
            $file = $request->file('quote2');
            $file->move(storage_path('app/files/' . $order_id . '/'), 'quote_2.' . $file->getClientOriginalExtension());
        }
        if ($request->hasFile('quote3')) {
            $file = $request->file('quote3');
            $file->move(storage_path('app/files/' . $order_id . '/'), 'quote_3.' . $file->getClientOriginalExtension());
        }

        if ($request->hasFile('additional')) {
            $file = $request->file('additional');
            $file->move(storage_path('app/files/' . $order_id . '/'), 'additional_1.' . $file->getClientOriginalExtension());
        }

        // if ($request->has('additional')) {
        //     $files = $request->file('additional');
        //     $count = 1;
        //     foreach ($files as $file) {
        //         $file[0]->move(storage_path('app/files/' . $order_id . '/'), 'additional_' . ($count++) . '.' . $file[0]->getClientOriginalExtension());
        //     }
        // }

        return ['success' => true];
    }

    /**
     *
     */
    public function show($order)
    {
        $order = Training::where('order_id', $order)->first();

        $files = collect(Storage::disk('files')->files($order->order_id))->map(function ($file) {
            return explode("/", $file)[1];
        });

        $quotes = [];
        $additional = [];
        foreach ($files as $file) {
            if (count(explode("quote", $file)) == 2) {
                $quotes[] = $file;
            } else {
                $additional[] = $file;
            }
        }

        $files = [
            'quotes' => $quotes,
            'additional' => $additional,
        ];

        if (auth()->user()->is_admin && auth()->user()->admin_view) {
            if (!$order->placed_at) {
                return view('admin.training.show', ['order' => $order, 'files' => $files]);
            } else {
                return view('admin.training.show-processing', ['order' => $order, 'files' => $files]);
            }
        }

        if (!$order->placed_at) {
            return view('training.show', ['order' => $order, 'files' => $files]);
        }

        return view('training.show', ['order' => $order, 'files' => $files, 'history' => true]);

    }

    /**
     *
     */
    public function update(Request $request, $order)
    {
        $order = Training::where('order_id', $order)->first();

        return [
            'success' => $order->update($request->except('_token')) ? true : false,
        ];

    }

    /**
     *
     */
    public function processing($order)
    {
        $order = Training::where('order_id', $order)->first();

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
        $order = Training::where('order_id', $order)->first();

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
        $item = Training::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = Training::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }

    /**
     *
     *
     */
    public function upload(Request $request, $order, $item)
    {
        $file = $request->file('file');
        $item = Training::find($item);

        $name = $file->move(storage_path('app/files/'), $file->hashName());
        $item->file = pathinfo($name, PATHINFO_BASENAME);
        $item->requisition_no = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $item->save();

        return ['success' => true, 'requisition_no' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)];
    }

    /**
     *
     */
    public function file($order, $item)
    {
        $item = Training::find($item);

        $ext = explode(".", $item->file);
        $ext = '.' . $ext[count($ext) - 1];

        return response()->file(Storage::disk('files')->path($item->file));
    }

    /**
     *
     */
    public function deleteFile($order, $item)
    {
        $item = Training::find($item);
        $item->file = null;
        $item->requisition_no = null;
        $item->save();

        Storage::disk('files')->delete($item->file);

        return ['success' => true];
    }

    /**
     *
     */
    public function showFile($order, $file)
    {
        return response()->file(Storage::disk('files')->path($order . '/' . $file));
    }

}
