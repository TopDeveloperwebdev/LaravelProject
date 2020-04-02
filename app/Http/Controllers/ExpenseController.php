<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    /**
     *
     */
    public function create()
    {
        return view('forms.expenses');
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
        //insert into db.
        $new = auth()->user()->expenses()->create($data);

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
        $order = Expenses::where('order_id', $order)->first();

        if (auth()->user()->is_admin && auth()->user()->admin_view) {
            return view('admin.expenses.show', ['order' => $order]);
        }

        if (!$order->completed_at) {
            return view('expenses.show', ['order' => $order]);
        }

        return view('expenses.show', ['order' => $order, 'history' => true]);
    }

    /**
     *
     */
    public function update(Request $request, $order)
    {
        $order = Expenses::where('order_id', $order)->first();

        return [
            'success' => $order->update($request->except('_token')) ? true : false,
        ];

    }

    /**
     *
     */
    public function complete($order)
    {
        $order = Expenses::where('order_id', $order)->first();

        return [
            'success' => $order->update([
                'admin_id' => auth()->user()->id,
                'completed_at' => now(),
            ]) ? true : false,
        ];

    }

    /**
     *
     */
    public function notes($order, $item)
    {
        $item = Expenses::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = Expenses::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }
}
