<?php

namespace App\Http\Controllers;

use App\NoneCatalogueOrder;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoneCatalogueController extends Controller
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

        return view('forms.none-catalogue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$file = $request->file('item')[0]['file'];

        // return $file;

        // $items = collect(json_decode($request->items, true));

        //create matching order_id for items on same order.
        $order_id = strtoupper(md5(time() . auth()->user()->email));

        //loop through each item.
        foreach ($request->item as $item) {

            $item['order_id'] = $order_id;

            $note = $item['note'] ?? null;
            unset($item['note']);

            $files = $item['file'] ?? [];
            unset($item['file']);

            //insert into db.
            $new = auth()->user()->noneCatalogueOrders()->create($item);

            if (!$new) {
                auth()->user()->catalogueOrders()->where('order_id', $order_id)->delete();
                throw new Exception('An Unknown error has occured', 1);
            }

            if ($note) {
                $new->notes()->create([
                    'order_id' => $order_id,
                    'note' => $note,
                    'user_id' => auth()->user()->id,
                ]);
            }

            if ($files) {
                foreach ($files as $file) {
                    $file->store($order_id . '/' . $new->id, 'files');
                }
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
        $order = NoneCatalogueOrder::where('order_id', $order)->get()->groupBy('order_id')->first();

        if (!$order[0]->placed_at) {
            return auth()->user()->is_admin && auth()->user()->admin_view
            ? view('admin.none-catalogue.show', ['order' => $order]) //admin route
             : view('none-catalogue.show', ['order' => $order, 'editable' => true]); //user route.
        }

        if ($order[0]->placed_at && !$order[0]->completed_at) {
            return auth()->user()->is_admin && auth()->user()->admin_view
            ? view('admin.none-catalogue.show-processing', ['order' => $order, 'status' => Status::all()])
            : view('none-catalogue.show', ['order' => $order, 'editable' => false]); //user route.
        }

        if ($order[0]->completed_at) {
            return auth()->user()->is_admin && auth()->user()->admin_view
            ? view('admin.none-catalogue.show-processing', ['order' => $order, 'status' => Status::all()])
            : view('none-catalogue.show', ['order' => $order, 'history' => true]); //user route.
        }

    }

    /**
     * Mark order as processing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processing($order)
    {

        $a = NoneCatalogueOrder::where('order_id', $order)
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
        $a = NoneCatalogueOrder::where('order_id', $order)
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

        $item = NoneCatalogueOrder::find($item);

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
        $order = NoneCatalogueOrder::where('order_id', $order)->get()->groupBy('order_id')->first();
        $item = NoneCatalogueOrder::find($item);
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
        $order = NoneCatalogueOrder::where('order_id', $order)->get()->groupBy('order_id')->first();

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
        $item = NoneCatalogueOrder::find($item);

        $ext = explode(".", $item->file);
        $ext = '.' . $ext[count($ext) - 1];

        return response()->file(Storage::disk('files')->path($item->file));
    }

    /**
     *
     */
    public function deleteFile($order, $item)
    {

        $item = NoneCatalogueOrder::find($item);

        Storage::disk('files')->delete($item->file);

        CatalogueOrders::where('order_id', $order)->update(['file' => null, 'requisition_no' => null]);

        return ['success' => true];
    }

    /**
     *
     */
    public function notes($order, $item)
    {
        $item = NoneCatalogueOrder::find($item);
        $a = new NotesController();
        return $a->index($order, $item);
    }

    /**
     *
     */
    public function noteSave(Request $request, $order, $item)
    {
        $item = NoneCatalogueOrder::find($item);
        $a = new NotesController();
        return $a->store($request, $order, $item);
    }

    /**
     *
     */
    public function files($order, $item, $file)
    {
        return response()->file(Storage::disk('files')->path($order . '/' . $item . '/' . $file));
    }

    /**
     *
     */
    public function filesDelete($order, $item, $file)
    {
        return Storage::disk('files')->delete($order . '/' . $item . '/' . $file) ? 1 : 0;
    }

    /**
     *
     */
    public function allFiles($order, $item)
    {
        $item = NoneCatalogueOrder::find($item);

        return $item->files;
    }
}
