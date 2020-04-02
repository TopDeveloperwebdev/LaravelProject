<?php

namespace App\Http\Controllers;

use App\CarHire;
use Illuminate\Http\Request;

class CarHireController extends Controller
{

    /**
     *
     */
    public function create()
    {
        return view('forms.car-hire');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        //create matching order_id for items on same order.
        $order_id = strtoupper(md5(time() . auth()->user()->email));

        $data['order_id'] = $order_id;

        $note = $data['note'] ?? null;
        unset($data['note']);

        $booleans = [
            'collect',
            'return',
            'min_21',
            'valid_license',
        ];

        foreach ($booleans as $bool) {
            $data[$bool] = isset($data[$bool]) && $data[$bool] == "on" ? 1 : 0;
        }

        //insert into db.
        $new = auth()->user()->carHire()->create($data);

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
        $order = CarHire::where('order_id', $order)->first();

        if (auth()->user()->is_admin && auth()->user()->admin_view) {

            if (!$order->placed_at) {
                return view('admin.car-hire.show', ['order' => $order]);
            }

            return view('admin.car-hire.show-processing', ['order' => $order]);
        }

        if (!$order->placed_at || ($order->placed_at && !$order->completed_at)) {
            return view('car-hire.show', ['order' => $order]);
        }

        return view('car-hire.show', ['order' => $order, 'history' => true]);
    }

    /**
     *
     */
    public function update(Request $request, $order)
    {
        $order = CarHire::where('order_id', $order)->first();

        return [
            'success' => $order->update($request->except('_token')) ? true : false,
        ];

    }

    /**
     *
     */
    public function processing(Request $request, $order)
    {
        $order = CarHire::where('order_id', $order)->first();

        return [
            'success' => $order->update([
                'placed_at' => now(),
                'admin_id' => auth()->user()->id,
            ]) ? true : false,
        ];

    }

    /**
     *
     */
    public function complete(Request $request, $order)
    {
        $order = CarHire::where('order_id', $order)->first();

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
        $item = CarHire::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = CarHire::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }

}
