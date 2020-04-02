<?php

namespace App\Http\Controllers;

use App\CatalogueOrders;
use App\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
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

        return view('forms.catalogue');
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
            //insert into db.
            $note = $item['note'] ?? null;
            unset($item['note']);

            $new = auth()->user()->catalogueOrders()->create($item);

            if ($note) {
                $new->notes()->create([
                    'order_id' => $order_id,
                    'note' => $note,
                    'user_id' => auth()->user()->id,
                ]);
            }

            if (!$new) {
                auth()->user()->catalogueOrders()->where('order_id', $order_id)->delete();
                throw new Exception('An Unknown error has occured', 1);
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

        if (!$order[0]->placed_at) {
            return auth()->user()->is_admin && auth()->user()->admin_view
            ? view('admin.catalogue.show', ['order' => $order]) //admin route
             : view('catalogue.show', ['order' => $order, 'editable' => true]); //user route.
        }

        if ($order[0]->placed_at && !$order[0]->completed_at) {
            return auth()->user()->is_admin && auth()->user()->admin_view
            ? view('admin.catalogue.show-processing', ['order' => $order, 'status' => Status::all()])
            : view('catalogue.show', ['order' => $order, 'editable' => false]); //user route.
        }

        //USER VIEWS

        if ($order[0]->placed_at && !$order[0]->completed_at) {
            return view('catalogue.show', ['order' => $order]);
        }

        //Sort this view out.
        return view('catalogue.show', ['order' => $order, 'history' => true]);

    }

    /**
     * Mark order as processing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processing($order)
    {
        $a = CatalogueOrders::where('order_id', $order[0]->order_id)
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
        $a = CatalogueOrders::where('order_id', $order[0]->order_id)
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

}
