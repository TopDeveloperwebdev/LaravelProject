<?php

namespace App\Http\Controllers;

use App\CatalogueOrders;
use App\Stores;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('forms.stores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = collect(json_decode($request->items, true));

        //create matching order_id for items on same order.
        $order_id = strtoupper(md5(time() . auth()->user()->email));

        //loop through each item.
        foreach ($items as $item) {
            $item['order_id'] = $order_id;

            $note = $item['note'] ?? null;
            unset($item['note']);

            //insert into db.
            $new = auth()->user()->stores()->create($item);

            if (!$new) {
                auth()->user()->stores()->where('order_id', $order_id)->delete();
                throw new Exception('An Unknown error has occured', 1);
            }

            if ($note) {
                $new->notes()->create([
                    'order_id' => $order_id,
                    'note' => $note,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }

        return ['success' => true];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $order = Stores::where('order_id', $order)->get()->groupBy('order_id');

        //admin user.
        if (auth()->user()->is_admin && auth()->user()->admin_view) {
            if (!$order->first()->first()->placed_at) {
                return view('admin.stores.show', ['order' => $order]);
            }

            return view('admin.stores.show-processing', ['order' => $order]);
        }

        if (!$order->first()->first()->placed_at || ($order->first()->first()->placed_at && !$order->first()->first()->completed_at)) {
            return view('stores.show', ['order' => $order]);
        }

        return view('stores.show', ['order' => $order, 'history' => true]);

    }

    /**
     * Mark order as processing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processing($order)
    {

        $a = Stores::where('order_id', $order)
            ->update([
                'placed_at' => now(),
                'admin_id' => auth()->user()->id,
            ]);

        return [
            'success' => $a ? true : false,
        ];
    }

    /**
     * Mark order as processing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($order)
    {
        $a = Stores::where('order_id', $order)
            ->update([
                'completed_at' => now(),
            ]);

        return [
            'success' => $a ? true : false,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order, $item)
    {
        $item = Stores::find($item);
        return $item->update($request->except('_token')) ? 1 : 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order, $item)
    {

        //delete notes
        $item->notes()->delete();

        //delete file if no more rows exist.
        if ($order->count() == 1) {
            if ($item->file) {
                Storage::delete('files/' . $item->file);
            }
        }

        //delete items
        return $item->delete() ? 1 : 0;
    }

    /**
     *
     *
     */
    public function upload(Request $request, $order, $item)
    {
        $file = $request->file('file');
        $name = $file->move(storage_path('app/files'), $file->hashName());

        $order->each(function ($oItem) use ($file, $name) {
            $oItem->file = pathinfo($name, PATHINFO_BASENAME);
            $oItem->requisition_no = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $oItem->save();
        });

        return ['success' => true, 'requisition_no' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)];
    }

    /**
     *
     */
    public function file($order, $item)
    {
        $ext = explode(".", $item->file);
        $ext = '.' . $ext[count($ext) - 1];

        return response()->file(Storage::disk('files')->path($item->file));
    }

    /**
     *
     */
    public function deleteFile($order, $item)
    {
        Storage::disk('files')->delete($item->file);

        CatalogueOrders::where('order_id', $order[0]->order_id)->update(['file' => null, 'requisition_no' => null]);

        return ['success' => true];
    }

    /**
     *
     */
    public function notes($order, $item)
    {
        $item = Stores::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = Stores::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }

    /**
     *
     */
    public function slip($order)
    {
        $order = Stores::where('order_id', $order)->get()->groupBy('order_id');
        return view('stores.slip', ['order' => $order]);
    }
}
